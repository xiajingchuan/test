<?php 
/**
 * 活动模型
 */
class Activity_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取最新活动
     */
    public function getNewActivity() {

        $query = $this->db->select('id,site_id,title')
                 ->from('activity')
                 ->order_by('create_time')
                 ->limit(10)
                 ->get();
        return $query->result();
    }
}