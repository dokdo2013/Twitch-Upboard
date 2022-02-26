<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upbo extends CI_Controller {
    private $user_exist;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Upbo_us');
    }
    
    /**
     * Path: /{sid}
     * Path: /{sid}/home
     * 
     * @  sid  string  스트리머 ID
     */
    public function home($sid = '')
    {
        // 유저 존재여부 확인
        if( $this->Upbo_us->sid_isexist($sid) ){
            $this->user_exist = true;
        }else{
            $this->user_exist = false;
        }

        // 인증 관련 파트
        $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page($page_perm, $sid);
        if(! $page_perm_res[1] ){
            // 권한 없음
            header('Location: /main/error/401');
        }

        if( $this->user_exist ){
            $view_sel = $this->input->get('s', TRUE);
            if($view_sel != 'add' && $view_sel != 'use'){
                $view_sel = 'add';
            }
            $res = $this->Upbo_us->sid_getdata($sid);
            if( $res[0] ) {
                $data = array();
                $data['nav_pick'] = 'home';
                $data['us'] = $res[1];
                $data['pg'] = $res[2];
                $data['cnt'] = $res[3];
                $data['notice_num'] = $res[4];
                $data['notices'] = $res[5];
                $data['upbo_people'] = $res[6];
                $data['upbo_full'] = $res[7];
                $data['pg']['view_sel'] = $view_sel;
                $data['pg']['name'] = $data['us']['name'];
            }else{
                // 권한 없음
                header('Location: /main/error/401');
            }

            if( $page_perm_res[0] ) {
                $personal_data = $this->Auth_model->userdata();
                if( $personal_data[0] ) {
                    $data['personal'] = $personal_data[1];
                } else {
                    $data['personal'] = '';
                }
            }
            $data['perm'] = $page_perm_res[2];

            $this->load->view('template/top_head', $data);
            $this->load->view('template/top_navbar', $data);
            $this->load->view('template/upbo_top', $data);
            $this->load->view('template/upbo_left', $data);
            $this->load->view('upbo/home', $data);
            $this->load->view('template/footer', $data);
        }else{
            show_404();
        }
    }

    /**
     * Path: /{sid}/list
     * 
     * @  sid  string  스트리머 ID
     */
    public function list($sid = '')
    {
        // 유저 존재여부 확인
        if( $this->Upbo_us->sid_isexist($sid) ){
            $this->user_exist = true;
        }else{
            $this->user_exist = false;
        }

        // 인증 관련 파트
        $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page($page_perm, $sid);
        if(! $page_perm_res[1] ){
            // 권한 없음
            header('Location: /main/error/401');
        }

        if( $this->user_exist ){
            $view_sel = $this->input->get('s', TRUE);
            if($view_sel != 'add' && $view_sel != 'use'){
                $view_sel = 'add';
            }
            $res = $this->Upbo_us->sid_getdata($sid);
            if( $res[0] ) {
                $data = array();
                $data['nav_pick'] = 'list';
                $data['us'] = $res[1];
                $data['pg'] = $res[2];
                $data['cnt'] = $res[3];
                $data['notice_num'] = $res[4];
                $data['notices'] = $res[5];
                $data['upbo_people'] = $res[6];
                $data['upbo_full'] = $res[7];
                $data['pg']['view_sel'] = $view_sel;
                $data['pg']['name'] = $data['us']['name'];
            }else{
                // 권한 없음
                header('Location: /main/error/401');
            }

            if( $page_perm_res[0] ) {
                $personal_data = $this->Auth_model->userdata();
                if( $personal_data[0] ) {
                    $data['personal'] = $personal_data[1];
                } else {
                    $data['personal'] = '';
                }
            }
            $data['perm'] = $page_perm_res[2];

            $this->load->view('template/top_head', $data);
            $this->load->view('template/top_navbar', $data);
            $this->load->view('template/upbo_top', $data);
            $this->load->view('template/upbo_left', $data);
            $this->load->view('upbo/list', $data);
            $this->load->view('template/footer', $data);
        }else{
            show_404();
        }
    }

    /**
     * Path: /{sid}/history
     * 
     * @  sid  string  스트리머 ID
     */
    public function history($sid = '')
    {
        // 유저 존재여부 확인
        if( $this->Upbo_us->sid_isexist($sid) ){
            $this->user_exist = true;
        }else{
            $this->user_exist = false;
        }

        // 인증 관련 파트
        $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page($page_perm, $sid);
        if(! $page_perm_res[1] ){
            // 권한 없음
            header('Location: /main/error/401');
        }

        if( $this->user_exist ){
            $history_data = $this->Upbo_us->history($sid);

            $view_sel = $this->input->get('s', TRUE);
            if($view_sel != 'add' && $view_sel != 'use'){
                $view_sel = 'add';
            }
            $res = $this->Upbo_us->sid_getdata($sid);
            if( $res[0] ) {
                $data = array();
                $data['nav_pick'] = 'history';
                $data['us'] = $res[1];
                $data['pg'] = $res[2];
                $data['cnt'] = $res[3];
                $data['notice_num'] = $res[4];
                $data['notices'] = $res[5];
                $data['upbo_people'] = $res[6];
                $data['upbo_full'] = $res[7];
                $data['pg']['view_sel'] = $view_sel;
                $data['pg']['name'] = $data['us']['name'];

                $data['history_data'] = $history_data;
            }else{
                // 권한 없음
                header('Location: /main/error/401');
            }

            if( $page_perm_res[0] ) {
                $personal_data = $this->Auth_model->userdata();
                if( $personal_data[0] ) {
                    $data['personal'] = $personal_data[1];
                } else {
                    $data['personal'] = '';
                }
            }
            $data['perm'] = $page_perm_res[2];

            $this->load->view('template/top_head', $data);
            $this->load->view('template/top_navbar', $data);
            $this->load->view('template/upbo_top', $data);
            $this->load->view('template/upbo_left', $data);
            $this->load->view('upbo/history', $data);
            $this->load->view('template/footer', $data);
        }else{
            show_404();
        }
    }

    /**
     * Path: /{sid}/notice
     * 
     * @  sid  string  스트리머 ID
     */
    public function notice($sid = '')
    {
        // 유저 존재여부 확인
        if( $this->Upbo_us->sid_isexist($sid) ){
            $this->user_exist = true;
        }else{
            $this->user_exist = false;
        }

        // 인증 관련 파트
        $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page($page_perm, $sid);
        if(! $page_perm_res[1] ){
            // 권한 없음
            header('Location: /main/error/401');
        }

        if( $this->user_exist ){

            // Board Part
            $this->load->model('Board_model');
            $board_uid = $this->Board_model->findNoticeUid($sid);
            if(!$board_uid) {
                $board_data = [];
            }
            else{ 
                $board_data = $this->Board_model->getAllItems($board_uid);
            }

            $view_sel = $this->input->get('s', TRUE);
            if($view_sel != 'add' && $view_sel != 'use'){
                $view_sel = 'add';
            }
            $res = $this->Upbo_us->sid_getdata($sid);
            if( $res[0] ) {
                $data = array();
                $data['nav_pick'] = 'notice';
                $data['us'] = $res[1];
                $data['pg'] = $res[2];
                $data['cnt'] = $res[3];
                $data['notice_num'] = $res[4];
                $data['notices'] = $res[5];
                $data['upbo_people'] = $res[6];
                $data['upbo_full'] = $res[7];
                $data['pg']['view_sel'] = $view_sel;
                $data['pg']['name'] = $data['us']['name'];

                $data['board_data'] = $board_data;
            }else{
                // 권한 없음
                header('Location: /main/error/401');
            }

            if( $page_perm_res[0] ) {
                $personal_data = $this->Auth_model->userdata();
                if( $personal_data[0] ) {
                    $data['personal'] = $personal_data[1];
                } else {
                    $data['personal'] = '';
                }
            }
            $data['perm'] = $page_perm_res[2];
            $data['custom_script'] = '<script src="/dist/js/board.js"></script>';

            $this->load->view('template/top_head', $data);
            $this->load->view('template/top_navbar', $data);
            $this->load->view('template/upbo_top', $data);
            // $this->load->view('template/upbo_left', $data);
            $this->load->view('upbo/notice', $data);
            $this->load->view('template/footer', $data);
        }else{
            show_404();
        }
    }

    /**
     * Path: /{sid}/notice
     * 
     * @  sid  string  스트리머 ID
     */
    public function notice_view($sid = '', $cid = '')
    {
        // 유저 존재여부 확인
        if( $this->Upbo_us->sid_isexist($sid) ){
            $this->user_exist = true;
        }else{
            $this->user_exist = false;
        }

        // 인증 관련 파트
        $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page($page_perm, $sid);
        if(! $page_perm_res[1] ){
            // 권한 없음
            header('Location: /main/error/401');
        }

        if( $this->user_exist ){

            // Board Part
            $this->load->model('Board_model');
            $board_data = $this->Board_model->getItemDetails($cid);
            $this->Board_model->addViewCount($cid);
            $view_sel = $this->input->get('s', TRUE);
            if($view_sel != 'add' && $view_sel != 'use'){
                $view_sel = 'add';
            }
            $res = $this->Upbo_us->sid_getdata($sid);
            if( $res[0] ) {
                $data = array();
                $data['nav_pick'] = 'notice';
                $data['us'] = $res[1];
                $data['pg'] = $res[2];
                $data['cnt'] = $res[3];
                $data['notice_num'] = $res[4];
                $data['notices'] = $res[5];
                $data['upbo_people'] = $res[6];
                $data['upbo_full'] = $res[7];
                $data['pg']['view_sel'] = $view_sel;
                $data['pg']['name'] = $data['us']['name'];

                $data['itemDetail'] = $board_data;
            }else{
                // 권한 없음
                header('Location: /main/error/401');
            }

            if( $page_perm_res[0] ) {
                $personal_data = $this->Auth_model->userdata();
                if( $personal_data[0] ) {
                    $data['personal'] = $personal_data[1];
                } else {
                    $data['personal'] = '';
                }
            }
            $data['perm'] = $page_perm_res[2];

            $this->load->view('template/top_head', $data);
            $this->load->view('template/top_navbar', $data);
            $this->load->view('template/upbo_top', $data);
            // $this->load->view('template/upbo_left', $data);
            $this->load->view('upbo/notice_view', $data);
            $this->load->view('template/footer', $data);
        }else{
            show_404();
        }
    }

}

/* End of file Upbo.php */
