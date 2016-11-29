<?php 
/**
 * 商家分类模型
 */
class Category_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 根据分类ID获取分类名称
     */
    public function getCategoryById($cid) {

        $query = $this->db->select('id,name,weight')
                 ->from('category')
                 ->where('id', $cid)
                 ->where('status', 'Y')
                 ->get();
                 
        return $query->result();
    }
}
