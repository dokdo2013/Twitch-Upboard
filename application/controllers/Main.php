<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Sess_model');
    }

    public function index()
    {
        // 인증 관련 파트
        // $page_perm = 1;
        $page_perm_res = $this->Auth_model->check_page(1, '');
        // if(! $page_perm_res[1] ){
            // 권한 없음
            // header('Location: /main/error/401');
        // }

        $data = array();
        $data['us']['sid'] = '';
        $data['pg']['login'] = ($this->Sess_model->get_session('login_done')) ? true : false;
        $data['pg']['name'] = '홈';

        if( $page_perm_res[0] ) {
            $personal_data = $this->Auth_model->userdata();
            if( $personal_data[0] ) {
                $data['personal'] = $personal_data[1];
            } else {
                $data['personal'] = '';
            }
        }
        $this->load->view('template/top_head', $data);
        $this->load->view('template/top_navbar', $data);
        $this->load->view('Main2', $data);
        $this->load->view('template/footer_main', $data);
    }

}

/* End of file Main.php */
