<?php
/**
 * vpcvcms
 * 底部导航
 */
class Controller_Index_Server extends Core_Controller_TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function showAction()
    {
		$navid = $this->getParam('id');
		$nav = C::M('nav')->find($navid);
		$this->assign('nav', $nav);
		$this->assign('navid', $navid);
		
		$this->display('index/server.tpl');
    }
}