<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/25
 * Time: 09:30
 */
class Controller_Wap_Faq extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    //达人问答二级页面
    public function indexAction()
    {
        //最热回答
        $sql="SELECT a.*,b.username,b.headpic FROM ##__faq as a LEFT JOIN ##__user_member as b on a.uid=b.uid WHERE a.status=1 and a.response_num>0 ORDER BY a.show_num DESC LIMIT 4";
        $list=Core_Db::fetchAll($sql);
        if( $list ){
            foreach($list as $key=>$value){
                if( $value['label'] ){
                    $list[$key]['label']=explode("/",$value['label']);
                    $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
                }
            }

            if( count($list)==4 ){
                $data=array_chunk($list,2,true);
            }else{
                $data[]=$list;
            }
        }

        //广告图
       $ad=C::M('base_ad')->field('imgurl,linkurl')->where("tagname='wap_faq'")->find();
       if($ad){
           $this->assign("ad",$ad);
       }

        //跳转链接加密
        $from_url=base64_encode("/index.php?m=wap&c=faq&v=set_faq");
        $this->assign('from_url',$from_url);

       //问达人
        $star_list=C::M('user_member')->field('uid,headpic,username')->where("is_faq_star=1")->limit(0,6)->select();
        if( $star_list ){
            foreach($star_list as $key=>$value){
                $star_list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
            }
            $this->assign("star_list",$star_list);
        }

        //问答总数.
        $total=array();
        $total['hot']=C::M('faq')->where("status=1 and response_num>0")->getCount();
        $total['new']=$total['hot'];
        $total['waiting']=C::M('faq')->where('status=1 and response_num=0')->getCount();
        $this->assign("total",$total);

        $this->assign("list",$data);
        $this->display('wap/faq/faq_list.tpl');
    }

    //问答详情页
    public function detailAction()
    {
        $id=$this->getParam("id");
        if( $id<=0 ){
            $this->showmsg('缺少参数', 'index.php?m=wap&c=faq&v=index', 2);
        }

        //通过ID查找问题
        $faq_info=C::M('faq as a')->field("a.*,b.username")->join("##__user_member as b","a.uid=b.uid","left")->where("a.id={$id}")->find();
        if( $faq_info ){
            C::M('faq')->where('id', $id)->setInc('show_num', 1);
            $this->assign("faq_info",$faq_info);
        }

        //跳转链接加密
        $from_url=base64_encode("/index.php?m=wap&c=faq&v=response_faq&id={$id}");
        $this->assign('from_url',$from_url);

        //查找回答总数
        $response_total=C::M('faq_response')->where("faq_id={$id}")->getCount();
        $this->assign("total",$response_total);

        //查找回答，4条
        $list=C::M('faq_response as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b',"a.uid=b.uid","left")->where("a.faq_id={$id}")->order('a.show_num desc')->limit(0,4)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
                //数据处理，只显示前面文字，过滤图片
                $list[$key]['content']=$this->filter_imagAction($value['content']);
            }
        }
        $this->assign("list",$list);
        $this->display('wap/faq/faq_detail.tpl');
    }

    /*
     * 过滤图片，读取文字
     * */
    public function filter_imagAction($content)
    {
        $content=urldecode($content);
        $content=strip_tags($content);//去掉HTML标签
        $content=substr($content,0,255);//只截取一部分
        return $content;
    }

    //发布问题
    public function set_faqAction()
    {
        //验证用户是否登录
        if(!$_SESSION['userinfo']){
            $this->showmsg('发布问题前，请您先进行登录!', 'index.php?m=wap&c=index&v=login', 2);
            exit;
        }

        $this->display('wap/faq/set_faq.tpl');
    }

    //我要回答
    public function response_faqAction()
    {
        //验证用户是否登录
        if(!$_SESSION['userinfo']){
            $this->showmsg('回答前，请您先进行登录!', 'index.php?m=wap&c=index&v=login', 2);
            exit;
        }
        $id=$this->getParam('id');
        if( !$id ){
            $this->showmsg('非法操作:)!', 'index.php?m=wap&c=index&v=index', 2);
            exit;
        }
        $this->assign("faq_id",$id);

        $info=C::M('faq')->field('title')->where("id={$id} and status=1")->find();
        if( $info ){
            $this->assign("info",$info);
        }else{
            $this->showmsg('问题不存在:)!', 'index.php?m=wap&c=index&v=index', 2);
            exit;
        }

        $this->display("wap/faq/response_faq.tpl");
    }

    /*
     * 回答详情页
     * */
    public function response_detailAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('无问题回答ID!', '/index.php?m=wap&c=faq&v=index', 2);
        }
        $join=array(
            array('##__user_member as b','a.uid=b.uid','left'),
            array('##__faq as c','c.id=a.faq_id','left')
        );
        $info=C::M('faq_response as a')->field('a.*,b.username,b.headpic,b.autograph,c.title')->joins($join)->where("a.id={$id}")->find();
        if( !$info ){
            $this->showmsg('问题回答不存在!', '/index.php?m=wap&c=faq&v=index', 2);
        }
        $info['content']=urldecode($info['content']);
        $info['res_account']=C::M('faq_response')->where("faq_id={$info['faq_id']}")->getCount();
        $info['res_account']=$info['res_account']-1;
        $info['headpic']=empty($info['headpic'])?'/resource/images/img-lb2.png':$info['headpic'];
        C::M('faq_response')->where('id', $id)->setInc('show_num', 1);

        $type=4;//分类
        $url="/index.php?m=wap&c=faq&v=response_detail&id={$id}";
        $page=$this->getParam("page")??1;
        $perpage=5;
        $this->pub_commentAction($id,$type,$url,$page,$perpage);

        //跳转链接加密
        $from_url=base64_encode($url);
        $this->assign('from_url',$from_url);

        $this->assign("info",$info);
        $this->display('wap/faq/response_detail.tpl');
    }

    /*
 * 评论公共方法
 * 参数：
 *  id:对应ID
 *  type:分类//1-日志 2-视频 3-游记 4-达人问答
 *  url:跳转链接
 *  curpage:当前页
 *  perpage:每页页数
 * */
    public function pub_commentAction($id,$type,$url,$curpage=1,$perpage=5)
    {
        //评论
        //获取总数
        $Num = C::M('comment')->where("rid={$id} and type={$type} and pid=0")->getCount();
        $limit = $perpage * ($curpage - 1) . "," . $perpage;
        $mpurl = $url;
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $comment=C::M("comment as a ")->field('a.*,b.headpic,b.username')->join("##__user_member as b","a.uid=b.uid","left")->where("rid={$id} and type={$type} and pid=0")->order("addtime DESC")->limit($limit)->select();
        if( $multipage ){
//            unset($multipage[0]);//first
            unset($multipage[count($multipage)-1]);
        }
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
            $son=array();
            $son=C::M('comment as a')->field("a.*,b.username,c.username as to_username")->joins($joins)->where("rid={$id} and type={$type} and pid={$value['id']}")->order('id ASC')->select();
            if( $son ){
                foreach( $son as $k=>$val ){
                    $son[$k]['content']=Core_Fun::ubbreplace($val['content']);
                }
                $comment[$key]['sub']=$son;
                unset($son);
            }
            $comment[$key]['count']=count($comment[$key]['sub']);
        }
        $this->assign('comment', $comment);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->assign('multipage', $multipage);
    }

}