<?php
/**
 * 后台首页
 *
 * @author Snake.L
 */
class Controller_Admin_Index extends Core_Controller_Action
{
	private $_userModel = null;
	private $cUser;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_userModel = new Model_User_Member();
	}
	
	public function indexAction()
	{
		$menulist = include CONFIG_PATH . 'menu.php';
		$usermenu = $this->getUserMenu($menulist);
		$this->assign('CHARSET', 'UTF-8');
		define('BASESCRIPT', Core_Fun::getPathroot().'admin/');
		$this->assign('mainurl', BASESCRIPT.'index/home');
		$this->assign('version', VERSION);
		$this->assign('menulist', $_SESSION['isadmin'] == 1 ? $menulist : $usermenu);
		$this->assign('adminname', $_SESSION['adminname']);
		$this->assign('groupname', C::M('User_Group')->getGroupName($_SESSION['admingid']));
		if($_SESSION['isadmin'] == 1){
			$this->assign('modules', C::M('base_module')->select());
		}
		$this->display('admin/index_index.tpl');
	}

	public function homeAction()
	{
		$_articleModel = new Model_Article();
		$this->assign('CHARSET', 'UTF-8');
		$this->assign('BASESCRIPT', 'index');
		$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
		$serverinfo .= @ini_get('safe_mode') ? ' Safe Mode' : '';
		$this->assign('serverinfo', $serverinfo);
        if( false === strpos($_SERVER['SERVER_SOFTWARE'],"Apache"))
        {
           	$this->assign('phpversion',PHP_OS.' PHP/'.phpversion()); 
        }
		$this->assign('fileupload', @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<font color="red">不能上传</font>');
		$this->assign('magic_quote_gpc',MAGIC_QUOTE_GPC ? 'On' : 'Off');
		$this->assign('allow_url_fopen',ini_get('allow_url_fopen') ? 'On' : 'Off');

		$dbsize = 0;
		$query = Core_Db::fetchAll("Show Table Status Like '##__%'");
		foreach($query AS $table)
		{
			$dbsize += $table['Data_length'] + $table['Index_length'];
		}
		$dbsize = $dbsize ? Core_Fun::formatBytes($dbsize) : 'unknow';
		$version = Core_Db::fetchOne("select VERSION() as version;");
		$statOn = Core_Config::get('stat', 'basic', 0);
		$visits = C::M('stats')->getTodayStats();
		$ip = C::M('stats')->getTodayIP();
		$time = Core_Fun::time();
		$this->assign('visits', $visits);
		$this->assign('ip', $ip);
		$this->assign('stat', $statOn);
		$this->assign('dbsize', $dbsize);
		$this->assign('dbversion', $version['version']);
		$this->assign('adminname', $_SESSION['adminname']);
		
		$this->display('admin/index_home.tpl');
	}
	
	private function getUserMenu($menulist)
	{
		$usermenu = array();
		$menu = C::M('User_Access')->getAccess($_SESSION['isadmin']);
		foreach($menulist AS $key => $value)
		{
			$menuson = array();
			foreach($value AS $idx => $val)
			{
				if(in_array($val['auth'], $menu))
				{
					$menuson[$idx]['url'] = $val['url'];
					$menuson[$idx]['name'] = $val['name'];
					$menuson[$idx]['auth'] = $val['auth'];
				}
			}
			$usermenu[$key] = $menuson;
		}
		return $usermenu;
	}
}
