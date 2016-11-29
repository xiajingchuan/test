<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 活动页控制器
 */

class Activity extends CI_Controller {

    /**
     * 活动页列表方法
     */
    public function index()
    {
        $this->load->view('home/index.html');
    }

    /**
     * 活动页详细
     */
    public function info() {
        
    }

    /**
     * 活动添加API
     */
    public function add_api() {
        //秘钥
        $key = '123456';
        $post_datas = $this->input->post();
        $tmp = '';
        $tmp .= $post_datas['site_id'];
        $tmp .= $post_datas['title'];
        $tmp .= $post_datas['content'];
        $tmp .= $post_datas['url'];
        $tmp .= $post_datas['start_time'];
        $tmp .= $post_datas['end_time'];

        $token = md5($tmp.$key);
        if ($token != $post_datas['token']) {
            echo '秘钥错误';
        } else {
            //判断数据的正确性
            //查重
            //将数据入库
            $this->load->model('activity_model');
            $bool = $this->activity_model->insert($post_datas);
            echo $bool ? '添加成功' : '添加失败';
        }

    }
}
