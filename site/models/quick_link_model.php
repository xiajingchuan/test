<?php 
/**
 * 快速链接操作模型
 */
class Quick_link_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取快速链接列表   
     */
    public function get_quick_link_list() {
        $query = $this->db->select('name,url,tuiguang_url,image,highlight')
                 ->from('quick_link')
                 ->where('status', 'Y')
                 ->order_by('weight')
                 ->limit(12)
                 ->get();
        return $query->result();
    }
} 