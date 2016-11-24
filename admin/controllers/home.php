<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台首页控制器
 */

class Home extends CI_Controller {

    /**
     * 首页方法
     */
    public function index()
    {

        $this->load->view('home/index.html');
    }
}
