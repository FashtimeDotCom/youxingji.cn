<?php
/*
 * 更多
 * snake.L
 */
class Controller_Wap_More extends Core_Controller_WapAction
{
	public function preDispatch()
	{
		parent::preDispatch();
		$this->assign('current', 'more');
	}
	
	public function indexAction()
	{
		$this->assign('curr', '更多');
		$this->display('wap/more.tpl');
	}
	
	public function wxAction()
	{
		$this->assign('curr', '官方微信');
		$this->display('wap/more_wx.tpl');
	}
	
	public function telAction()
	{
		$this->assign('curr', '联系电话');
		$this->display('wap/more_telephone.tpl');
	}
	
	public function aboutAction()
	{
		$this->assign('curr', '关于我们');
		$this->assign('about', Model_Nav::getNavBody(1));
		$this->display('wap/more_about.tpl');
	}
	
	public function tecAction()
	{
		$user = $this->getUser();
		if(!$user['uid'])
		{
			$arr['msg'] = -1;
			$arr['url'] = Core_Fun::iurlencode(Core_Fun::getPathroot() . 'wap/more');
		}
		else
		{
			$conditions['uid'] = $user['uid'];
			$conditions['istec'] = trim($this->getParam('istec'));
			if(C::M('User_Member')->editUserInfo($conditions))
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo Core_Fun::array2json($arr);
	}
}