<?php
/**
 * Created by PhpStorm
 * User: 小天
 * E-mail: 11072162@qq.com
 * Date: 2018/12/25
 * Time: 11:37
 */

class Controller_Admin_AuthRule extends Core_Controller_Action
{
    public function indexAction()
    {
        $this->display('admin/auth_rule/list.tpl');
    }

    public function addAction(){
        $this->display('admin/auth_rule/add.tpl');
    }
}