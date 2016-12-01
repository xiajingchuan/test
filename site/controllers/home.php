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
        $this->load->model('merchant_model');
        $hot = $this->merchant_model->getHotMerchant();

        $category = $this->merchant_model->getMerchantCategory();
        foreach ($category as $val) {
            $merchant_list = $this->merchant_model->getMerchantByCategory($val->id, 6);
            $datas['list'][] = array(
                'category_id' => $val->id,
                'category_name' => $val->name,
                'list' => $merchant_list
                );
        }
print_r($datas['list']);

        $datas['hot'] = $hot;
        //获取活动信息
        $this->load->model('activity_model');
        $new_activity = $this->activity_model->getNewActivity();
        $datas['new_activity'] = $new_activity;

        //获取快速链接数据
        $this->load->model('quick_link_model');
        $ql = $this->quick_link_model->get_quick_link_list();
        $datas['quick_link'] = $ql;

        $this->load->view('common/header.html');
        $this->load->view('home/index.html',$datas);
        $this->load->view('common/footer.html');
    }
}
