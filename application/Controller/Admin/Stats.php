<?php
/*
 * vpcvcms
 * 访问管理
 * @author Snake.L
 */
class Controller_Admin_Stats extends Core_Controller_Action
{
	
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
    public function indexAction()
    {
		$_orderby = "accesstime DESC";
		
		$Num = C::M('stats')->getCount();
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = 'admin/stats/index/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stats = C::M('stats')->order('$_orderby')->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('stats', $stats);
		$this->assign ('multipage', $multipage);
		$this->display('admin/stats_index.tpl');
    }
	
	public function deleteAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            C::M('stats')->remove ($ids);
        }
		echo $this->returnJson(1, '操作成功，正在返回...');
	}
}