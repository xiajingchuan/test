<?php
/**
 * 自定义控制器基类
 */
class MY_Controller extends CI_Controller {
    //网站信息数组
    public $site;

    //网站导航数据
    public $nav;

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();

        //设置网站配置信息
        $this->load->model('site_info_model');
        $title = $this->site_info_model->getSiteTitle();
        $keywords = $this->site_info_model->getSiteKeywords();
        $description = $this->site_info_model->getSiteDescription();
        $icp = $this->site_info_model->getSiteICP();

        $this->site = array(
            'title' => $title,
            'keywords' => $keywords,
            'description' => $description,
            'icp' => $icp,
        );

        //设置网站导航信息
        $this->load->model('quick_link_model');
        $this->nav = $this->quick_link_model->getLanmulink();
    }
}