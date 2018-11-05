<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/19
 * Time: 14:21
 * 达人权益
 */
class Controller_Wap_Rights extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        $tjstar = C::M('user_member')->field('uid,username,headpic')->where("startop = 1")->order("sort ASC,uid desc")->limit(0,8)->select();
        foreach ($tjstar as $key => $value) {
            $tjstar[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
        $this->assign('list',$tjstar);

        $this->display('wap/rights/rights_index.tpl');
    }



}