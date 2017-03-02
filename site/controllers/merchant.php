<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商家控制器
 */

class Merchant extends CI_Controller {

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

}