<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商家控制器
 */

class Merchant extends CI_Controller {

    /**
     * 商家列表
     */
    public function index ()
    {
        $this->load->model('merchant_model');
        $list = $this->merchant_model->get_merchant_list();

        $data['list'] = $list;
        $this->load->view('merchant/index.html', $data);
    }

    /**
     * 编辑商家信息
     */
    public function edit($site_id) {
        $this->load->model('merchant_model');
        $category = $this->merchant_model->get_merchant_category();
        $data['category'] = $category;
        $this->load->view('merchant/edit.html', $data);
    }

    /**
     * 添加商家信息
     */
    public function add() {
        $this->load->model('merchant_model');
        $category = $this->merchant_model->get_merchant_category();
        $this->load->view('merchant/add.html', array('category'=>$category));
    }

    /**
     * 添加商家处理方法
     */
    public function add_action() {
        $this->load->model('merchant_model');
        $bool = $this->merchant_model->insert_merchant();

        if ($bool) {
            echo '添加成功';
        } else {
            echo '添加失败';
        }
    }

    /**
     * 编辑商家处理方法
     */
    public function edit_action() {
        $this->load->model('merchant_model');
        $bool = $this->merchant_model->update_merchant();

        if ($bool) {
            echo '更新成功';
        } else {
            echo '更新失败';
        }
    }
}
