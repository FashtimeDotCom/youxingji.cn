<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/16
 * Time: 09:33
 */
class Controller_Index_Travel extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function old_travel_detailAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('非法操作，跳转中...', '', 2);
        }

        $mdl=new Model_Swimdetail();
        $one=$mdl->get_one_detail($id);

        if( !$one ){
            $this->showmsg('ID不存在，跳转中...', '', 2);
        }
        $info=$one[0];
        $info['content']=json_decode($info['content']);
        $info['headpic']=$info['headpic']??"/resource/images/img-lb2.png";
        $info['describes']=Core_fun::cn_substr(strip_tags($info['describes']),250,'...');
        $info['addtime']=date("Y-m-d H:i:s",$info['addtime']);

        C::M('travel')->where('id', $id)->setInc('shownum', 1);

        //相关动态
        $uid=$info['uid'];
        $ano_info=$mdl->get_batch_detail($uid,$id);
        if( $ano_info ){
            foreach( $ano_info as $key=>$value ){
                $ano_info[$key]['content']=json_decode($value['content']);
                $ano_info[$key]['content']=$ano_info[$key]['content'][0];
                $ano_info[$key]['describes']=Core_fun::cn_substr(strip_tags($ano_info[$key]['describes']),150,'...');
                $ano_info[$key]['addtime']=date("Y-m-d H:i:s",$ano_info[$key]['addtime']);
            }
            $this->assign("ano_info",$ano_info);
        }

        //生成畅言的source_id
        $source_id=Core_Fun_Encode::createSourceId("pc",'drb',$id);
        $this->assign("source_id",$source_id);

        //目的在
        $tourismlist = C::M('tourism')->select();
        $this->assign ('tourismlist', $tourismlist);

        $this->assign("info",$info);
        $this->assign('ns', 'star');
        $this->assign("id",$id);
        $this->display('index/travel_detail.tpl');
    }

    //新版-达人日志
    public function travel_listAction()
    {
        $perpage = 7;
        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $type=htmlspecialchars($this->getParam('type'));
        $type=!$type?1:$type;
        $where="";
        if($keyword){
            $where = " describes like '%$keyword%' or title like '%$keyword%' and status = 1 ";
        }else{
            $where=" status=1 ";
        }

        if( $type==1 ){//最新
            $order="addtime desc";
        }else{//热门
            $order="shownum desc";
        }

        $Num = C::M('travel')->where($where)->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=travel&v=travel_list&keyword=$keyword";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $list = C::M('travel')->where($where)->order($order)->limit($perpage * ($curpage - 1), $perpage)->select();

        foreach ($list as $key => $value) {
            $list[$key]['content'] = json_decode($value['content']);
            $list[$key]['picnum'] = count(json_decode($value['content']));
            $list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
            $list[$key]['describes']=Core_Fun_Encode::mynl2br($value['describes']);
        }

        //推荐达人
        $tjstar = C::M('user_member')->where("weektop = 1")->order("rand()")->limit('0,1')->select();
        if($tjstar){
            $tjstar[0]['avatar'] = $tjstar[0]['headpic']?$tjstar[0]['headpic']:'/resource/images/img-lb2.png';
        }
        //目的在
        $tourismlist = C::M('tourism')->select();

        $this->assign('tjstar', $tjstar);
        $this->assign('list', $list);
        $this->assign('num', $Num);
        $this->assign('ns', 'star');
        $this->assign("type",$type);
        $this->assign ('keyword', $keyword);
        $this->assign ('multipage', $multipage);
        $this->assign ('tourismlist', $tourismlist);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage)));
        $this->display('index/new_travel.tpl');
    }

    public function travel_detailAction(){
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('无日志ID!', '/index.php?m=index&c=index&v=tv', 2);
        }
        $info=C::M('travel as a')->field('a.*,b.username,b.headpic,b.autograph')->join("##__user_member as b",'a.uid=b.uid','left')->where("id={$id} and status=1")->find();
        if( !$info ){
            $this->showmsg('日志不存在!', '/index.php?m=index&c=index&v=tv', 2);
        }
        $info['content']=json_decode($info['content']);
        $info['picnum']=count($info['content']);
        $info['describes']=Core_Fun_Encode::mynl2br($info['describes']);
        C::M('travel')->where('id', $id)->setInc('shownum', 1);

        //相关动态
        $uid=$info['uid'];
        $ano_info=C::M('travel as a')->field('a.id,a.content,a.uid,a.shownum,a.topnum,a.addtime,a.describes,b.username,b.headpic')->join('##__user_member as b','b.uid=a.uid','left')->where("a.uid={$uid} and status=1 and a.id !={$id}")->order('a.addtime desc')->limit(-0,2)->select();
        if( $ano_info ){
            foreach( $ano_info as $key=>$value ){
                $ano_info[$key]['content']=json_decode($value['content']);
                $ano_info[$key]['content']=$ano_info[$key]['content'][0];
                $ano_info[$key]['addtime']=date("Y-m-d H:i:s",$ano_info[$key]['addtime']);
            }
            $this->assign("ano_info",$ano_info);
        }

        //目的在
        $tourismlist = C::M('tourism')->select();

        $type=1;//分类
        $url="/index.php?m=index&c=travel&v=travel_detail&id={$id}";
        $page=$this->getParam("page")??1;
        $perpage=5;
        $this->pub_commentAction($id,$type,$url,$page,$perpage);

        //跳转链接加密
        $from_url=base64_encode($url);
        $this->assign('from_url',$from_url);

        $this->assign("info",$info);
        $this->assign('ns', 'star');
        $this->assign ('tourismlist', $tourismlist);
        $this->display('index/new_travel_detail.tpl');
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
        if( $multipage ){
//            unset($multipage[0]);//first
            unset($multipage[count($multipage)-1]);
        }
        $comment=C::M("comment as a ")->field('a.*,b.headpic,b.username')->join("##__user_member as b","a.uid=b.uid","left")->where("rid={$id} and type={$type} and pid=0")->order("addtime DESC")->limit($limit)->select();

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