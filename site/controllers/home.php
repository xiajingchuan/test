<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 首页控制器
 */

class Home extends MY_Controller {

    /**
     * 首页方法
     */
    public function index()
    {
        $this->load->model('merchant_model');
        $hot = $this->merchant_model->getHotMerchant(24);

        $category = $this->merchant_model->getMerchantCategory();
        foreach ($category as $val) {
            $merchant_list = $this->merchant_model->getMerchantByCategory($val->id, 6);
            $datas['list'][] = array(
                'category_id' => $val->id,
                'category_name' => $val->name,
                'list' => $merchant_list
                );
        }
//print_r($datas['list']);

        $datas['hot'] = $hot;
        //获取活动信息
        //$this->load->model('activity_model');
        //$new_activity = $this->activity_model->getNewActivity();
        //$datas['new_activity'] = $new_activity;

        //获取商品分类快速链接数据
        $this->load->model('quick_link_model');
        $ql = $this->quick_link_model->getProductCateLink();
        $datas['quick_link'] = $ql;

        //获取广告数据
        $this->load->model('adv_model');
        $adv = $this->adv_model->getAdv();
        $datas['adv'] = $adv;

        $this->load->view('common/header.html');
        $this->load->view('home/index.html',$datas);
        $this->load->view('common/footer.html');
    }

    public function test() {
        $this->load->view('test/demo_fontclass.html');
    }
}
