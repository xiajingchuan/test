<?php
/**
 * 自定义网站外链url处理函数
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('choice'))
{

    /**
     * 从正常url和推广url中选择一个返回
     * 有推广url返回推广url，没有则返回正常url
     */
    function choice($url, $tuiguang_url)
    {
        return trim($tuiguang_url) ? trim($tuiguang_url) : trim($url);
    }
}

