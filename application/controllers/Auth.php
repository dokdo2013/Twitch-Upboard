<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Sess_model');
        $this->load->helper('cookie');
    }
    
    /**
     * Path: /main/auth/social
     */
    public function social()
    {
        // $this->load->view('auth/social');
        $code = $this->input->get('code', TRUE);
        if( $code ) {
            $login_res = $this->Auth_model->authorization($code);
            if( $login_res == 1 ) {
                if( $redto = $this->Sess_model->get_session('redto') ) {
                    $this->Sess_model->set_session('redto', null);
                    header('Location: ' . $redto);
                }else{
                    header('Location: /');
                }
            } else if ( $login_res == 2 ) {
                header('Location: /main/auth/register');
            } else {
                echo "<script>alert('로그인에 실패하였습니다. 고객센터에 문의 바랍니다.');</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0; URL=/main?err=login\">";    
            }
        } else {
            echo "<script>alert('로그인에 실패하였습니다. 고객센터에 문의 바랍니다.');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0; URL=/main?err=login\">";
        }
    }

    /**
     * login link 로 이동
     */
    public function login()
    {
        if( $this->input->get('redto') ) {
            $this->Sess_model->set_session('redto', $this->input->get('redto'));
            $link = $this->Auth_model->get_authorization_link();
            header('Location: '.$link);
        }else{
            $link = $this->Auth_model->get_authorization_link();
            header('Location: '.$link);
        }
    }

    /**
     * Path: /main/auth/logout
     */
    public function logout()
    {
        $this->Auth_model->logout();
        header('Location: /');
    }

    /**
     * register
     */
    public function register()
    {
        $uid = $this->session->register_uid;
        $userdata = $this->Auth_model->userdata();
        if( $userdata[0] ) {
            if( !$userdata[1]->term_agree ) {
                $data = array();
                $data['rg'] = array(
                    "profile_img" => $userdata[1]->tw_profile_img,
                    "nickname" => $userdata[1]->tw_nickname
                );
                $this->load->view('auth/register', $data);
            } else {
                header('Location: /');
            }
        } else {
            // [ERR] 1110 : 회원정보 불일치
            header('Location: /1110');
        }
    }

    /**
     * 
     */
    public function term_agree()
    {
        $this->Auth_model->term_agree();
        if( $redto = $this->Sess_model->get_session('redto') ) {
            $this->Sess_model->set_session('redto', null);
            header('Location: ' . $redto);
        }else{
            header('Location: /');
        }
    }

}

/* End of file Auth.php */
