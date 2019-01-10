<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/12/3
 * Time: 09:31
 */
class Controller_Index_Collection extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
        if(!$_SESSION['userinfo']){
            $this->showmsg('', 'index.php?m=index&c=index&v=login', 0);
            exit;
        }
        //我的关注
        $follow = C::M('follow')->where("uid = ".$this->userInfo['uid'])->limit('0,20')->select();
        $myfollow = array();
        $i = 0;
        foreach ($follow as $key => $value) {
            $key = $key + 1;
            $myfollow[$i][] = Core_Fun::getuiduserinfo($value['bid'], 'uid,username,headpic');
            //if($key % 2 == 0){
            $i = $i + 1;
            //}

        }

        //推荐达人
        $tjstar = C::M('user_member')->where("startop = 1")->order("rand()")->limit('0,8')->select();
        foreach ($tjstar as $key => $value) {
            $tjstar[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
        $this->assign('ns', 'user');
        $this->assign('tjstar', $tjstar);
        $this->assign('myfollow', $myfollow);
    }


    //收藏-日志
    public function collection_travelAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $where="a.type=1 and a.uid={$user_id}";
        if($keyword){
            $where .= " and a.title like '%$keyword%' ";
        }
        $perpage = 6;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        $sql="SELECT a.id as collect_id,a.t_id,a.add_time as collect_time,b.*,c.username,c.headpic FROM ##__collection as a LEFT JOIN ##__travel as b ON a.t_id=b.id LEFT JOIN ##__user_member as c ON c.uid=b.uid WHERE {$where} ORDER BY a.add_time DESC LIMIT {$limit}";
        $info=Core_Db::fetchAll($sql);
        if( $info ){
            foreach ($info as $key=>$value){
                $info[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                $info[$key]['picnum']=count(json_decode($value['content']));
                $info[$key]['content']=json_decode($value['content']);
                $info[$key]['headpic']=$info[$key]['headpic']??'/resource/images/img-lb2.png';
                $info[$key]['collect_time']=date('Y-m-d H:i:s',$value['collect_time']);
                if( $value['title']==NULL && $value['describes']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }

        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $Num = C::M('collection as a')->where($where)->getCount();
        $mpurl = "index.php?m=index&c=collection&v=collection_travel";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display("user/collection/collection_travel.tpl");
    }


    //收藏-tv
    public function collection_tvAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $where="a.type=2 and a.uid={$user_id}";
        if($keyword){
            $where .= " and a.title like '%$keyword%' ";
        }
        $perpage = 6;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        $sql="SELECT a.id as collect_id,a.t_id,a.add_time as collect_time,b.*,c.username,c.headpic FROM ##__collection as a LEFT JOIN ##__tv as b ON a.t_id=b.id LEFT JOIN ##__user_member as c ON c.uid=b.uid WHERE {$where} ORDER BY a.add_time DESC LIMIT {$limit}";
        $info=Core_Db::fetchAll($sql);

        if( $info ){
            foreach ($info as $key=>$value){
                $info[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                $info[$key]['content']=json_decode($value['content']);
                $info[$key]['headpic']=$info[$key]['headpic']??'/resource/images/img-lb2.png';
                $info[$key]['collect_time']=date('Y-m-d H:i:s',$value['collect_time']);
                if( $value['title']==NULL && $value['describes']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }
        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $Num = C::M('collection as a')->where($where)->getCount();
        $mpurl = "index.php?m=index&c=collection&v=collection_tv";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display("user/collection/collection_tv.tpl");
    }

    //收藏-游记
    public function collection_noteAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $where="a.type=3 and a.uid={$user_id}";
        if($keyword){
            $where .= " and a.title like '%$keyword%' ";
        }
        $perpage = 6;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        $sql="SELECT a.id as collect_id,a.t_id,a.add_time as collect_time,b.*,c.username,c.headpic FROM ##__collection as a LEFT JOIN ##__travel_note as b ON a.t_id=b.id LEFT JOIN ##__user_member as c ON c.uid=b.uid WHERE {$where} ORDER BY a.add_time DESC LIMIT {$limit}";
        $info=Core_Db::fetchAll($sql);

        if( $info ){
            foreach ($info as $key=>$value){
                $info[$key]['content']=urldecode($value['content']);
                $info[$key]['headpic']=$info[$key]['headpic']??'/resource/images/img-lb2.png';
                $info[$key]['collect_time']=date('Y-m-d H:i:s',$value['collect_time']);
                if( $value['title']==NULL && $value['desc']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }

        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $Num = C::M('collection as a')->where($where)->getCount();
        $mpurl = "index.php?m=index&c=collection&v=collection_note";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display("user/collection/collection_note.tpl");
    }

    /*
    * 收藏问题
    *
    * */
    public function collection_faqAction()
    {
        $user_id = $_SESSION['userinfo']['uid'];

        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $where="a.type=4 and a.uid={$user_id}";
        if($keyword){
            $where .= " and a.title like '%$keyword%' ";
        }
        $perpage = 6;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        $sql="SELECT a.id as collect_id,a.t_id,a.add_time as collect_time,b.*,c.username,c.headpic FROM ##__collection as a LEFT JOIN ##__faq as b ON a.t_id=b.id LEFT JOIN ##__user_member as c ON c.uid=b.uid WHERE {$where} ORDER BY a.add_time DESC LIMIT {$limit}";
        $info=Core_Db::fetchAll($sql);
        if( $info ){
            foreach($info as $key=>$value){
                if( $value['title']==NULL && $value['desc']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }
        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $Num = C::M('collection as a')->where($where)->getCount();
        $mpurl = "index.php?m=index&c=collection&v=collection_faq";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display("user/collection/collection_faq.tpl");
    }

    /*
   * 统计日志，视频，游记，问题总数
   * */
    protected function totalAction($uid)
    {
        $data=array();
        //日志
        $travel_num=0;
        $travel_num=C::M('collection')->where("uid={$uid} and type=1")->getCount();
        $data['travel_num']=$travel_num;

        //视频
        $tv_num=0;
        $tv_num=C::M('collection')->where("uid={$uid} and type=2")->getCount();
        $data['tv_num']=$tv_num;

        //游记
        $note_num=0;
        $note_num=C::M('collection')->where("uid={$uid} and type=3")->getCount();
        $data['note_num']=$note_num;

        //问答，暂时没有，0
        $answer=0;
        $answer=C::M('collection')->where("uid={$uid} and type=4")->getCount();
        $data['faq_num']=$answer;

        return $data;

    }



}