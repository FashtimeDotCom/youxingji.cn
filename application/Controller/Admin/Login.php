<?php

/**
 *
 * 后台登录
 *
 * @author snake.L
 * @web http://www.vpcv.com/
 */
class Controller_Admin_Login extends Core_Controller_Action
{
    public function indexAction()
    {
        $this->display('admin/login.tpl');
    }

    public function loginAction()
    {
        if (!Core_Fun::isAjax()) {
            exit('ERROR');
        }
        $username = $this->getParam('username');
        $password = $this->getParam('password');
        //验证附加码
        $gdkey = $this->getParam('gdkey');
        //验证用户名密码格式
        if (empty($username) || empty($password)) {
            $arr['msg'] = -2;
        } elseif (!Core_Lib_Gdcheck::check($gdkey)) {
            $arr['msg'] = -3;
        } else {
            //验证用户名密码
            $userModel = new Model_User_Member();
            $user = $userModel->onLogin($username, $password);
            if (!$user) {
                $arr['msg'] = -1;
            } else {
                //将管理员状态赋给用户
                if ($_SESSION['isadmin'] = $user['uid']) {
                    $_SESSION['adminname'] = $user['username'];
                    $_SESSION['adminrealname'] = $user['realname'];
                    $_SESSION['admingid'] = $user['gid'];
                    $_SESSION['lastupdate'] = Core_Fun::time();
                    $arr['msg'] = 1;
                } else {
                    $arr['msg'] = 0;
                }
            }
        }
        echo core_Fun::array2json($arr);
    }

    public function logoutAction()
    {
        $userModel = new Model_User_Member();
        unset($_SESSION['isadmin']);
        unset($_SESSION['adminname']);
        unset($_SESSION['adminrealname']);
        unset($_SESSION['admingid']);
        if ($_SESSION['isadmin']) {
            $this->showmsg(Core_Fun::Lang('admin::login_exit_failed'), 'admin/index/index', 3);
        } else {
            $this->showmsg('', 'admin/login/index', 0);
        }
    }
}