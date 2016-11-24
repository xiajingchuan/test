<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台控制器
 */

class Login extends CI_Controller {

    /**
     * 后台首页
     */
    public function index()
    {
        $this->load->view('admin/index.html');
    }

    /**
     * 登录页
     */
    public function login() {
        $this->load->view('admin/login.html');
    }

    /**
     *  登录验证方法
     */
    public function login_check() {
        print_r($_POST);
    }

    /**
     * 判断是否登录
     */
    private function is_login() {

    }
}
