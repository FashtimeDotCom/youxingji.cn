<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/16
 * Time: 09:49
 */
class Controller_Api_Comment extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 判断用户是否登录，获取用户信息
     *
     * */
    public function get_userinfoAction()
    {
        $flag=$this->getParam("flag");
        if( $flag ){
            $flag=true;
        }else{
            $flag=false;
        }
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            //按照畅言格式
            $json = array(
                'is_login'=>0,
                "user"=>array(
                    "user_id"=>'',
                    "nickname"=>'',
                    "img_url"=>'images/img-lb2.png',
                    "profile_url"=>'',
                    "sign"=>"**" //注意这里的sign签名验证已弃用，任意赋值即可
                )
            );
        }else{
            //查找用户信息
            $info=C::M("user_member")->field('uid,username,headpic')->where("uid ={$uid}")->find();
            if( empty($info['headpic']) ){
                $info['headpic']="http://www.youxingji.cn/resource/images/img-lb2.png";
            }
            if( $info ){
                $json=array(
                    "is_login"=>1, //已登录，返回登录的用户信息
                    "user"=>array(
                        "user_id"=>(int)$info['uid'],
                        "nickname"=>$info['username'],
                        "img_url"=>$info['headpic'],
                        "profile_url"=>$_SERVER['HTTP_HOST']."/index.php?m=index&c=muser&v=index&id={$info['uid']}",
                        "sign"=>"**" //注意这里的sign签名验证已弃用，任意赋值即可
                    ));
            }else{
                $json = array(
                    'is_login'=>0,
                    "user"=>array(
                        "user_id"=>'',
                        "nickname"=>'',
                        "img_url"=>'images/img-lb2.png',
                        "profile_url"=>'',
                        "sign"=>"**" //注意这里的sign签名验证已弃用，任意赋值即可
                    )
                );
            }
        }

        if(!$flag){//畅言调用
            echo $_GET['callback'].'('.json_encode($json).')';
            exit();
        }else{//自己调用
            echo json_encode($json);
            exit();
        }

    }

    /*
     * 畅言退出登录时,会调用平台接口，同步
     * */
    public function logout_commentAction()
    {
        unset($_SESSION['userinfo']);
        $data=array(
            'code'=>1,//success
            'reload_page'=>1,//刷新
            'js_src'=>'window.location.reload();'
        );
        echo $_GET['callback'].'('.json_encode($data).')';
        exit();
    }




}