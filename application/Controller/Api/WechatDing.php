<?php
/**
 * Created by PhpStorm.
 * 微信订阅号编辑
 * User: Kael
 * Date: 2018/8/20
 * Time: 17:00
 */
class Controller_Api_WechatDing extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 微信服务器验证
     * */
    public function check_wechatAction(){
        $signature=$this->getParam("signature");
        $timestamp=$this->getParam("timestamp");
        $nonce=$this->getParam("nonce");
        $echostr=$this->getParam('echostr');

        if( empty($echostr) ){
            $this->parseDataAction();
        }else{
            if( $this->checkSignatureAction($signature,$timestamp,$nonce) ){
                echo $echostr;
                exit();
            }
        }
    }

    public function checkSignatureAction($signature,$timestamp,$nonce){
        $tmpArr=array('youxingji123456',$timestamp,$nonce);
        sort($tmpArr,SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr==$signature  ){//验证成功
            return true;
        }else{
            return false;
        }
    }

    public function parseDataAction(){
        $postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : "";//php7+不再使用改方法
        if( empty($postStr) ){
            $postStr = file_get_contents('php://input');
        }

        if( !empty($postStr) ){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            //接收关注事件推送：用户关注微信号后，将会受到一条的消息
            if( strtolower($postObj->MsgType)=='event' ){
                //判断哪种事件
                switch( strtolower($postObj->Event) ){
                    case 'subscribe':  #订阅事件
                        $res=$this->subscribeAction($postObj);
                        break;
                    case 'unsubscribe': #取消订阅事件
                        $res=$this->unsubscribeAction($postObj);
                        break;
                    case 'click':
                        $res=$this->nav_clickAction($postObj);
                        break;
                }
                echo $res;
                exit();
            }

            if( strtolower($postObj->MsgType)=='text' ){
                $res=$this->response_textAction($postObj);
                echo $res;
                exit();
            }


        }else{
            echo 'nothing';
            exit();
        }
    }

    /*
     * 订阅事件
     * */
    public function subscribeAction($postObj){
        $toUser=$postObj->FromUserName;//用户
        $fromUser=$postObj->ToUserName;//开发者
        $token=$this->tokenAction();

        //获取用户的基本信息
        $user_info=$this->get_userinfoAction($token,$toUser);
        if( $user_info ){
            $res=C::M('ding_user')->add($user_info);
            if( $res ){//发送一条推送消息,默认的消息
                $time=time();
                $msgType='text';
                $content='感谢您关注游行迹！

我们是个“三新二意”的旅行互动平台，每天为你呈现最新鲜的旅游资讯，如果你爱旅游，我们会带你开启公益＋社会实践的旅行新模式；如果你很文艺，我们会让你和画家开启不一样的旅行；如果你是旅游达人，我们会为你提供一个最好的展示平台，旅程漫漫，希望与你同行！

 回复【1】带你开启特别的旅行
 回复【2】带你体验我负责出钱，你负责出发的新主张
 回复【3】带你和画家一起开启绘画之旅
 回复【4】加入达人邦，成为旅游达人
 回复【5】可以联系我们';
                //回复消息模版
                $info=$this->text_template($toUser,$fromUser,$time,$msgType,$content);
                return $info;
            }
        }
    }

    /*
     * 取消订阅
     *
     * */
    public function unsubscribeAction($postObj){
        $toUser=$postObj->FromUserName;//用户
        $fromUser=$postObj->ToUserName;//开发者

        //删除用户数据
        $res=C::M('ding_user')->where(" openid='{$toUser}' ")->delete();
        if( $res ){
            return 'success';
        }else{
            return 'faile';
        }
    }

    /*
    * 自定义菜单推送事件
    * 参数:key
    * */
    private function nav_clickAction($postObj){
        $toUser=$postObj->FromUserName;//用户
        $fromUser=$postObj->ToUserName;//开发者
        $time=time();

        //click事件推送
        $key=strtolower($postObj->EventKey);
        $res="";
        switch( $key ){
            case "star"://达人招募
                $content['title']="招募 |集结号吹响，100个“旅游达人”席位等你来占，你报名了吗？";
                $content['description']="别犹豫啦，我们等的就是你！";
                $content['thumbfile']="http://mmbiz.qpic.cn/mmbiz_jpg/gL551HvCJ22xSS7vON7PWNWRmSwttJqNQ8gm93xHgOhaychibJD41jhsEJOicm8vMLVwFrWFTM7nGFWqQ3W4v6TQ/0?wx_fmt=jpeg";
                $content['url']="http://mp.weixin.qq.com/s?__biz=MzU0NTYzMTgwMQ==&mid=100000004&idx=1&sn=00613b6f096d28db7e7389ae025f71bc&chksm=7b68ba524c1f33440d87e49ae683857b3259edc57ff098728f4cc48ececf6e35b54a2c481272#rd";

                $res=$this->template1Action($toUser,$fromUser,$time,'news',$content);
                break;
            case "writer"://画家招募
                $content['title']="招募| 画家，您好！等您携丹青宝画来入驻，与游行迹来一场“寻访之旅";
                $content['description']="游画”已成，虚位以待，等您入驻！";
                $content['thumbfile']="http://mmbiz.qpic.cn/mmbiz_jpg/gL551HvCJ21etica20wuHbrNsP6Hic93ePwOSib6xkW43ESSkSsOtUar3SXXCZPoNpxG7lJh3xficlMsAQOJZ5mEew/0?wx_fmt=jpeg";
                $content['url']="http://mp.weixin.qq.com/s?__biz=MzU0NTYzMTgwMQ==&mid=100000151&idx=1&sn=944fadf42f4bac21f4bdc02b47fd7deb&chksm=7b68bac14c1f33d76b990e12196a62080a765727bf8658407249e5669b073cc012947f0dddc4#rd";

                $res=$this->template1Action($toUser,$fromUser,$time,'news',$content);
                break;
            case "business_corporation"://商务合作
                $content="游行迹，这是一个“三新二意”的O2O旅行互动平台。
“三新”：新主张、新模式、新融合
“二意”：有创意、有新意
欢迎您，请与我们共同成长！

微博：@游行迹
电话：4009-657-018
邮箱：youxingji@playpostcard.com
官网：http://www.youxingji.cn/";
                $res=$this->text_template($toUser,$fromUser,$time,'text',$content);
                break;
            case 'vote':
                $list=C::M('activity_vote')->field('id,title,thumbfile,wechat_desc')->where("status=1 and NOW() <=end_time")->order('id desc')->limit(0,5)->select();
                if( $list ){
                    foreach( $list as $key=>$value ){
                        $list[$key]['url']="http://".$_SERVER['HTTP_HOST']."/index.php?m=wap&c=vote&v=index&vote_id=".$value['id'];
                        $list[$key]['thumbfile']="http://".$_SERVER['HTTP_HOST'].$value['thumbfile'];
                    }
                    $res=$this->batch_templateAction($toUser,$fromUser,$time,'news',$list);
                }else{
                    $content="暂时无投票活动:)";
                    $res=$this->text_template($toUser,$fromUser,$time,'text',$content);
                }
                break;
        }
        return $res;
    }

    private function response_textAction($postObj){
        $toUser=$postObj->FromUserName;//用户
        $fromUser=$postObj->ToUserName;//开发者
        $time=time();

        $key=trim($postObj->Content);
        switch($key){
            case 1:
                $content="点击<a href=\"http://www.youxingji.cn/index.php?m=wap&c=index&v=journeydetail&id=13\">游主张</a>开启你的特别之旅";
                break;
            case 2:
                $content='点击<a href="http://www.youxingji.cn/index.php?m=wap&c=index&v=recruiting&id=1">“我负责出钱，你负责出发”</a>进入不一样的旅行主张';
                break;
            case 3:
                $content='和画家一起开启<a href="http://www.youxingji.cn/index.php?m=wap&c=index&v=recruiting&id=1">游画之旅</a>';
                break;
            case 4:
                $content='点击进入<a href="http://www.youxingji.cn/index.php?m=wap&c=index&v=star">达人邦</a>，上传你的游记，成为旅游达人';
                break;
            case 5:
                $content='联系方式
微博：@游行迹
电话：4009-657-018
邮箱：youxingji@playpostcard.com
官网：http://www.youxingji.cn';
                break;
            case '报名':
                $content='点击链接即可报名http://cn.mikecrm.com/wmom8Pi';
                break;
            case '转发':
                $content='#墙裂推荐#游行迹达人种子招募了解一下：是大学生，爱旅游，就可报名，魅力出国游，等你来！ 点击链接http://u6714665.viewer.maka.im/pcviewer/BYCX3CDL';
                break;
            case '文化体验':
                $content='点击链接即可报名 http://cn.mikecrm.com/GZTfvnh';
                break;
            default:
                $content="游行迹官网http://www.youxingji.cn/index.php?m=wap&c=index&v=index";
                break;
        }

        $res=$this->text_template($toUser,$fromUser,$time,'text',$content);
        return $res;
    }



    /*
     * 定义文本消息模版
     * */
    public function text_template($toUser,$fromUser,$time,$msgType='text',$content){
        $template="
                    <xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
        $info=sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
        return $info;
    }

    /*
     * 定义图文消息模版
     *
     * */
    public function template1Action($toUser,$fromUser,$time,$msgType='news',$content){

        $template="<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <ArticleCount>1</ArticleCount>
                        <Articles>
                            <item>
                                <Title><![CDATA[%s]]></Title> 
                                <Description><![CDATA[%s]]></Description>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                            </item>                     
                        </Articles>
                   </xml>";

        $res=$info=sprintf($template,$toUser,$fromUser,$time,$msgType,$content['title'],$content['description'],$content['thumbfile'],$content['url']);
        return $res;
    }

    /*
    * 定义多调图文消息模版
    *
    * */
    public function batch_templateAction($toUser,$fromUser,$time,$msgType='news',$content){
        $count=count($content);
        $head_temp="<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <ArticleCount>{$count}</ArticleCount>
                        <Articles>";
        $head=sprintf($head_temp,$toUser,$fromUser,$time,$msgType);

        $item_str="";
        foreach ( $content as $key=>$value ){
            $item_temp=" <item>
                                <Title><![CDATA[%s]]></Title> 
                                <Description><![CDATA[%s]]></Description>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                            </item>";
            $item_str.=sprintf($item_temp,$value['title'],$value['wechat_desc'],$value['thumbfile'],$value['url']);
        }

        $footer_temp="</Articles>
                   </xml>";
        $res=$head.$item_str.$footer_temp;
        return $res;
    }


    /***************************从微信服务器拉数据*****************************************
     *
     * 从微信那里拉下所有订阅号用户的openid
     * 作废
     * */
