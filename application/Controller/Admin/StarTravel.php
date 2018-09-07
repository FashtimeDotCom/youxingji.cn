<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/13
 * Time: 10:07
 */
class Controller_Admin_StarTravel extends Core_Controller_Action
{
    var $_pagetitle="达人带你去旅行";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"标题",
        "a.days"=>"旅行天数",
        "a.depature_time"=>"出发时间",
        "a.price"=>"价格",
        "a.status"=>"状态",

        "b.username"=>"达人名字",
    );

    var $status=array(
        0=>"<span style='color: blue;'>未进行</span>",
        1=>"<span style='color: green;'>报名中</span>",
        2=>"<span style='color: green;'>进行中</span>",
        3=>"<span style='color: red;'>已过期</span>"
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

        $type_model=new Model_StarTravel();
        $perpage=15;
        $mapurl="admin/StarTravel/index/";

        $list=$type_model->get_list($select_field,$curpage);
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=$type_model->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/travel/star_travel.tpl");

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
            //详情
            $type_model=new Model_StarTravel();
            $detail=$type_model->get_one($id);

            if( $detail ){
                $this->assign("detail",$detail);
                $this->assign('desc', Core_Fun::getEditor('desc', $detail['desc'], 300, 700, 'bbs'));
                $this->assign('homecontent', Core_Fun::getEditor('homecontent', $detail['content'], 300, 700, 'bbs'));
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#6_2',3);
            }
        }else{
            $this->assign('desc', Core_Fun::getEditor('desc', '', 300, 600, 'bbs'));
            $this->assign('homecontent', Core_Fun::getEditor('homecontent', '', 300, 600, 'bbs'));
        }

        //获取名家列表
        $writer_list=C::M("user_member")->field("uid,username")->where(" startop=1")->select();
        if( $writer_list ){
            $writer_list=array_column($writer_list,"username","uid");
            $this->assign("writer_list",$writer_list);
        }

        $this->assign('picdom', 'imgurl');//一定要有的
        $this->display("admin/travel/star_travel_edit.tpl");

    }

    public function saveAction()
    {
        $id=$this->getParam("id")??0;
        $title=$this->getParam("title");
        $depature_time=$this->getParam("depature_time");
        if( empty($depature_time) ){
            $depature_time=date("Y-m-d",time());
        }

        $user_id=$this->getParam("user_id");
        $desc=Core_Util_Tutil::contentKeywords($this->getParam('desc'));
        $content=Core_Util_Tutil::contentKeywords($this->getParam('homecontent'));
        $status=$this->getParam("status");
        $days=(int)$this->getParam("days")??0;
        $price=$this->getParam("price");

        $thumbfile=$this->getParam("thumbfile");
        $pics=$this->getParam("pics");

        $data=array(
            "title"=>$title,
            "desc"=>$desc,
            "content"=>$content,
            "user_id"=>$user_id,
            "thumbfile"=>$thumbfile,
            "pics"=>$pics,
            "days"=>$days,
            'depature_time'=>$depature_time,
            "price"=>$price,
            "status"=>(int)$status,
        );

        if( $id>0 ){//update
            $res=C::M("star_travel")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $res=C::M("star_travel")->add($data);
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
                "status"=>3
            );
            $res=C::M("star_travel")->where(" id={$id} ")->update($data);
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