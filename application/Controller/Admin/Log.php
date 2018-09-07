<?php
/*
 * vpcv-cms
 * 会员记录管理
 * @author snake.L
 */
class Controller_Admin_Log extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

    public function indexAction()
    {
		$_search = array(
			array('username', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "logtime DESC";
		
		$Num = C::M('User_Log')->getLogCountByWhere($_searchArr['where']);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/log/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$logs = C::M('User_Log')->getLogList($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($logs AS $log)
		{
			C::M('User_Log')->editLog(array(
				'id' => $log['id'],
				'isview' => 1
			));
		}
        $this->assign ('multipage', $multipage);
		$this->assign('logs', $logs);
		$this->display('admin/log_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            C::M('User_Log')->delLog ($ids);
        } 
		$this->showmsg('操作成功，正在返回...', 'admin/log/index');
	}
}