<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/17
 * Time: 14:11
 */
class Controller_Wap_Collection extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
        if(!$_SESSION['userinfo']){
            $this->showmsg('', 'index.php?m=wap&c=index&v=login', 0);
            exit;
        }
    }

    //收藏-日志
    public function collection_travelAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $sql="SELECT a.t_id,b.* FROM ##__collection as a LEFT JOIN ##__travel as b ON a.t_id=b.id WHERE a.type=1 and a.uid={$user_id} ORDER BY a.add_time DESC Limit 4";
        $info=Core_Db::fetchAll($sql);
        if( $info ){
            foreach ($info as $key=>$value){
                $info[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                $info[$key]['content']=json_decode($value['content']);
                if( $value['title']==NULL && $value['describes']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }
        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $this->display("wap/user/collection_travel.tpl");

    }


    //收藏-tv
    public function collection_tvAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $sql="SELECT a.t_id,b.* FROM ##__collection as a LEFT JOIN ##__tv as b ON a.t_id=b.id WHERE a.type=2 and a.uid={$user_id} ORDER BY a.add_time DESC Limit 4";
        $info=Core_Db::fetchAll($sql);
        if( $info ){
            foreach ($info as $key=>$value){
                $info[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                if( $value['title']==NULL && $value['describes']==NULL ){
                    $info[$key]['is_delete']=1;
                }
            }
            $this->assign("list",$info);
        }
        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $this->display("wap/user/collection_tv.tpl");
    }

    //收藏-游记
    public function collection_noteAction(){
        $user_id = $_SESSION['userinfo']['uid'];

        $sql="SELECT a.t_id,b.* FROM ##__collection as a LEFT JOIN ##__travel_note as b ON a.t_id=b.id  WHERE a.type=3 and a.uid={$user_id} ORDER BY a.add_time DESC Limit 4";
        $info=Core_Db::fetchAll($sql);
        if( $info ){
            foreach ($info as $key=>$value){
                if( trim($value['tag']) ){
                    $info[$key]['tag']=explode("/",$value['tag']);
                    if( $value['title']==NULL && $value['desc']==NULL ){
                        $info[$key]['is_delete']=1;
                    }
                }
            }
            $this->assign("list",$info);
        }
        $total=$this->totalAction($user_id);
        $this->assign('total',$total);

        $this->display("wap/user/collection_note.tpl");
    }

    /*
    * 收藏问题
    *
    * */
    public function collection_faqAction()
    {
        $user_id = $_SESSION['userinfo']['uid'];

        $sql="SELECT a.t_id,b.* FROM ##__collection as a LEFT JOIN ##__faq as b ON a.t_id=b.id  WHERE a.type=4 and a.uid={$user_id} ORDER BY a.add_time DESC Limit 4";
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

        $this->display("wap/user/collection_faq.tpl");
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