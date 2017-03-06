<?php 
/**
 * 广告模型
 */
class Adv_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
 
    /**
     * 获取首页300X300广告
     */
    public function getAdv() {
        $now = date('Y-m-d H:i:s');
        $query = $this->db->select('title,img,url,code')
                 ->from('adv')
                 ->where('status','Y')
                 ->where('start_time <', $now)
                 ->order_by('create_time', 'desc')
                 ->limit(1)
                 ->get();
        return $query->row_array();
    }
}