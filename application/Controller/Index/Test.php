<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/24
 * Time: 14:07
 */
class Controller_Index_Test extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        echo phpinfo();
    }



}