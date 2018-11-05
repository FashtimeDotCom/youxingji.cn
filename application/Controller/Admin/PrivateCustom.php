<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/24
 * Time: 16:23
 */
class Controller_Admin_PrivateCustom extends Core_Controller_Action
{

    var $_pagetitle="私人定制";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.username"=>"姓名",
        "a.mobile"=>"联系电话 ",
        "a.status"=>'状态',
        "a.add_time"=>"报名时间"
    );

    var $status=array(
        0=>"<span style='color: red;'>待处理</span>",
        1=>"<span style='color: blue;'>处理中</span>",
        2=>"<span style='color: green;'>已处理</span>"
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
        $limit=$perpage*($curpage-1).",".$perpage;
        $mapurl="admin/privateCustom/index/";

        $list=C::M('private_custom')->order("add_time desc")->limit($limit)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=C::M('private_custom')->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/private_custom/list.tpl");
    }

    public function editAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#7_6',3);
        }

        $info=C::M('private_custom')->where("id=$id")->find();
        $this->assign("detail",$info);
        $this->assign("status_list",$this->status);
        $this->display("admin/private_custom/edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $status=$this->getParam('status');

        $data=array(
            'status'=>$status
        );

        $res=C::M('private_custom')->where("id={$id}")->update($data);
        if( $res ){
            echo json_encode(array("code"=>1,"message"=>"success"));
            exit();
        }else{
            echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
            exit();
        }


    }




}