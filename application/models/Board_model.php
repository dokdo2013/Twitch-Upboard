<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Board_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function findNoticeUid($sid){
        $q = "SELECT board_uid, count(*) as cnt FROM board_list WHERE board_creator = (SELECT tw_uid FROM account WHERE tw_name = '$sid') and board_type = 1";
        $r = $this->db->query($q);
        if( $r->row()->cnt == 0) {
            return false;
        } else {
            return $r->row()->board_uid;
        }
    }

    public function getAllItems($board_uid){
        $q = "SELECT * FROM board_contents WHERE board_uid = $board_uid and del_stat = 0 ORDER BY contents_uid DESC";
        $r = $this->db->query($q);
        $dbData = array();
        foreach($r->result() as $rows){
            $dbData[] = $rows;
        }
        return $dbData;
    }

    public function getItemDetails($contents_uid){
        $q = "SELECT * FROM board_contents WHERE contents_uid = $contents_uid and del_stat = 0";
        $r = $this->db->query($q);
        $dbData = array();
        foreach($r->result() as $rows){
            $dbData[] = $rows;
        }
        return $dbData[0];
    }

    public function addViewCount($contents_uid){
        $q = "SELECT views FROM board_contents WHERE contents_uid = $contents_uid";
        $r = $this->db->query($q);
        $vc = $r->row()->views;
        $vc++;
        $q2 = "UPDATE board_contents SET views = $vc WHERE contents_uid = $contents_uid";
        $this->db->query($q2);
    }

    // 게시물 관련 C/D
    public function addNewItem($boardNum, $passwd, $title, $content, $writerName){
        $userIP = $_SERVER["REMOTE_ADDR"];
        $viewCount = 0;
        $nowTime = date("Y-m-d H:i:s");
        $title = str_replace("'", "\"", $title);
        $content = str_replace("'", "\"", $content);
        $writerName = str_replace("'", "\"", $writerName);
        $q = "INSERT INTO board_contents(boardNum, passwd, title, content, writerName, userIP, viewCount, writeTime, lastEditTime) VALUES($boardNum, '$passwd', '$title', '$content', '$writerName', '$userIP', $viewCount, '$nowTime', '$nowTime')";
        $this->db->query($q);
        $q2 = "SELECT LAST_INSERT_ID() as ls";
        $nr = $this->db->query($q2);
        $num = $nr->row()->ls;
        return $num;
    }

    public function deleteItem($contents_uid){
        $nowTime = date("Y-m-d H:i:s");
        $q = "UPDATE board_contents SET del_stat = 0 and delTime = '$nowTime' WHERE contents_uid = $contents_uid";
        $this->db->query($q);
    }

    public function createNoticeBoard($user_uid)
    {
        $board_data = array(
            'board_type' => 1,
            'board_keyword' => 'notice',
            'board_name' => '공지사항',
            'board_creator' => $user_uid,
            'create_datetime' => date("Y-m-d H:i:s", strtotime("+9 hours")),
            'board_permission' => 3
        );
        $this->db->insert('board_list', $board_data);
    }



}

/* End of file Board_model.php */
