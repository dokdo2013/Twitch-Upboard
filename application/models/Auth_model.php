<?php
/**
 * using Twitch API v5 (DEPRECATED) - 업데이트 필요
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    // Twitch API Setting
    private $client_id = '';
    private $client_secret = '';
    private $redirect_url;
    // Variable Presets
    private $master = 188643459;
    private $login_done;
    private $user_level;

    /**
     * @todo 잠재적 오류 수정필요
     * - 트위치 정책상 아이디 변경이 가능. 특정 아이디로 업보드 회원가입 후 트위치에서는 아이디 변경을 했는데, 다시 업보드에
     * 로그인하지 않을 경우 기존 아이디가 그대로 남아있음. 이 때 다른 사람이 트위치에서 해당 아이디를 획득한 후 업보드에
     * 회원가입할 경우 마이페이지 라우팅이 트위치 아이디로 이루어지기 때문에
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        if ( $_SERVER['HTTP_HOST'] == 'upboard.kr' ) {
            $this->redirect_url = 'https://upboard.kr/main/auth/social';
        } else {
            $this->redirect_url = 'http://localhost:8000/main/auth/social';
        }
    }
    
    /**
     * 페이지별 권한 수준과 현재 세션 권한 비교
     * 
     * @param int $need    페이지별로 필요한 권한의 수준 확인
     * @param string $page    페이지 id
     * @return array [bool, bool]    [로그인 여부, 접근가능 여부]
     */
    public function check_page($need = 0, $page = '')
    {
        $available = false; // 접근 가능여부
        /**
         * need
         * 0  : Param 에러
         * 1  : 비로그인 유저 접근 가능
         * 2  : 로그인 유저 접근 가능
         * 3  : 관리자 접근 가능
         * 4  : 소유자 접근 가능
         * 10 : 마스터 접근 가능
         */

        // 세션 존재 여부 확인
        if( $this->session->login_done ) {
            $this->login_done = true;
            $this->user_level = $this->get_user_permission($this->session->user_uid, $page);
        } else {
            $this->login_done = false;
            $this->user_level = 1;
            // header('Location: /');
        }

        // 넘어온 값에 따라 접근 가능한지 확인 후 저장
        switch( $need ) {
            case 0:
                $available = false; break;
            case 1:
                $available = ($this->user_level >= 1) ? true : false; break;
            case 2:
                $available = ($this->user_level >= 2) ? true : false; break;
            case 3:
                $available = ($this->user_level >= 3) ? true : false; break;
            case 4:
                $available = ($this->user_level >= 4) ? true : false; break;
            case 10:
                $available = ($this->user_level == 10) ? true : false; break;
            default:
                $available = false;
        }

        return array(
            $this->login_done,
            $available,
            $this->user_level
        );
    }

    /**
     * 트위치 소셜 로그인 인증
     * @todo 2022.02.28 Legacy v5 API 사용불가
     * 
     * @param string $code    API User Access Token
     * @return int    인증 실패 : 0 / 로그인 : 1 / 회원가입 : 2
     */
    public function authorization($code)
    {
        $token_url = 'https://id.twitch.tv/oauth2/token';
        $data = array(
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->redirect_url,
            'code' => $code
        );
        $curl = curl_init($token_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $result = json_decode($result, true);

        $i = curl_getinfo($curl);
        curl_close($curl);
        if ($i['http_code'] == 200) {
            $curl = curl_init('https://api.twitch.tv/kraken/user');
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Accept: application/vnd.twitchtv.v5+json',
                'Client-ID: ' . $this->client_id,
                'Authorization: OAuth ' . $result['access_token']
            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $user = curl_exec($curl);

            $i = curl_getinfo($curl);
            curl_close($curl);
            if ($i['http_code'] == 200) {
                $user = json_decode($user, true);
                if ($user['partnered']) {
                    $partnered = 1;
                } else {
                    $partnered = 0;
                }
                $user["tw_partnered"] = $partnered;
                $tw_id = $user["_id"];
                if( $this->check_user_exist($tw_id) ) {
                    $this->set_login($user["_id"]);
                    $this->update_user($user);
                    return 1;
                } else {
                    $this->create_user($user, $result);
                    $this->set_login($user["_id"]);
                    return 2;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }

    }

    /**
     * 트위치 팔로워 수 가져오기
     * @param string $sid    트위치 고유 uid
     */
    public function get_followers(string $sid)
    {
        $tw_uid = $this->sid_to_uid($sid);
        $url = "https://api.twitch.tv/kraken/channels/" . $tw_uid . "?client_id=" . $this->client_id;
        $data = array(
//            'Client-ID' => $this->client_id
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, false);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "client_id: $this->client_id",
            "Accept: application/vnd.twitchtv.v5+json"
        ));
        $result = curl_exec($curl);
        $result = json_decode($result, true);

//        print_r($result["followers"]);
        return $result["followers"];
    }

    /**
     * 트위치 로그인 링크 생성
     */
    public function get_authorization_link()
    {
        $scopes = array(
            'channel_subscriptions' => 0,
            'channel_check_subscription' => 0,
            'channel_editor' => 0,
            'user_read' => 1,
            'bits:read' => 0,
            'channel:moderate' => 0,
            'channel:read:redemptions' => 0,
        );
        $req_scope = '';
        foreach ($scopes as $scope => $allow) {
            if ($allow) {
                $req_scope .= $scope . '+';
            }
        }

        $req_scope = substr($req_scope, 0, -1);
        $auth_url = 'https://id.twitch.tv/oauth2/authorize?response_type=code';
        $auth_url .= '&client_id=' . $this->client_id;
        $auth_url .= '&redirect_uri=' . $this->redirect_url;
        $auth_url .= '&scope=' . $req_scope;

        return $auth_url;
    }

    /**
     * 세션 초기화 (로그아웃)
     */
    public function logout()
    {
        $sess_data = array(
            "login_done" => false,
            "user_uid" => ''
        );
        $this->session->set_userdata($sess_data);
    }

    /**
     * 이용약관, 개인정보처리방침 동의
     */
    public function register($uid, $is_agree)
    {
        $q_data = array(
            "term_agree" => 1
        );
        $this->db->where('tw_uid', $uid);
        $this->db->update($q_data);
        $this->session->unset_userdata('register_uid');
    }

    /**
     * 
     */
    public function term_agree()
    {
        $uid = $this->session->user_uid;
        $q = "UPDATE account SET term_agree = 1 WHERE tw_uid = $uid";
        $this->db->query($q);
    }

    /**
     * @return array [bool, object]    object : 회원정보
     */
    public function userdata()
    {
        if( $this->session->login_done ) {
            $uid = $this->session->user_uid;
            // echo "<script>console.log('$uid');</script>";
            if( $this->check_user_exist($uid) ) {
                return [true, $this->get_user_data($uid)];
                // print_r($this->get_user_data($uid));
            } else {
                return [false, []];
            }
        } else {
            return [false, []];
        }
    }

    /**
     * 회원정보가 DB에 존재하는지 확인
     * 
     * @param int $uid    회원고유 uid (트위치 uid)
     * @return bool    true: 회원 O / false: 회원 X
     */
    private function check_user_exist($uid)
    {
        $q = "SELECT count(*) as cnt FROM account WHERE tw_uid = '$uid'";
        $r = $this->db->query($q);
        if( $r->row()->cnt == 0 ){
            return false;
        } else {
            return true;
        }
    }

    private function create_user($user, $result)
    {
        $data = array(
            "tw_uid" => $user['_id'],
            "tw_name" => $user['name'],
            "tw_nickname" => $user['display_name'],
            "tw_profile_img" => $user['logo'],
            "tw_email" => $user['email'],
            "tw_partnered" => $user['tw_partnered'],
            "refresh_token" => $result['refresh_token'],
            "access_token" => $result['access_token'],
            "term_agree" => 0
        );
        $this->db->insert('account', $data);
        // Set Session For Register
        $this->session->set_userdata('register_uid', $user['_id']);

        // 게시판 생성
        $this->load->model('Board_model');
        $this->Board_model->createNoticeBoard($user['_id']);

        // Profile 데이터 생성
        $profile_data = array(
            'uid' => $user['_id']
        );
        $this->db->insert('profile', $profile_data);
    }

    private function set_login($data)
    {
        $sess_data = array(
            "login_done" => true,
            "user_uid" => $data
        );
        $this->session->set_userdata($sess_data);
    }

    private function update_user(array $user)
    {
        $update_data = array(
            "tw_name" => $user['name'],
            "tw_nickname" => $user['display_name'],
            "tw_profile_img" => $user['logo'],
            "tw_email" => $user['email'],
            "tw_partnered" => $user['tw_partnered']
        );
        $this->db->where('tw_uid', $user['_id']);
        $this->db->update('account', $update_data);
    }

    private function get_user_data($uid)
    {
        $q = "SELECT * FROM account WHERE tw_uid = $uid";
        $r = $this->db->query($q);
        $dbData = array();
        foreach($r->result() as $rows){
            $dbData[] = $rows;
        }
        return $dbData[0];
    }

    private function get_user_permission($uid, $page)
    {
        // 특정 페이지의 유저 퍼미션 체크
        // 총관리자는 10
        // 페이지의 uid와 현재 uid가 일치하면 4
        // 관리자 권한으로 permission이 있으면 3
        // 그 외에는 2

        // 먼저 총관리자인지 확인
        if( $this->master == $uid ) {
            return 10;
        }

        // 페이지의 sid가 주어졌기 때문에 uid로 변환, 유효하지 않으면 0 반환
        $page_uid = $this->sid_to_uid($page);
        if( $page_uid == -1 ) {
            return 0;
        }

        // 페이지의 소유주인지 확인
        if( $uid == $page_uid ) {
            return 4;
        }

        // 관리자 권한이 있는지 확인
        $q = "SELECT slave FROM `permissions` WHERE `master` = $page_uid and del_stat = 0";
        $r = $this->db->query($q);

        foreach($r->result() as $rows) {
            if( $rows->slave == $uid ) {
                return 3;
            }
        }

        return 2;
    }

    public function sid_to_uid($sid)
    {
        $q = "SELECT count(*) as cnt, tw_uid FROM account WHERE tw_name = '$sid'";
        $r = $this->db->query($q);
        if( $r->row()->cnt == 0 ){
            return -1;
        }else{
            return $r->row()->tw_uid;
        }
    }

}

/* End of file Auth_model.php */
