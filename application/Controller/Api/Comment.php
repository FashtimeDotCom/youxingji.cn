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
        $data['rid']=(int)$this->getParam('rid');//文章ID
        $data['type']=(int)$this->getParam("type");//分类，1-日志 2-视频 3-游记 4-问答
        $data['touid']=(int)$this->getParam("touid");

        //内容
        $content=addslashes(str_replace("\n", "<br />", $this->getParam("content")));//content
        //文章ID以及处理评论内容
        if (strlen(preg_replace('/\[  [^\)]+?  \]/x', '', $content)) < 10) {
            echo json_encode(array("status" => 0, "tips" => "评论的内容不能少于10个字符。"));
            exit;
        }

        $data['pid'] = (int)$this->getParam("pid")??0;//pid,一级评论为0,二级、三级评论为对应ID
        $data['pid_sub'] = (int)$this->getParam("pid_sub")??0;//pid_sub父节点

        $data['addtime'] = time();
        $data['content'] = $content;
        $data['status']=1;

        $res = C::M("comment")->add($data);

        if ($res > 0) {
            $cur_date = strtotime(date('Y-m-d'));
            $commentnum = C::M('comment')->where("uid = $user_id and addtime >= $cur_date")->getCount();
            if($commentnum <= 1){
                //赠送10经验
                C::M('user_member')->where("uid = $user_id")->setInc('exp', 10);
            }
            $username=C::M('user_member')->field('username,headpic')->where("uid={$user_id}")->find();
            $to_username=C::M('user_member')->field('username,headpic')->where("uid={$data['touid']}")->find();
            $response=array(
                'id'=>$res,//ID，作为吓一条的pid_sub
                'uid'=>$user_id,//评论人的ID,作为下一条回复对象touid
                'username'=>$username['username'],
                'to_username'=>$to_username['username'],
                'headpic'=>empty($username['headpic'])?'/resource/images/img-lb2.png':$username['headpic'],
                'to_headpic'=>$to_username['headpic']??'/resource/images/img-lb2.png',
                'addtime'=>date("Y-m-d H:i:s",time())
            );

            $json=array('status'=>1,'tips'=>'评论成功!','datas'=>$response);
        }else{
            $json = array('status' => 0, 'tips' => '评论失败，请重试');
        }

        echo Core_Fun::outputjson($json);
        exit;
    }


    /*
     * 评论点赞
     * */
    public function zanAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $comment_id=$this->getParam("id");
        if( !$comment_id || $comment_id<=0 ){
            $json = array('status' => 0, 'tips' => '参数错误!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $info=C::M('comment')->field('id,top_num')->where("id={$comment_id} and status=1")->find();
        if( $info ){
            $data['top_num']=intval($info['top_num'])+1;
            $res=C::M('comment')->where("id={$comment_id}")->update($data);
            if( $res ){
                $json = array('status' => 1, 'tips' => '点赞成功!','data'=>$data);
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '点赞失败!');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }else{
            $json = array('status' => 0, 'tips' => '记录不存在!');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    /*
     * 按分类排序
     * */
    public function comment_listAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $rid=$this->getParam('rid');//文章ID
        $type=$this->getParam("type");//分类ID，1-日志 2-视频 3-游记 4-问答
        $curpage=$this->getParam("page")??1;//页数
        $sort_type=$this->getParam("sort_type")??1;//排序分类，1-按发布时间，2-按照热度
        if( !$rid || !$type ){
            $json = array('status' => 0, 'tips' => '参数错误!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $Num = C::M('comment')->where("rid={$rid} and type={$type} and pid=0")->getCount();
        $perpage = 5;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        if( $sort_type==1 ){//时间
            $order="a.addtime desc";
        }else{//热度，即点赞数
            $order="a.top_num desc";
        }

        $uid=$_SESSION['userinfo']['uid'];
        if( $uid ){
            $is_login=1;
        }else{
            $is_login=0;
        }
        //一级评论
        $comment=C::M("comment as a ")->field('a.*,b.headpic,b.username')->join("##__user_member as b","a.uid=b.uid","left")->where("rid={$rid} and type={$type} and pid=0")->order($order)->limit($limit)->select();
        if( $comment ){
            $joins=array(
                array('##__user_member as b','a.uid=b.uid','left'),
                array('##__user_member as c','a.touid=c.uid','left')
            );
            foreach ($comment as $key => $value) {
                $comment[$key]['headpic']=empty($value['headpic'])?'resource/images/img-lb2.png':$value['headpic'];
                $comment[$key]['lou'] = $curpage * $perpage + $key - 4;
                $comment[$key]['content'] = Core_Fun::ubbreplace($value['content']);
                $comment[$key]['addtime'] = date('Y-m-d H:i', $value['addtime']);
                //查找对应一级节点的子评论，子子评论。一般只有三级结构,二级三级显示都是同一级显示
                $comment[$key]['sub']=C::M('comment as a')->field("a.*,b.username,c.username as to_username")->joins($joins)->where("rid={$rid} and type={$type} and pid={$value['id']}")->order('id ASC')->select();
                $comment[$key]['count']=count($comment[$key]['sub']);
                $comment[$key]['is_login']=$is_login;
            }

            $json = array('status' => 1, 'tips' =>$comment );
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' => '我也是有底线的啊!');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }


    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}