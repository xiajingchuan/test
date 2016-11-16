<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商家控制器
 */

class Merchant extends CI_Controller {

    /**
     * 商家列表
     */
    public function index()
    {
        $this->load->view('common/header.html');
        $this->load->view('home/index.html');
        $this->load->view('common/footer.html');
    }

    /**
     * 商家详细
     */
    public function info() {
        
    }
}
