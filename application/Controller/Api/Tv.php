<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/6
 * Time: 14:07
 */
class Controller_Api_Tv extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 自己的个人中心查看tv
     * */
    public function self_tvAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        if( !$page || $page <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list=C::M("tv")->where("uid={$user_id}")->order("addtime DESC")->limit($limit)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
            }
            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    /*
 * 自己的个人中心查看日志
 * */
    public function self_travelAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        if( !$page || $page <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list=C::M("travel")->where("uid={$user_id}")->order("addtime DESC")->limit($limit)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
            }
            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    /*
* 自己的个人中心查看长篇游记
* */
    public function self_travel_noteAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        if( !$page || $page <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list=C::M("travel_note")->where("uid={$user_id}")->order("addtime DESC")->limit($limit)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
            }
            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }


}