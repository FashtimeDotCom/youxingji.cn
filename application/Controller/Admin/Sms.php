<?php


class Controller_Admin_Sms extends Core_Controller_Action

{

	/**

	 * 设置页面

	 */

	public function indexAction()

	{

		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('sms_log')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/sms/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('sms_log')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/sms_index.tpl');

	}

}