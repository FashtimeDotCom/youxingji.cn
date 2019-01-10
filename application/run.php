<?php
/**
 * run文件
 * @author Lee
 */
!defined('ROOT') && exit('Forbidden');
if (PHP_VERSION < '7.0') {
    die("PHP 7.0 or greater is required!!!");
}
define('CACHEDIR',ROOT . 'cache/');

define('VERSION', '2.0.0');
define('APPLICATION_PATH',INCLUDE_PATH . 'Controller/');
define('PLUGIN_PATH',INCLUDE_PATH . 'Plugin/');
define('TEMPLATE_PATH',ROOT . 'view/');
define('CONFIG_PATH',ROOT . 'config/');
define('BASEROOT', $_SERVER['DOCUMENT_ROOT']); //网站根目录不包含扩展目录

/* 上传文件归属 */
define('BELONG_ARTICLE',     1);
define('BELONG_CATEGORY',    2);
define('BELONG_FORUM',       3);
define('BELONG_AD',          4);
define('BELONG_FACTORY',     5);

/*文件后缀*/
define('FILE_LOG',    '.log');

date_default_timezone_set('Asia/Shanghai');
set_include_path(INCLUDE_PATH . PATH_SEPARATOR . get_include_path());
ini_set('magic_quotes_runtime', 0);

if(function_exists('spl_autoload_register')) {
	spl_autoload_register(array('C', 'autoload'));
} else {
	function __autoload($class) {
		return C::autoload($class);
	}
}
define('SITEURL', Core_Fun::getPathroot());
define('CURTIME', Core_Fun::time());
$rundebug = Core_Config::get('rundebug','basic',false);
if ($rundebug)
{
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	//error_reporting(2047);
}
else
{
	error_reporting(0);
}
//other env set

//使用原始数据，入库需要转义！
if (get_magic_quotes_gpc()) {
	//trips
	$_GET = Core_Fun::stripslashes($_GET);
	$_POST = Core_Fun::stripslashes($_POST);
	$_COOKIE = Core_Fun::stripslashes($_COOKIE);
	$_REQUEST = Core_Fun::stripslashes($_REQUEST);
}

//全局session_start
Core_Fun::session_start();
//bug fix Ea or Apc session_write
register_shutdown_function('session_write_close');
//兼容 json_encode / json_decode
if( !function_exists('json_encode') )
{
    function json_encode($data) {
        $json = new Services_JSON();
        return( $json->encode($data) );
    }
}

if( !function_exists('json_decode') )
{
	function json_decode($data , $assoc = false) {
		$use = 0;
		if($assoc)
		{
			//SERVICES_JSON_LOOSE_TYPE	返回关联数组
			$use = 0x10;
		}
        $json = new Services_JSON($use);
        return( $json->decode($data) );
    }
}

// 加载自定义方法文件    2018-12-26
require_once(INCLUDE_PATH.'Function.php');

$front = Core_Controller_Front::getInstance();
$front->setApplicationPath(APPLICATION_PATH);
//注册运行的Model
$front->registerModels(array('admin','index','api','wap','swfupload', 'business'));

