<?php

/**

 * UCenter整合

 *

 * @author snake.L

 */

class Controller_Admin_Uc extends Core_Controller_Action

{

	/**

	 * 设置页面

	 */

	public function indexAction()

	{

		$ucArr = Core_Config::get( null, 'uc', array());

		

		if ($this->getParam('action')=='setup')

		{

			$ucArr = $this->getParam('config');

			$this->configsave($ucArr);

			$this->showmsg('操作成功，正在返回...', 'admin/uc/index');

		}
		else
		{
		

			$this->assign('ucArr', $ucArr);

			$this->display('admin/uc_index.tpl');
		}

	}

}