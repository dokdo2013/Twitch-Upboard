<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $q = $this->input->get('q', TRUE);
        $this->load->model('Search_model');
        $sch = $this->Search_model->search($q);
        $count = $sch[0];

        $data = array();
        $data['sch_count'] = $count;
        $data['pg'] = $this->Search_model->pg();
        $data['pg']['name'] = '검색';
        $data['us']['sid'] = '';
        $data['is_sch'] = true;
        $data['q'] = $q;

        $personal_data = $this->Auth_model->userdata();
        if( $personal_data[0] ) {
            $data['personal'] = $personal_data[1];
        } else {
            $data['personal'] = '';
        }

        $this->load->view('template/top_head', $data);
        $this->load->view('template/top_navbar', $data);

        if($count > 0) {
            $data['sch'] = true;
            $data['sch_res'] = $sch[1];
        }else{
            $data['sch'] = false;
        }

        $this->load->view('search', $data);
        $this->load->view('template/footer', $data);

    }

}

/* End of file Search.php */
