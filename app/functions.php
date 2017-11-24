<?php

use App\Lib\Parsedown\Parsedown;

if (!function_exists('loadSystemSetting')) {
    function loadSystemSetting(){
        $exist = session("system_setting",null);
        if($exist == null){
            session(array(
                "system_setting" => \App\Model\System::getSystemSetting()
            ));
            $exist = session("system_setting",null);
        }
        return $exist;
    }
}

if (!function_exists('getSysSettingVal')) {
    function getSysSettingVal($key,$def){
        $all = loadSystemSetting();
        foreach($all as $settingItem){
            if($settingItem['k'] == $key){
                return $settingItem['v'];
            }
        }
        return $def;
    }
}

if (!function_exists('postTitle')) {
    /**
     * Generate an asset path for the application, use aliyun oss
     *
     * @param  string $path
     * @return string
     */
    function postTitle()
    {
        //return "aa";
        //echo "title:";
        //echo getSysSettingVal("标题","");
        return getSysSettingVal("标题","");
        //return "Aaron的技术栈 - https://www.hellotech.mobi";
    }
}

if (!function_exists('beian')) {
    /**
     * Generate an asset path for the application, use aliyun oss
     *
     * @param  string $path
     * @return string
     */
    function beian()
    {
        return getSysSettingVal("备案号","");
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

if (! function_exists('createSpace')) {
    function createSpace(){
        return "<p style='float:left;'>&nbsp;</p>";
    }
}

if (! function_exists('createDeleteFrom')) {
    function createDeleteFrom($url,$text){
        $csrtoken = csrf_field();
        $text = sprintf("<form method='post' action='%s' style='float:left;'>%s<input name='_method' type='hidden' value='DELETE'><button type='submit' class='btn btn-default'>%s</button></form>",$url,$csrtoken,$text);
        return $text;
    }
}

if (! function_exists('createEditFrom')) {
    function createEditFrom($url){
        $csrtoken = csrf_field();
        $text = sprintf("<form method='get' action='%s' style='float:left;'><button type='submit' class='btn btn-default'>编辑</button></form>",$url);
        return $text;
    }
}
