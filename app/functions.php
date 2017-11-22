<?php

use App\Lib\Parsedown\Parsedown;



if (!function_exists('postTitle')) {
    /**
     * Generate an asset path for the application, use aliyun oss
     *
     * @param  string $path
     * @return string
     */
    function postTitle()
    {
        return "Aaron的技术栈 - https://www.hellotech.mobi";
    }
}

if (!function_exists('globalAsset')) {
    /**
     * Generate an asset path for the application, use aliyun oss
     *
     * @param  string $path
     * @return string
     */
    function globalAsset($path)
    {
        return "https://codingsky.oss-cn-hangzhou.aliyuncs.com/cdn/default" . $path;
    }
}

if (!function_exists('publishAsset')) {
    /**
     * Generate an asset path for the application, use aliyun oss
     *
     * @param  string $path
     * @param  bool $secure
     * @return string
     */
    function publishAsset($path, $secure = null)
    {
        return "https://codingsky.oss-cn-hangzhou.aliyuncs.com/cdn/hellotech/themes/default" . $path . "?ver=1005";
    }
}

if (!function_exists('convertMarkdownToHtml')) {
    function convertMarkdownToHtml($markdown){
        $parsedown = new Parsedown();
        return $parsedown->text($markdown);
    }
}


if (!function_exists('strCut')) {
    /**
     * 字符串截取
     * @param string $string
     * @param integer $length
     * @param string $suffix
     * @return string
     */
    function strCut($string, $length, $suffix = '...')
    {
        $resultString = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strLength = strlen($string);
        for ($i = 0; (($i < $strLength) && ($length > 0)); $i++) {
            if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0')) {
                if ($length < 1.0) {
                    break;
                }
                $resultString .= substr($string, $i, $number);
                $length -= 1.0;
                $i += $number - 1;
            } else {
                $resultString .= substr($string, $i, 1);
                $length -= 0.5;
            }
        }
        $resultString = htmlspecialchars($resultString, ENT_QUOTES, 'UTF-8');
        if ($i < $strLength) {
            $resultString .= $suffix;
        }
        return $resultString;
    }
}

if (!function_exists('currentPath')) {
    /**
     * @return array
     */
    function currentPath()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        return ['controller' => $class, 'method' => $method];
    }
}

if (! function_exists('currentAction')) {
    function currentAction(){
        return currentPath()['method'];
    }
}

if (! function_exists('currentController')) {
    function currentController(){
        return currentPath()['controller'];
    }
}
