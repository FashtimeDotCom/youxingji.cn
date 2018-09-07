<?php
/*
 * vpcv-cms
 * 留言管理
 * @author snake.L
 */
class Controller_Admin_Leaving extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

    public function indexAction()
    {
    	$conditions = array();
    	$where = '1=1';
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('leaving')->where($where)->getCount();
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/leaving/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$leavings = C::M('leaving')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		
        $this->assign ('multipage', $multipage);
		$this->assign('leavings', $leavings);
		$this->display('admin/leaving_index.tpl');
    }
	

	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
            C::M('leaving')->remove ($ids);
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
}