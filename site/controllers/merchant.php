<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商家控制器
 */

class Merchant extends MY_Controller {

    /**
     * 商家列表
     */
    public function show($cid=1)
    {
        $this->load->model('merchant_model');
        $list = $this->merchant_model->getMerchantByCategory($cid);
        $datas['merchant_list'] = $list;

        $this->load->model('category_model');
        $cate = $this->category_model->getCategoryById($cid);
        $datas['category_name'] = $cate[0]->name;

        $this->load->view('common/header.html');
        $this->load->view('merchant/list.html', $datas);
        $this->load->view('common/footer.html');
    }

    /**
     * 全部商家列表
     */
    public function lista() {
        $this->load->model('merchant_model');
        $category = $this->merchant_model->getMerchantCategory();

        $mer_array = array();
        foreach($category as $c) {
            $mer = $this->merchant_model->getMerchantByCategory($c->id);
            $mer_array[] = array(
                'category_name' => $c->name,
                'merchant' => $mer
                );
        }
        print_r($mer_array);
        exit;

        $this->load->view('common/header.html');
        $this->load->view('merchant/list.html');
        $this->load->view('common/footer.html');
    }

}