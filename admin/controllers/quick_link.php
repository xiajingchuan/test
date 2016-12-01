<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 快速链接控制器
 */

class Quick_link extends CI_Controller {

    /**
     * 快速链接列表
     */
    public function index ()
    {
        $this->load->model('quick_link_model');
        $list = $this->quick_link_model->get_quick_link_list();

        $data['list'] = $list;
        $this->load->view('quick_link/index.html', $data);
    }

    /**
     * 快速链接添加
     */
    public function add() {
        $this->load->view('quick_link/add.html');
    }

    /**
     * 快速链接添加处理方法
     */
    public function add_action() {
        $post = $this->load->post();
        $this->load->model('quick_link_model');
        $list = $this->quick_link_model->insert($post);
    }

    /**
     * 快速链接编辑
     */
    public function edit($id) {
        $this->load->model('quick_link_model');
        $ql = $this->quick_link_model->get_quick_link_by_id($id);
        $this->load->view('quick_link/edit.html',array('data'=>$ql));
    }
}