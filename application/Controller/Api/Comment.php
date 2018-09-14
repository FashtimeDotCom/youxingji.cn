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





    //**************************************自己的评论系统的系统
    public function commentAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //评论人的ID
        $data=array();
        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再评论');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $data['uid']=$user_id;//用户ID
        $data['rid']=(int)$this->getParam('id');//文章ID

        //内容
        $content=addslashes(str_replace("\n", "<br />", $this->getParam("content")));//content
        //文章ID以及处理评论内容
        if (strlen(preg_replace('/\[  [^\)]+?  \]/x', '', $content)) < 10) {
            echo json_encode(array("status" => 0, "tips" => "评论的内容不能少于10个字符。"));
            exit;
        }

        $data['pid'] = (int)$this->getParam("pid")??0;//pid,顶层评论为0
        $data['pid_sub'] = (int)$this->getParam("pid_sub")??0;//pid_sub父节点

        $data['addtime'] = time();
        $data['content'] = addslashes($content);
        $data['status']=1;

        $res = M("comment")->add($data);

        if ($res > 0) {
            $cur_date = strtotime(date('Y-m-d'));
            $commentnum = C::M('comment')->where("uid = $user_id and addtime >= $cur_date")->getCount();
            if($commentnum <= 1){
                //赠送10经验
                C::M('user_member')->where("uid = $user_id")->setInc('exp', 10);
            }
            $json=array('status'=>1,'tips'=>'评论成功!');
        }else{
            $json = array('status' => 0, 'tips' => '评论失败，请重试');
        }

        echo Core_Fun::outputjson($json);
        exit;
    }


    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}