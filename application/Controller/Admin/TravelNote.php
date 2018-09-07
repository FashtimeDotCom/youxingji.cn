<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/16
 * Time: 14:01
 */
class Controller_Admin_TravelNote extends Core_Controller_Action
{
    var $_pagetitle="游记列表";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"标题",
        "a.status"=>"状态",
        "a.addtime"=>"发布时间",
        "a.show_num"=>"阅读数",
        "a.top_num"=>"点赞数",
        "a.is_top"=>"是否推荐",
        "b.username"=>"作者",
    );

    var $status=array(
        0=>"<span style='color: blue;'>待审核</span>",
        1=>"<span style='color: green;'>审核通过</span>",
        2=>"<span style='color: red;'>审核不通过</span>"
    );

    var $is_top=array(
        0=>"不推荐",
        1=>"推荐"
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

        $type_model=new Model_TravelNote();
        $perpage=15;
        $mapurl="admin/TravelNote/index/";

        $list=$type_model->get_list($select_field,$curpage);
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
                $list[$key]['is_top']=$this->is_top[$value['is_top']];
            }
        }
        $this->assign("list",$list);

        $total=$type_model->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/travel_note/travel_note_list.tpl");
    }

    public function addAction()
    {
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;

        $this->assign("status_list",$this->status);
        $this->assign("is_top",$this->is_top);

        if( $id ){
            //详情
            $type_model=new Model_TravelNote();
            $detail=$type_model->get_one($id);

            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_0',3);
            }
        }else{

        }

        $this->assign('picdom', 'imgurl');//一定要有的
        $this->display("admin/travel_note/travel_note_edit.tpl");

    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            echo json_encode(array("code"=>0,"error"=>"修改失败"));
            exit();
        }

        $status=$this->getParam("status");
        $remark="";
        if( $status==2 ){
            $remark=$this->getParam("remark");
        }
        $show_num=$this->getParam("show_num");
        $top_num=$this->getParam("top_num");
        $is_top=$this->getParam("is_top");

        if( $id ){
            $data=array(
                'status'=>$status,
                'remark'=>$remark,
                "show_num"=>(int)$show_num,
                'top_num'=>(int)$top_num,
                'is_top'=>(int)$is_top
            );

            $res=C::M("travel_note")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }
    }

    public function show_detailAction()
    {
        $id=$this->getParam("id");
        $type_model=new Model_TravelNote();
        $detail=$type_model->get_one($id);
        if( !$detail ){
            die("ID错误");
        }

        $tjryt = C::M('ryt')->where("istop = 1")->order("rand()")->limit('0,5')->select();
        //日月潭
        $tjlist = C::M('ryt')->where("istop = 1")->order("shownum desc")->limit('0,10')->select();

        $this->assign('ns', 'ryt');
        $this->assign('tjryt', $tjryt);
        $this->assign('tjlist', $tjlist);
        $this->assign('article', $detail);
        $this->display('admin/travel_note/show_detail.tpl');
    }



}