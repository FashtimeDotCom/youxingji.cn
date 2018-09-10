<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/10
 * 独家之旅二级页面
 * Time: 09:34
 */
class Controller_Wap_Journey extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction(){

        $this->display("wap/journey/journey_list.tpl");
    }



}