//    private function pull_dataAction()
//    {
//        if( !isset($_SESSION['access_token']) ){
//            $token=$this->tokenAction();
//        }else{
//            $token=$_SESSION['access_token'];
//        }
//
//        //获取关注用户的opened列表,及用户信息
//        $user_info=$this->get_openidsAction($token);
//        if( $user_info ){
//
//        }
//    }
//
//    /*
//     * 获取opened列表
//     * */
//    private function get_openidsAction($token,$next_openid="oOQxW02Kd-Jfy2TGWiAbWUiFMyyM"){
//        $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$token}&next_openid={$next_openid}";
//        $res=$this->get_curlAction($url);
//        if( $res ){
//            $res_arr=json_decode($res,TRUE);
//            if( $res_arr['total']>0 ){//有用户关注
//                $open_arr=$res_arr['data']['openid'];
//                //循环查找用户基本信息
//                foreach($open_arr as $key=>$value){
//                    //调用微信接口获取用户信息
//                    $data=$this->get_userinfoAction($token,$value);
//                    C::M("ding_user")->add($data);
//                    unset($data);
//                }
//            }
//        }
//        die('success');
//    }

    /*
     * 获取用户基本信息
     * token
     * openid
     * */
    public function get_userinfoAction($token,$openid){
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$token}&openid={$openid}&lang=zh_CN";
        $user_info=$this->get_curlAction($url);
        if( $user_info ){
            $data=array();
            $user_info=json_decode($user_info,TRUE);
            $data['openid']=$user_info['openid'];
            $data['unionid']=$user_info['unionid'];
            $data['subscribe']=$user_info['subscribe'];
            $data['nickname']=$user_info['nickname'];
            $data['sex']=$user_info['sex'];
            $data['headimgurl']=$user_info['headimgurl'];
            $data['subscribe_time']=$user_info['subscribe_time'];
            $data['subscribe_scene']=$user_info['subscribe_scene'];
            return $data;
        }
        return false;
    }

    /*
  * 获取全局的access_token
  * 订阅号的
  * */
    private function tokenAction($appid="wx19bc331b1ee974b5",$secrect="fe4a6a53c5936fd54aa425c8e4e4d738"){
        if( isset($_SESSION['ding_access_token']) ){
            $token=$_SESSION['ding_access_token'];
        }else{
            $res = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secrect}");
            $res = json_decode($res, true);
            $token = $res['access_token'];
            $_SESSION['ding_access_token'] = $token;
        }
        return $token;
    }

    private function get_curlAction($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return $response;
        }
    }

    public function post_curlAction($url, $params, $timeout=30)
    {
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return ($data);
    }



    /*
     * 自定义微信目录
     *
     * */
    public function set_navAction(){
        $nav=array();
        $nav['button']=array(
            array(
                'name'=>'免费游',
                'sub_button'=>array(
                    array(
                        'type'=>'view',
                        'name'=>'报名链接',
                        'url'=>'http://cn.mikecrm.com/jcokYeI'
                    ),
                    array(
                        'type'=>'click',
                        'name'=>'人气投票',
                        'key'=>'vote'
                    )
                )
            ),
            array(
                'type'=>'view',
                'name'=>'微官网',
                'url'=>'http://m.youxingji.cn'
            ),
            array(
                'name'=>'招募合作',
                'sub_button'=>array(
                    array(
                        'type'=>'click',
                        'name'=>'达人招募',
                        'key'=>'star'
                    ),
                    array(
                        'type'=>'click',
                        'name'=>'画家招募',
                        'key'=>'writer'
                    ),
                    array(
                        'type'=>'click',
                        'name'=>'商务合作',
                        'key'=>'business_corporation'
                    )
                )
            )
        );
        $str=json_encode($nav);
        echo $str;
    }

    /*
     * 获取永久素材列表
     * */
    public function get_sourceAction(){
        $token=$this->tokenAction();
        $offset=$this->getParam("offset")??20;
        $url="https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token={$token}";
        $data=array(
            'type'=>'news',
            'offset'=>$offset,
            'count'=>20
        );
        $str=json_encode($data);
        $list=$this->post_curlAction($url,$str);
        var_dump($list);die();
    }



}