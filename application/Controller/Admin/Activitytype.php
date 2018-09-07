<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/5/30
 * Time: 14:14
 */
class Controller_Admin_ActivityType extends Core_Controller_Action
{
    var $_pagetitle="活动分类";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.name"=>"分类名称",
        "a.start_time"=>"开始时间",
        "a.end_time"=>"结束时间",
        "a.status"=>"状态",
        "b.username"=>"种子达人",
        "b.uid"=>"达人ID",
    );

    var $status=array(
        0=>"<span style='color: blue;'>未生效</span>",
        1=>"<span style='color: green;'>生效</span>",
        2=>"<span style='color: red;'>废除</span>"
    );

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle",$this->_pagetitle);
    }

    public function indexAction(){
        $select_field=array_keys($this->_showfield);
        $field_list=array_values($this->_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;

        $type_model=new Model_Activitytype();
        $perpage=15;
        $mapurl="admin/activity_type/index/";

        $list=$type_model->get_list($select_field,$curpage);
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['start_time']=date("Y-m-d",$value['start_time']);
                $list[$key]['end_time']=date("Y-m-d",$value['end_time']);
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=$type_model->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/activity/activity_type_list.tpl");

    }

    public function addAction()
    {
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;

        $this->assign("status_list",$this->status);

        if( $id ){
            //活动分类详情
            $type_model=new Model_Activitytype();
            $detail=$type_model->get_one($id);

            if( $detail ){
                $this->assign("detail",$detail);
                $this->assign('homecontent', Core_Fun::getEditor('homecontent', $detail['desc'], 300, 700, 'bbs'));
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_0',3);
            }
        }else{
            $this->assign('homecontent', Core_Fun::getEditor('homecontent', '', 300, 600, 'bbs'));
        }

        //选择查看更多
        $recu_list=C::M("recruiting")->field("id,title")->select();
        if( $recu_list ){
            $recu_list=array_column($recu_list,'title','id');
            $this->assign("recu_list",$recu_list);
        }

        $this->assign('picdom', 'imgurl');//一定要有的
        $this->display("admin/activity/activity_type_edit.tpl");

    }

    public function saveAction()
    {
        $id=$this->getParam("id")??0;
        $name=$this->getParam("name");
        $start_time=$this->getParam("start_time");
        if( empty($start_time) ){
            $start_time=date("Y-m-d",time());
        }
        $end_time=$this->getParam("end_time");
        if( empty($end_time) ){
            $end_time=date("Y-m-d",time());
        }
        $link_url=$this->getParam("link_url");
        $desc=$this->getParam("desc");
        $status=$this->getParam("status");
        $uid=(int)$this->getParam("uid")??0;
        $sign_in_url=$this->getParam("sign_in_url");
        $img_url=$this->getParam("pics");
        $view_more=$this->getParam("view_more")??0;

        $data=array(
            "name"=>$name,
            "start_time"=>strtotime($start_time),
            "end_time"=>strtotime($end_time),
            "img_url"=>$img_url,
            "link_url"=>$link_url,
            "desc"=>Core_Util_Tutil::contentKeywords($this->getParam('homecontent')),
            "status"=>(int)$status,
            "user_id"=>(int)$uid,
            "sign_in_url"=>$sign_in_url,
            'view_more'=>$view_more
        );

        if( $id>0 ){//update
            $res=C::M("activity_type")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                if( $status==0 ){
                    //改成未生效状态，所有活动都未0
                    $activity=array(
                        "status"=>0
                    );
                    $ret=C::M("activity")->update_one($activity,$id);

                    if( $ret ){
                        echo json_encode(array("code"=>1,"message"=>"success"));
                        exit();
                    }else{
                        echo json_encode(array("code"=>0,"message"=>"保存类型成功，但活动修改失败!"));
                        exit();
                    }
                }
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $res=C::M("activity_type")->add($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }

    }


    /*
     *
     * 删除活动，逻辑删除
     * */
    public function update_statusAction()
    {
        $id=(int)$this->getParam("id");
        if( $id >0 ){
            $data=array(
                "status"=>2
            );
            $res=C::M("activity_type")->where(" id={$id} ")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(1)"));
                exit();
            }
        }
        echo json_encode(array("code"=>0,"error"=>"操作错误！"));
        exit();


    }


}