<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/10
 * Time: 15:01
 */
class Controller_Admin_ActivityVote extends Core_Controller_Action
{
    var $_pagetitle="活动投票";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"投票名称",
        "a.status"=>"状态",
        "a.thumbfile"=>"图片",

        "b.name"=>"所属活动",
    );

    var $status=array(
        0=>"<span style='color: blue;'>未生效</span>",
        1=>"<span style='color: green;'>进行中</span>",
        2=>"<span style='color: red;'>废除</span>"
    );

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle",$this->_pagetitle);
    }

    public function indexAction()
    {
        $select_field=array_keys($this->_showfield);
        $field_list=array_values($this->_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;
        $perpage=15;
        $mapurl="admin/ActivityVote/index/";
        $activity_mdl=new Model_Activityvote();

        $list=$activity_mdl->get_list($select_field,$curpage);
        if($list){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=$activity_mdl->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/activity/activity_vote.tpl");
    }

    public function addAction(){
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $this->assign("status_list",$this->status);

        if( $id ){
            //活动详情
            $activity_mdl=new Model_Activityvote();
            $detail=$activity_mdl->get_one($id);
            if( $detail ){
                $this->assign('activity_rules', Core_Fun::getEditor('activity_rules', $detail['activity_rules']));
                $this->assign('desc', Core_Fun::getEditor('desc', $detail['desc']));
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_3',3);
            }
        }else{
            $this->assign('activity_rules', Core_Fun::getEditor('activity_rules', ''));
            $this->assign('desc', Core_Fun::getEditor('desc', ''));
        }

        //获取目的地列表
        $activity_list=C::M("activity")->field('id,name')->where('status=1')->select();
        $this->assign("activity_list",$activity_list);
        $this->display("admin/activity/activity_vote_edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $title=$this->getParam("title");
        $thumbfile=$this->getParam("thumbfile");
        $activity_id=$this->getParam("activity_id");
        $status=$this->getParam('status');
        $desc=Core_Util_Tutil::contentKeywords($this->getParam('desc'));
        $wechat_desc=$this->getParam("wechat_desc");

        $vote_total=$this->getParam("vote_total");
        $end_time=$this->getParam("end_time");
        $sponsor=$this->getParam("sponsor");
        $activity_rules=Core_Util_Tutil::contentKeywords($this->getParam('activity_rules'));

        $data=array(
            "title"=>$title,
            "thumbfile"=>$thumbfile,
            "activity_id"=>(int)$activity_id,
            "status"=>(int)$status,
            "desc"=>$desc,
            'vote_total'=>intval($vote_total),
            'end_time'=>$end_time,
            'sponsor'=>$sponsor,
            'activity_rules'=>$activity_rules,
            'wechat_desc'=>$wechat_desc
        );

        if( (int)$id>0 ){//update
            $res=C::M("activity_vote")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $res=C::M("activity_vote")->add($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }

    }

    public function deleteAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            echo json_encode(array("code"=>0,"error"=>"参数错误"));
            exit();
        }

        $info=C::M("activity_vote")->field('id')->where("id={$id}")->find();
        if( !$info ){
            echo json_encode(array("code"=>0,"error"=>"数据不存在!"));
            exit();
        }

        //开启事务
        Core_Db::start_transaction();
        $res1=C::M("activity_vote")->where("id={$id}")->delete();
        if( $res1 ){
            $name_list=C::M("activity_vote_result")->field('id')->where("vote_id={$id}")->select();
            if( $name_list ){
                $res2=C::M("activity_vote_result")->where("vote_id={$id}")->delete();
                if( $res2 ){
                    Core_Db::commit_transaction();
                    echo json_encode(array("code"=>1,"message"=>"success"));
                    exit();
                }else{
                    Core_Db::rollback_transaction();
                    echo json_encode(array("code"=>0,"error"=>"删除失败!"));
                    exit();
                }
            }else{//success
                Core_Db::commit_transaction();
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }
        }else{
            Core_Db::rollback_transaction();
            echo json_encode(array("code"=>0,"error"=>"删除失败!"));
            exit();
        }
    }

    public function name_listAction()
    {
        $type_id=$this->getParam("type_id");
        if( !$type_id ){
            $this->showmsg('操作错误,ID不存在!', 'admin/index/index#12_3',3);
        }

        $info=C::M("activity_vote")->field('id')->where("id={$type_id}")->find();
        if( !$info ){
            $this->showmsg('操作错误,ID不存在!', 'admin/index/index#12_3',3);
        }

        header("Location:/admin/ActivityVoteName/index/type_id/{$type_id}");
    }



}