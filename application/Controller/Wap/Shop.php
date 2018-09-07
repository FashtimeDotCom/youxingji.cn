<?php
/**
 * vpcvcms
 * 店铺控制器
 */
class Controller_Wap_Shop extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$this->display('wap/shop_index.tpl');
    }
}