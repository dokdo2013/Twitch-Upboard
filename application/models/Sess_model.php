<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sess_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function set_session($k, $v)
    {
        $sess_arr = array(
            $k => $v
        );
        $this->session->set_userdata($sess_arr);
    }

    public function get_session($k)
    {
        return ($this->session->$k) ? ($this->session->$k) : false;
    }
    

}

/* End of file Sess_model.php */
