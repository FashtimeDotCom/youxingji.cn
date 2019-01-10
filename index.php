<?php
/**
 * 入口文件
 * @author Snake.L
 */

if($_SERVER['HTTP_HOST'] == 'youxingji.cn'){
	header('HTTP/1.1 301 Moved Permanently');//发出301头部
  	$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
  	header('Location: http://www.youxingji.cn' . $_SERVER['PHP_SELF']  . $request_uri);
}
//if($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == 'www.youxingji.cn/wap' || $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == 'm.youxingji.cn/wap'){
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: http://m.youxingji.cn');
//    exit;
//}

if($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == 'm.youxingji.cn/wap'){
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://m.youxingji.cn');
    exit;
}
define('APP_STATUS','develop'); // 项目开发状态 默认测试 on-line正式 上线前记得改

// 指定需要自动加载的配置文件    /config/目录下
$load_file_arr = ['config','status_config'];

$d = dirname(__FILE__);
define('ROOT', $d == '' ? '/' : $d . '/');
define('INCLUDE_PATH', ROOT . 'application/');
define('HTDOCS_ROOT', ROOT);
require(INCLUDE_PATH . 'run.php');
?>