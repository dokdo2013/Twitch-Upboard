<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    /**
     * Path: /{sid}/manage
     * Path: /{sid}/manage/home
     * 
     * @  sid  string  스트리머 ID  
     */
    public function home($sid = '')
    {
        
    }

    /**
     * Path: /{sid}/manage/access
     * 
     * @  sid  string  스트리머 ID
     */
    public function access($sid = '')
    {

    }

    /**
     * Path: /{sid}/manage/upbo
     * 
     * @  sid  string  스트리머 ID
     */
    public function upbo($sid = '')
    {

    }

    /**
     * Path: /{sid}/manage/stat
     * 
     * @  sid  string  스트리머 ID
     */
    public function stat($sid = ''){

    }
    
}

/* End of file Manage.php */
