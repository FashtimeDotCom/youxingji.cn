<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/15
 * Time: 09:38
 */
class Controller_Wap_Vote extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
        $this->is_weixinAction();
    }

    public function middleAction()
    {
        $this->display("wap/vote/vote_middle.tpl");
    }



    public function indexAction()
    {
        //vote_id,验证是否存在
        $vote_id=$this->getParam('vote_id');
        $this->check_voteIdAction($vote_id);

        //服务号的
        $data=array(
            'app_id'=>'wx9953ad5ae1108b51',
            'secrect'=>'d6ebb2111a2e498b8d81ed3f26765bd6',
            'redirect_url'=>urlencode('http://'.$_SERVER['HTTP_HOST'].'/index.php?m=wap&c=vote&v=set_openid&vote_id='.$vote_id),
            'scope'=>'snsapi_userinfo',
            'state'=>1,
            'response_type'=>'code',
            'vote_id'=>$vote_id
        );

        //验证是否有关注订阅号，如果没有则跳转到中间页面，并传递一个target_url链接
        $this->is_focusAction($data);
    }

    /*
     * 是否有关注订阅号
     * */
    private function is_focusAction($data)
    {
        if( isset($_SESSION['openid']) ){//有缓存openid
            $this->funAction($data['vote_id']);
        }else{//第一次登录
            //获取code
            $this->codeAction($data['app_id'],$data['redirect_url'],$data['state'],$data['scope'],$data['response_type']);
        }
    }

    private function funAction($vote_id,$access_token=""){
        //获取全局token
        $token=$_SESSION['access_token'];
        if( !$token || (time() > $_SESSION['expires_in'])  ){
            $token=Core_Fun::wx_set_token();
        }

        $openid=$_SESSION['openid'];
        if( !$openid ){//防止刷新
            $refresh_url="http://".$_SERVER['HTTP_HOST']."/index.php?m=wap&c=vote&v=index&vote_id=".$vote_id;
            header('Location: '.$refresh_url, true, 301);
            exit();
        }

        //获取用户基本信息，进而获取unionid
        $unionid=$_SESSION['unionid'];
        if( !$unionid ){
            $unionid=$this->get_userInfoAction($openid,$token,$access_token);
            if( !$unionid ){
                die("没有UnionID");
            }
        }

        //通过unionid去查找数据库
        $res=C::M("ding_user")->where("unionid='{$unionid}'")->field("id")->find();
        if( $res ){//订阅了
            $this->vote_detailAction($vote_id);
        }else{//没有订阅
            $this->display('wap/vote/vote_middle.tpl');
        }
    }

    public function set_openidAction(){
        $code=$this->getParam("code");
        if( !$code ){
            die("非法操作");
        }

        $vote_id=$this->getParam('vote_id');
        if( !$vote_id ){
            die("非法操作");
        }

        //通过code去获取openid
        $info=$this->access_infoAction($code,'wx9953ad5ae1108b51','d6ebb2111a2e498b8d81ed3f26765bd6');//openid & access_token
        if( $info ){
            $this->funAction($vote_id,$info['access_token']);
        }

    }

    /*
     * 获取用户的授权码
     *主要用来获取授权access_token和openid
     * **/
    private function codeAction($appid,$redirect_url,$state,$scope,$response_type){
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_url.'&response_type='.$response_type.'&scope='.$scope.'&state='.$state.'#wechat_redirect';
        header('Location: '.$url, true, 301);
    }

    /*
     *用户授权获取access_token,openid
     *设置sesison的openid
     * */
    private function access_infoAction($code,$appid,$secrect,$grant_type='authorization_code'){
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secrect.'&code='.$code.'&grant_type='.$grant_type;
        $res=file_get_contents($url);
        $res = json_decode($res, true);

        $arr=array(
            'openid'=>$res['openid'],
            'access_token'=>$res['access_token']
        );
        $_SESSION['openid']=$arr['openid'];
        return $arr;
    }

    /*
     * 获取用户信息,返回unionid
     * openid和全局token,第一次调用返回的信息判断是否关注
     * */
    private function get_userInfoAction($openid,$token,$access_token=""){
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$token.'&openid='.$openid.'&lang=zh_CN';
        $res=file_get_contents($url);
        $res = json_decode($res, true);
        if( isset($res['unionid']) && !empty($res['unionid']) ){
            $_SESSION['unionid']=$res['unionid'];
            return $res['unionid'];
        }else{//没有关注
            //返回openid,再次调用
            if( isset($res['subscribe']) && $res['subscribe']==0 ){
                $new_openid=$res['openid'];
                $unionID=$this->second_get_userInfoAction($new_openid,$access_token);
                return $unionID;
            }else{
                return false;
            }
        }
    }

    /*
     *第二次查找用户信息
     * openid
     * access_toekn
     * 这里的access_token是通过code获取的access_token,与openid一起返回
     * 第二次调用的路径与第一次调用的路径是不一样的
     *
     * */
    private function second_get_userInfoAction($openid,$access_token){
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN';
        $res=file_get_contents($url);
        $res = json_decode($res, true);
        if( isset($res['unionid']) && !empty($res['unionid']) ){
            $_SESSION['unionid']=$res['unionid'];
            return $res['unionid'];
        }else{
            return false;
        }
    }

    public function is_weixinAction(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') !== false ) {
            return true;
        }
        $this->showmsg('请您在微信内打开:)', 'index.php?m=wap&c=index&v=index', 3);
    }

    private function vote_detailAction($vote_id){
        $this->check_voteIdAction($vote_id);

        //获取vote_id对应的数据
        $info=C::M('activity_vote')->field('id,wechat_desc,title,thumbfile,activity_rules,vote_total,end_time,sponsor')->where(" id={$vote_id} and status=1 ")->find();
        if( $info ){
            $info['end_time']=!empty($info['end_time'])?date('Y/m/d H:i:s',strtotime($info['end_time'])):0;
            if( time() > strtotime($info['end_time']) ){//当前时间是否大于结束时间
                $info['is_effective']=0;
            }else{
                $info['is_effective']=1;
            }
        }

        //查找名单列表
        $sql="SELECT a.*,b.username,b.headpic FROM ##__activity_vote_result as a LEFT JOIN ##__user_member as b on a.uid=b.uid WHERE a.vote_id ={$vote_id} ORDER BY a.vote_num DESC,a.sort ASC";
        $list=Core_Db::fetchAll($sql);
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
            }
            $info['name_list']=$list;
            $info['player_num']=count($list);
        }

        //JS-API
        $this->wx_infoAction();
        $shareUrl="http://m.youxingji.cn/index.php?m=wap&c=vote&v=index&vote_id={$vote_id}";
        $this->assign("sharesUrl",$shareUrl);
        //要传openid过去
        $code=$this->encode_openidAction();
        $this->assign("code",$code);
        $this->assign("info",$info);
        $this->display('wap/vote/vote_list.tpl');
    }

    /*
     * 检查vote_id
     * */
    public function check_voteIdAction($vote_id){
        if( !$vote_id ){
            $this->showmsg('非法操作:)', 'index.php?m=wap&c=index&v=index', 3);
        }

        $info=C::M('activity_vote')->field('id,status,end_time')->where("id={$vote_id} and status=1")->find();
        if( !$info ){
            $this->showmsg('无效ID或投票已结束:)', 'index.php?m=wap&c=index&v=index', 3);
        }

//        if( !empty($info['end_time']) && ( time() > strtotime($info['end_time']) ) ){
//            $this->showmsg('投票已结束:)', 'index.php?m=wap&c=index&v=index', 3);
//        }
    }

    /*
     * 加密openid
     * */
    private function encode_openidAction(){
        $salt="kael";
        $openid=$_SESSION['openid'];
        $str=$salt.$openid;
        $code=base64_encode($str);
        return $code;
    }

    /*
 * 获取access_token之类信息
 * */
    private function wx_infoAction()
    {
        //获取access_token
        if( !isset($_SESSION['access_token']) || time() >$_SESSION['expires_in'] ){
            Core_Fun::wx_get_token();
        }

        $timestamp=time();
        $wxnonceStr="hezhihuishidatiancai".time();
        $url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //微信接口部分
        $wxticket = Core_Fun::wx_get_jsapi_ticket();
        $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
            $wxticket, $wxnonceStr, $timestamp, $url);

        $wxSha1 = sha1($wxOri);
        $this->assign('appid','wx9953ad5ae1108b51');
        $this->assign('timestamp', $timestamp);
        $this->assign('nonceStr', $wxnonceStr);
        $this->assign('signature', $wxSha1);
    }

}