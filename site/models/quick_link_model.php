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
     * 获取商品分类快速链接列表   
     */
    public function getProductCateLink() {
        $query = $this->db->select('name,url,tuiguang_url,image,iconfont_code')
                 ->from('quick_link')
                 ->where('status', 'Y')
                 ->where('type', 'P')
                 ->order_by('weight')
                 ->limit(12)
                 ->get();
        return $query->result();
    }

    /**
     * 获取栏目分类快速链接列表   
     */
    public function getLanmuLink() {
        $query = $this->db->select('name,url,tuiguang_url,image,highlight')
                 ->from('quick_link')
                 ->where('status', 'Y')
                 ->where('type', 'L')
                 ->order_by('weight')
                 ->limit(12)
                 ->get();
        return $query->result();
    }
} 