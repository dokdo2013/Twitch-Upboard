<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upbo extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function set_upbo()
    {

    }

    public function get_upbo()
    {

    }

    public function add_upbo($data)
    {
        $i1 = $data['upbo_uid'];
        $i2 = $data['tw_uid'];
        $i3 = $data['user_name'];
        $i4 = $data['made_datetime'];
        $i5 = $data['end_datetime'];
        $i6 = $data['made_by'];
        $q = "INSERT INTO upbo_data(upbo_uid, tw_uid, `user_name`, made_datetime, end_datetime, made_by) VALUES($i1, $i2, '$i3', '$i4', '$i5', $i6)";
        $this->db->query($q);
    }

    public function use_upbo($target_uid)
    {
        $this_datetime = date("Y-m-d H:i:s", now());
        $q = "UPDATE upbo_data SET use_stat = 1 and this_datetime = '$this_datetime' WHERE upbodata_uid = $target_uid";
        $this->db->query($q);
    }
    

}

/* End of file Upbo.php */
