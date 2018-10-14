<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/10
 * Time: 10:50
 */
class Controller_Api_User extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function is_loginAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //查询是否登陆
        $user_id = $_SESSION['userinfo']['uid'];
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 1, 'tips' => '已登录');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}