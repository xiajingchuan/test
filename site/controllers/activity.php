<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 活动页控制器
 */
 
class Activity extends MY_Controller {

    /**
     * 活动页列表方法
     */
    public function index()
    {
        $this->load->view('common/header.html');
        $this->load->view('home/index.html');
        $this->load->view('common/footer.html');
    }

    /**
     * 活动页详细
     */
    public function info() {
        
    }
}
