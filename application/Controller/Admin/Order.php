<?php
/*
 * vpcv-cms
 * 订单管理
 * @author snake.L
 */
class Controller_Admin_Order extends Core_Controller_Action
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
			array('goodsname', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('order')->getCount($_searchArr['where']);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/order/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$orders = C::M('order')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($orders AS $idx => $order)
		{
			$orders[$idx]['username'] = C::M('User_Member')->getInfoByUid('username', $order['uid']);
			$orders[$idx]['goods'] = C::M('ordergoods')->queryAll(array(array('orderid', $order['id'])));
		}
        $this->assign ('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->display('admin/order_index.tpl');
    }
	
	public function getShopName($shopid)
	{
		$shopname = array();
		$str = '';
		$shopids = explode(',', $shopid);
		foreach($shopids AS $id)
		{
			$name = C::M('shop')->getOne('storename', array(array('id', $id)));
			$str .= '<a href="' . Core_Fun::getPathroot() . 'store/show/' . $id . '" target="_blank">' . $name . '</a>';
			array_push($shopname, $str);
		}
		return implode(',', $shopname);
	}
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            C::M('order')->remove ($ids);
        } 
		
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_statuses = $this->getParam ('status');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'status' => intval ($_statuses[$i])
                );
                C::M('order')->update ($_data);
            }
        }
		$this->showmsg('操作成功，正在返回...', 'admin/order/index');
	}
}
?>