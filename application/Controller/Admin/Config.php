<?php



/**

 * 全局设置

 *

 * @author Snake.L

 *

 */

class Controller_Admin_Config extends Core_Controller_Action

{



    /**

     * 基础设置

     */

    public function basicAction ()

    {

        if ($this->getParam ('config')) 
		{

            $this->configsave ();
			echo $this->returnJson (1, '保存设置成功');
            exit;

        }
        $this->assign ('righttime', Core_Fun::time ());
        $isadd = $this->getParam('isadd');
        if($isadd)
        {
            $configs = C::M('base_config')->where('`group`', 'basic')->where('`cfgname`', 'basic_add_', 'like')->select();
            $this->assign('configs', $configs);
            $this->display ('admin/config_basic_add.tpl');
        }
        else
        {
            $this->display ('admin/config_basic.tpl');
        }
    }



    /**

     * 站点设置

     */

    public function siteAction ()
    {
        if ($this->getParam ('config')) 
        {
            $_config = $this->getParam ('config');
            $powerby = $_config['site']['site_powerby'];
            $_config['site']['site_powerby'] = $powerby . ' <a href="http://www.vpcv.com" target="_blank">致茂网络</a>技术支持';
            $beian = $_config['site']['site_beian'];
            $_config['site']['site_beian'] = '<a href="http://www.miitbeian.gov.cn" target="_blank">' . $beian . '</a>';
            $this->configsave ($_config);  
            echo $this->returnJson (1, '保存设置成功');
            exit;
        } 
        else 
        {
            $this->assign('picdom', 'site_weixin');
        }

        $isadd = $this->getParam('isadd');
        if($isadd)
        {
            $configs = C::M('base_config')->where('`group`', 'site')->where('`cfgname`', 'site_add_', 'like')->select();
            $this->assign('configs', $configs);
            $this->display ('admin/config_site_add.tpl');
        }
        else
        {
            $this->display ('admin/config_site.tpl');
        }
    }



    /**

     * 手机版设置

     */

    public function wapAction ()

    {

        if ($this->getParam ('config')) {

            $_config = $this->getParam ('config');

            $_wapOn = $_config['basic']['wap_on'];

            if (isset ($_wapOn)) {

                Model_Nav::changeWapNav ($_wapOn);

            }

            $this->configsave ();

            echo $this->returnJson (1, '保存设置成功');
            exit;

        }
		$this->display ('admin/config_wap.tpl');

    }



    /**

     * 防灌水设置

     */

    public function secAction ()

    {

        if ($this->getParam ('config')) {

            $_config = $this->getParam ('config');

            if (isset ($_config['sec']['code_on_reg'])

                    || isset ($_config['sec']['code_on_login'])

                    || isset ($_config['sec']['code_on_adminlogin'])) {

                if (!Core_Lib_Seccode::checkFunction ()) {

                    echo $this->returnJson (1, '所需的函数库不满足要求,验证码开启失败');
					exit;

                } else {

                    $this->configsave ();

                    echo $this->returnJson (1, '保存设置成功');
                    exit;
                }

            }

        }
		$this->display ('admin/config_sec.tpl');

    }



    /**

     * 搜索管理

     */

    public function searchAction ()

    {

        if ($this->getParam ('config')) {

            $_config = $this->getParam ('config');

            if (strlen ($_config['basic']['hot_words']) > 25) {

                $this->showmsg ('保存失败:热词总长度不能超过25个字节，一个汉字3个字节');

            } else {

                $this->configsave ();

                $this->showmsg ('保存设置成功');

            }

        }

        $this->display ('admin/config_search.tpl');

    }



    /**

     * 邮件设置

     */

    public function mailAction ()

    {

        if ($this->getParam ('config')) {

            $this->configsave ();

            echo $this->returnJson (1, '保存设置成功');
            exit;

        }
		$this->display ('admin/config_mail.tpl');

    }

	

	/**

     * 水印设置

     */

    public function waterAction ()

    {
        if ($this->getParam ('config')) {
            
            $this->configsave ();

            echo $this->returnJson (1, '保存设置成功');
            exit;

        }
		$this->display ('admin/config_water.tpl');

    }
	
	/**

     * 模板设置

     */

    public function templateAction ()

    {

        if ($this->getParam ('config')) {
			
            $this->configsave ();

            echo $this->returnJson (1, '保存设置成功');
            exit;

        }
		$this->display ('admin/config_template.tpl');

    }
	
	/**

     * 三方登陆设置

     */

    public function thirdAction ()

    {

        if ($this->getParam ('config')) {
			
            $this->configsave ();

            echo $this->returnJson (1, '保存设置成功');
            exit;

        }
		$this->display ('admin/config_third.tpl');

    }

    public function addAction()
    {
        if ($this->getParam ('action') == 'add')
        {
            $group = $this->getParam('group');
            $cfgname = $this->getParam('cfgname');
            $cfgname = $group . '_add_' . $cfgname;
            $config = $this->getParam('config');
            $title = $this->getParam('title');
            $tips = $this->getParam('tips');

            $sql = "insert Into ##__base_config (`config`, `group`, `cfgname`, `title`, `tips`) values ('$config', '$group', '$cfgname', '$title', '$tips')";

            Core_Db::execute($sql, true);

            $file = Core_Config::_getcachefile($group);
            $include = Core_Cache::read($file);
            $include[$cfgname] = $config;
            Core_Cache::write($file, $include);

            echo $this->returnJson (1, '设置成功');
            exit;
        }
        else
        {
            $group = $this->getParam('group');
            $this->assign('group', $group);
            $this->display ('admin/config_add.tpl');
        }
    }

    public function deleteAction()
    {
        $cfgname = $this->getParam('cfgname');
        if(!$cfgname)
        {
            echo $this->returnJson (0, '变量不正确');
            exit;
        }

        if(!preg_match('/_add_/', $cfgname))
        {
            echo $this->returnJson (0, '系统变量不能删除');
            exit;
        }

        $sql = "delete from ##__base_config where cfgname = '$cfgname'";

        $r = Core_Db::execute($sql);
        if($r)
        {
            echo $this->returnJson (1, '删除成功');
            exit;
        }
        else
        {
            echo $this->returnJson (0, '删除失败');
            exit;
        }
    }
}

