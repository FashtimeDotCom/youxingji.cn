<?php
/**
 * vpcvcms
 * 二维码控制器
 */
class Controller_Wap_Qcode extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$this->display('wap/qcode_index.tpl');
    }
}