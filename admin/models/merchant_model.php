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
     * 获取商家列表   
     */
    public function get_merchant_list() {
        $sql = "
            select m.*,c.name category_name
            from merchant m 
            inner join category c 
                on m.category_id=c.id
            ";
        $query = $this->db->query($sql);
        return $query->result();
    }


    /**
     * 获取商家分类
     */
    public function get_merchant_category() {
        $query = $this->db->select('id,name')
                 ->from('category')
                 ->where('status','Y')
                 ->order_by('weight')
                 ->get();
        return $query->result();
    }

    /**
     * 插入商家
     */
    public function insert_merchant() {
        $tmp = $this->input->post();
        $sql = "insert into merchant (site_id,site_name,category_id,site_url,
            tuiguang_url,logo_url,short_desc,status,weight,remarks,hot,create_time)
            values(?,?,?,?,?,?,?,?,?,?,?,?)
        ";
        $data = array(
            'site_id' => $tmp['site_id'],
            'site_name' => $tmp['site_name'],
            'category_id' => $tmp['site_id'],
            'site_url' => $tmp['site_url'],
            'tuiguang_url' => $tmp['site_id'],
            'logo_url' => $tmp['logo_url'],
            'short_desc' => $tmp['short_desc'],
            'status' => $tmp['status'],
            'weight' => $tmp['weight'],
            'remarks' => $tmp['remarks'],
            'hot' => $tmp['site_id'],
            'create_time' => date('Y-m-d')
        );
        return $this->db->query($sql,$data);
    }

    /**
     * 更新商家
     */
    public function update_merchant() {

    }

}