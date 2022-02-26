<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    /**
     * @param string $keyword
     */
    public function search($keyword = '')
    {
        if($keyword == null || $keyword == ''){
            return [false];
        }else{
            $q = "SELECT * FROM account WHERE tw_nickname LIKE '%$keyword%'";
            $r = $this->db->query($q);
            $cnt = $r->num_rows();
            if($cnt == 0) {
                return [false];
            } else {
                $db_data = array();
                foreach ($r->result() as $rows) {
                    $db_data[] = $rows;
                }
                return [true, $db_data];
            }
        }
    }

    /**
     *
     */
    public function pg()
    {
        $data = array(
            'upbo' => false,
            'list' => false,
            'history' => false,
            'clear' => false,
            'notice' => false,
            'community' => false,
            'login' => ($this->session->login_done) ? true : false
        );
        return $data;
    }


}

/* End of file Search_model.php */
