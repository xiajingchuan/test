<?php 
/**
 * 商家操作模型
 */
class Merchant_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取热门商家
     */
    public function getHotMerchant() {

        $query = $this->db->select('site_url,site_name,logo_url,tuiguang_url')
                 ->from('merchant')
                 ->where('hot','Y')
                 ->where('status','Y')
                 ->order_by('weight')
                 ->limit(27)
                 ->get();
        return $query->result();
    }

    /**
     * 获取商家分类
     */
    public function getMerchantCategory() {
        $query = $this->db->select('id,name')
                 ->from('category')
                 ->where('status','Y')
                 ->order_by('weight')
                 ->get();
        return $query->result();
    }

    /**
     * 根据商家分类获取商家
     */
    public function getMerchantByCategory($category, $limit = 'ALL') {
        $num = 0;
        if ($limit != 'ALL') {
            $num = $limit;
        }
        $query = $this->db->select('site_name,site_url,tuiguang_url,logo_url,short_desc')
                 ->from('merchant')
                 ->where('category_id',$category)
                 ->where('status','Y')
                 ->order_by('weight')
                 ->limit($num)
                 ->get();
        return $query->result();
    }

    /**
     * 获取商家的详细信息
     */
    public function getMerchantInfo($site_id) {
        $query = $this->db->select('*')
                 ->from('merchant')
                 ->where('site_id',$site_id)
                 ->where('status','Y')
                 ->get();
        return $query->result();
    }

}