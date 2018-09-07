<?php
/*
 * vpcv-cms
 * 预约管理
 * @author snake.L
 */
class Controller_Admin_Booking extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_search = array(
			array('telephone', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('booking')->getCount($_searchArr['where']);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/booking/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$bookings = C::M('booking')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
        $this->assign ('multipage', $multipage);
		$this->assign('bookings', $bookings);
		$this->display('admin/booking_index.tpl');
    }
	
	public function moreAction()
	{
		
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'useable' => intval ($_useables[$_id])
                );
                C::M('booking')->update ($_data);
            }
        }
		$this->showmsg('操作成功，正在返回...', 'admin/booking/index');
	}

	public function deleteAction()
	{
		//删除
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
            C::M('booking')->remove ($ids);
        } 
		
		$this->showmsg('操作成功，正在返回...', 'admin/booking/index');
	}
}
?>