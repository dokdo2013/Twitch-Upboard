<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upbo_us extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Auth_model');
        $this->load->database();
        $this->load->library('session');
    }
    
    public function sid_isexist($sid)
    {
        // sid 존재여부 체크
        $this->db->where('tw_name', $sid);
        $r1 = $this->db->get('account');
        if ($r1->num_rows() != 1) {
            return false;
        } else {
            $tw_uid = $r1->row()->tw_uid;
            $this->db->where('uid', $tw_uid);
            $r2 = $this->db->get('profile');
            if ($r2->num_rows() != 1) {
                return false;
            } else {
                $pageShow = $r2->row()->pageShow;
                if ($pageShow == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function sid_getdata($sid)
    {
        $this->load->model('Auth_model');
        $tw_uid = $this->Auth_model->sid_to_uid($sid);
        // 기본 account, profile 관련
        $this->db->where('tw_uid', $tw_uid);
        $r1 = $this->db->get('account');

        $this->db->where('uid', $tw_uid);
        $r2 = $this->db->get('profile');

        $user_array = array(
            'name' => $r1->row()->tw_nickname,
            'sid' => $sid,
            'pimg' => $r1->row()->tw_profile_img,
            'followers' => $this->Auth_model->get_followers($sid),
            'bimg' => $r2->row()->backgroundImg,
            'description' => $r2->row()->description
        );

        $page_array = array(
            'upbo' => $r2->row()->useUpbo,
            'list' => $r2->row()->useList,
            'history' => $r2->row()->useHistory,
            'clear' => $r2->row()->useClear,
            'notice' => $r2->row()->useNotice,
            'community' => $r2->row()->useCommunity,
            'login' => ($this->session->login_done) ? true : false
        );

        // 업보 숫자들
        $q2 = "SELECT count(distinct(upbo_uid)) as cnt1, (SELECT count(*) as cnt3 FROM upbo_data WHERE use_stat = 0 and tw_uid = $tw_uid) as cnt2, count(*) as cnt3 FROM upbo_data WHERE tw_uid = $tw_uid";
        $r2 = $this->db->query($q2);

        $upbo_array = array(
            'cnt1' => $r2->row()->cnt1,
            'cnt2' => $r2->row()->cnt2,
            'cnt3' => $r2->row()->cnt3
        );

        // 사람들
        $q3 = "SELECT distinct(`user_name`) as `name` FROM upbo_data WHERE tw_uid = $tw_uid";
        $r3 = $this->db->query($q3);
        $upbo_people = [];
        foreach($r3->result() as $rows){
            $upbo_people[] = $rows;
        }

        // 업보 전체
        $q6 = "SELECT upbo_uid, upbo_name FROM upbo_list WHERE tw_uid = $tw_uid and del_stat = 0";
        $r6 = $this->db->query($q6);
        $upbo_full = [];
        foreach($r6->result() as $rows) {
            $upbo_full[] = $rows;
        }

        // 공지사항 관련
        $q4 = "SELECT count(*) as cnt, board_uid FROM board_contents WHERE board_uid = (SELECT board_uid FROM board_list WHERE board_type = 1 and board_creator = $tw_uid) and del_stat = 0";
        $r4 = $this->db->query($q4);
        $notice_count = $r4->row()->cnt;

        $noticeData = [];
        if( $notice_count >= 1 ) {
            $buid = $r4->row()->board_uid;
            $q5 = "SELECT title, write_datetime, contents_uid FROM board_contents WHERE board_uid = $buid ORDER BY contents_uid DESC LIMIT 5";
            $r5 = $this->db->query($q5);
            foreach($r5->result() as $rows) {
                $noticeData[] = $rows;
            }
        }

        return array(
            true,
            $user_array,
            $page_array,
            $upbo_array,
            $notice_count,
            $noticeData,
            $upbo_people,
            $upbo_full
        );
    }

    public function history($sid)
    {
        $q = "SELECT * FROM upbo_log WHERE tw_uid = (SELECT tw_uid FROM account WHERE tw_name = '$sid') ORDER BY upbolog_uid DESC";
        $r = $this->db->query($q);
        $data = array();
        foreach($r->result() as $rows) {
            $data[] = $rows;
        }
        return $data;
    }

    public function list_name($q)
    {
        $q = "SELECT * FROM upbo_data WHERE user_name ";
    }

    public function list_upbo($q)
    {

    }
}

/* End of file Upbo_us.php */
