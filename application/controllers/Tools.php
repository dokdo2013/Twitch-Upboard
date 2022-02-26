<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

    public function index()
    {

    }


    /**
     * @param string $sid
     */
    public function alert($sid)
    {
        $data['sid'] = $sid;
        $this->load->view('noti/alert', $data);
    }

    public function clova()
    {
        $this->load->model('Clova');
        $this->Clova->voice();
    }
}

/* End of file Tools.php */
