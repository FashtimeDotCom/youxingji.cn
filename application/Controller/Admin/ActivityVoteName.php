<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/13
 * Time: 15:09
 */class Controller_Admin_ActivityVoteName extends Core_Controller_Action
{
    var $_pagetitle="名单列表";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.vote_num"=>"投票数",
        "a.sort"=>"排序",
        "a.desc"=>"描述",

        "b.username"=>"用户名",
        "c.title"=>"所属活动"
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
        $mapurl="admin/ActivityVoteName/index/";
        $activity_mdl=new Model_ActivityVoteName();
        $vote_id=$this->getParam('type_id');

        $sql="select a.*,b.username,c.title from ##__activity_vote_result as a left join ##__activity_vote as c on a.vote_id=c.id left join ##__user_member as b on b.uid=a.uid where a.vote_id={$vote_id}";
        $list=Core_Db::fetchAll($sql);
        if($list){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=C::M('activity_vote_result')->field('count(id) as total')->where("vote_id={$vote_id}")->find();
        $total=$total['total'];
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->assign('vote_id',$vote_id);
        $this->display("admin/activity/activity_name_list.tpl");
    }

    public function addAction(){
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $vote_id=$this->getParam("vote_id");

        if( $id ){
            //活动详情
            $activity_mdl=new Model_ActivityVoteName();
            $detail=$activity_mdl->get_one($id);
            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_3',3);
            }
        }else{

        }
        $this->assign('vote_id',$vote_id);
        $this->display("admin/activity/activity_name_edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $vote_num=$this->getParam("vote_num");
        $sort=$this->getParam("sort");
        $university=$this->getParam("university");
        $uid=$this->getParam('uid');
        $vote_id=$this->getParam('vote_id');
        $desc=$this->getParam('desc');

        $data=array(
            'vote_num'=>intval($vote_num),
            'sort'=>intval($sort),
            'university'=>$university,
            'uid'=>intval($uid),
            'vote_id'=>$vote_id,
            'desc'=>$desc
        );

        if( $id ){
            $res=C::M("activity_vote_result")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }else{
            $res=C::M("activity_vote_result")->add($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }
    }

    //
    public function check_userAction()
    {
        $key=$this->getParam('q');
        if( !$key ){
            return;
        }

        $info=C::M('user_member')->field('uid,username')->where("username like '%{$key}%'")->limit(0,10)->select();
        if( $info ){
            foreach($info as $key=>$value){
                $one=array();
                $one['id']=$value['uid'];
                $one['text']=$value['username'];
                $data[]=$one;
            }
            echo json_encode($data);
            exit();
        }
        return;
    }

    public function deleteAction()
    {
        $id=$this->getParam('id');
        if( !$id ){
            echo json_encode(array("code"=>0,"error"=>"参数错误"));
            exit();
        }

        $info=C::M("activity_vote_result")->field('id')->where("id={$id}")->find();
        if( !$info ){
            echo json_encode(array("code"=>0,"error"=>"数据不存在!"));
            exit();
        }

        $res=C::M('activity_vote_result')->where("id={$id}")->delete();
        if($res){
            echo json_encode(array("code"=>1,"message"=>"success"));
            exit();
        }else{
            echo json_encode(array("code"=>0,"error"=>"删除失败!"));
            exit();
        }
    }

    public function moreAction()
    {
        if($this->getParam('id'))
        {
            $_ids = $this->getParam ('id');
            $_istops = $this->getParam ('is_top');
            foreach($_ids AS $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
                    'is_top' => intval($_istops[$_id]),
                );

                C::M('activity_vote_result')->update ($_data);
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }





}
