<?php 
/**
 * 网站信息模型
 */
class Site_info_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
 
    /**
     * 获取网站标题
     */
    public function getSiteTitle() {

        $query = $this->db->select('config.info')
                 ->from('config')
                 ->where('config.varname','title')
                 ->get();
        return $query->row()->info;
    }

    /**
     * 获取网站关键词
     */
    public function getSiteKeywords() {

        $query = $this->db->select('config.info')
                 ->from('config')
                 ->where('config.varname','keywords')
                 ->get();
        return $query->row()->info;
    }

    /**
     * 获取网站描述
     */
    public function getSiteDescription() {

        $query = $this->db->select('config.info')
                 ->from('config')
                 ->where('config.varname','description')
                 ->get();
        return $query->row()->info;
    }

    /**
     * 获取网站备案号
     */
    public function getSiteICP() {

        $query = $this->db->select('config.info')
                 ->from('config')
                 ->where('config.varname','icp')
                 ->get();
        return $query->row()->info;
    }
}