try{
    // 自动加载 config目录下的文件    2018-12-26
    if ($load_file_arr && is_array($load_file_arr)) {
        $handle = opendir(CONFIG_PATH);
        while ($file = readdir($handle)) {
            if ($file != '.' && $file != '..' && in_array(substr($file,0,-4),$load_file_arr)) {
                Config::load(CONFIG_PATH.$file);
            }
        }
        unset($handle, $file);
    }

    if (is_file(__DIR__ . '/../vendor/autoload.php')) {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

	$front->dispatch();
}
catch (Exception $e)
{
    Error_Display::show($e);
}

class C
{
	private static $_obj;
	
	public static function M($name){
		return self::_make($name, 'model');
	}
	
	public static function T($name){
		return self::_make($name, 'tag');
	}
	
	protected static function _make($name, $type) {
		if($type == 'model'){
			$cname = ucfirst($type) . '_' . ucfirst($name);
			if(file_exists(INCLUDE_PATH . 'Model/' . str_replace('_', DIRECTORY_SEPARATOR, ucfirst($name)) . '.php')){
				if(!isset(self::$_obj[$cname])) {
					self::$_obj[$cname] = new $cname();
				}
				return self::$_obj[$cname];
			}else{
				$model = new Core_Model();
				return $model->getTableName($name);
			}
		}else{
			$cname = ucfirst($type) . '_' . ucfirst($name);
			if(!isset(self::$_obj[$cname])) {
				self::$_obj[$cname] = new $cname();
			}
			return self::$_obj[$cname];
		}
	}
	
	public static function autoload($class){
		if (class_exists($class, false)){
			return;
		}
		$file = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
		require_once(INCLUDE_PATH . $file);
	}
}


class Config
{
    // 配置参数
    private static $config = [];
    // 参数作用域
    private static $range = '_sys_';

    // 设定配置参数的作用域
    public static function range($range)
    {
        self::$range = $range;
        if (!isset(self::$config[$range])) {
            self::$config[$range] = [];
        }
    }

    /**
     * 解析配置文件或内容
     * @param string    $config 配置文件路径或内容
     * @param string    $type 配置解析类型
     * @param string    $name 配置名（如设置即表示二级配置）
     * @param string    $range  作用域
     * @return mixed
     */
    public static function parse($config, $type = '', $name = '', $range = '')
    {
        $range = $range ?: self::$range;
        if (empty($type)) {
            $type = pathinfo($config, PATHINFO_EXTENSION);
        }
        $class = false !== strpos($type, '\\') ? $type : '\\think\\config\\driver\\' . ucwords($type);
        return self::set((new $class())->parse($config), $name, $range);
    }

    /**
     * 加载配置文件（PHP格式）
     * @param string    $file 配置文件名
     * @param string    $name 配置名（如设置即表示二级配置）
     * @param string    $range  作用域
     * @return mixed
     */
    public static function load($file, $name = '', $range = '')
    {
        $range = $range ?: self::$range;
        if (!isset(self::$config[$range])) {
            self::$config[$range] = [];
        }
        if (is_file($file)) {
            $name = strtolower($name);
            $type = pathinfo($file, PATHINFO_EXTENSION);
            if ('php' == $type) {
                return self::set(include $file, $name, $range);
            } elseif ('yaml' == $type && function_exists('yaml_parse_file')) {
                return self::set(yaml_parse_file($file), $name, $range);
            } else {
                return self::parse($file, $type, $name, $range);
            }
        } else {
            return self::$config[$range];
        }
    }

    /**
     * 检测配置是否存在
     * @param string    $name 配置参数名（支持二级配置 .号分割）
     * @param string    $range  作用域
     * @return bool
     */
    public static function has($name, $range = '')
    {
        $range = $range ?: self::$range;

        if (!strpos($name, '.')) {
            return isset(self::$config[$range][strtolower($name)]);
        } else {
            // 二维数组设置和获取支持
            $name = explode('.', $name);
            return isset(self::$config[$range][strtolower($name[0])][$name[1]]);
        }
    }

    /**
     * 获取配置参数 为空则获取所有配置
     * @param string    $name 配置参数名（支持二级配置 .号分割）
     * @param string    $range  作用域
     * @return mixed
     */
    public static function get($name = null, $range = '')
    {
        $range = $range ?: self::$range;
        // 无参数时获取所有
        if (empty($name) && isset(self::$config[$range])) {
            return self::$config[$range];
        }

        if (!strpos($name, '.')) {
            $name = strtolower($name);
            return isset(self::$config[$range][$name]) ? self::$config[$range][$name] : null;
        } else {
            // 二维数组设置和获取支持
            $name    = explode('.', $name);
            $name[0] = strtolower($name[0]);
            return isset(self::$config[$range][$name[0]][$name[1]]) ? self::$config[$range][$name[0]][$name[1]] : null;
        }
    }

    /**
     * 设置配置参数 name为数组则为批量设置
     * @param string|array  $name 配置参数名（支持二级配置 .号分割）
     * @param mixed         $value 配置值
     * @param string        $range  作用域
     * @return mixed
     */
    public static function set($name, $value = null, $range = '')
    {
        $range = $range ?: self::$range;
        if (!isset(self::$config[$range])) {
            self::$config[$range] = [];
        }
        if (is_string($name)) {
            if (!strpos($name, '.')) {
                self::$config[$range][strtolower($name)] = $value;
            } else {
                // 二维数组设置和获取支持
                $name                                                 = explode('.', $name);
                self::$config[$range][strtolower($name[0])][$name[1]] = $value;
            }
            return;
        } elseif (is_array($name)) {
            // 批量设置
            if (!empty($value)) {
                self::$config[$range][$value] = isset(self::$config[$range][$value]) ?
                    array_merge(self::$config[$range][$value], $name) :
                    self::$config[$range][$value] = $name;
                return self::$config[$range][$value];
            } else {
                return self::$config[$range] = array_merge(self::$config[$range], array_change_key_case($name));
            }
        } else {
            // 为空直接返回 已有配置
            return self::$config[$range];
        }
    }

    /**
     * 重置配置参数
     */
    public static function reset($range = '')
    {
        $range = $range ?: self::$range;
        if (true === $range) {
            self::$config = [];
        } else {
            self::$config[$range] = [];
        }
    }
}