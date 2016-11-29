<?php 
/**
 * 促销活动操作模型
 */
class Activity_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 促销活动添加   
     */
    public function insert($data) {

        $sql = "insert into activity (site_id,title,content,url,
            start_time,end_time,create_time)
            values(?,?,?,?,?,?,?)
        ";
        $datas = array(
            'site_id' => $data['site_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'url' => $data['url'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'create_time' => date('Y-m-d H:i:s')
        );
        return $this->db->query($sql,$datas);
    }
}