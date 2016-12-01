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
        $query = $this->db->select('id,name,url,tuiguang_url,image,highlight,weight,status,create_time')
                 ->from('quick_link')
                 ->order_by('weight')
                 ->get();
        return $query->result();
    }

    /**
     * 获取某id的快速链接数据
     */
    public function get_quick_link_by_id($id) {
        $query = $this->db->select('id,name,url,tuiguang_url,image,highlight,weight,status,create_time')
                 ->from('quick_link')
                 ->where('id', $id)
                 ->get();
        return $query->result();
    }

    /**
     * 快速链接添加方法
     */
    public function insert($post) {
        $sql = "insert into quick_link (name,url,
            tuiguang_url,image,status,weight,remarks,highlight,create_time)
            values(?,?,?,?,?,?,?,?,?)
        ";
        $data = array(
            'name' => $post['name'],
            'url' => $post['url'],
            'tuiguang_url' => $post['tuiguang_url'],
            'image' => $post['image'],
            'status' => $post['status'],
            'weight' => $post['weight'],
            'remarks' => $post['remarks'],
            'highlight' => $post['highlight'],
            'create_time' => date('Y-m-d H:i:s')
        );
        return $this->db->query($sql,$data);
    }
}