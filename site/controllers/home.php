<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 首页控制器
 */

class Home extends CI_Controller {

    /**
     * 首页方法
     */
    public function index()
    {
        $this->load->model('merchant');
        $hot = $this->merchant->getHotMerchant();

        $category = $this->merchant->getMerchantCategory();
        foreach ($category as $val) {
            $merchant_list = $this->merchant->getMerchantByCategory($val->id, 6);
            $datas['list'][] = array(
                'category_id' => $val->id,
                'category_name' => $val->name,
                'list' => $merchant_list
                );
        }
print_r($datas['list']);

        $datas['hot'] = $hot;
        $this->load->view('common/header.html');
        $this->load->view('home/index.html',$datas);
        $this->load->view('common/footer.html');
    }
}
