<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/14
 * Time: 14:50
 */
class Controller_Admin_StarTravelEveryday extends Core_Controller_Action
{
    var $_pagetitle="详细行程";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"行程标题",
        "a.sort"=>"排序",

        "b.title as sketch_title"=>"隶属",
        "b.status"=>"状态",
        "c.username"=>"名师名字",
    );

    var $status=array(
        0=>"<span style='color: blue;'>未进行</span>",
        1=>"<span style='color: green;'>进行中</span>",
        2=>"<span style='color: red;'>已过期</span>"
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

        $type_model=new Model_StarTravelEveryday();
        $perpage=15;
        $mapurl="admin/StarTravelEveryday/index/";

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

        $this->display("admin/travel/star_everyday.tpl");
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
            $type_model=new Model_StarTravelEveryday();
            $detail=$type_model->get_one($id);

            if( $detail ){
                $this->assign("detail",$detail);
                $this->assign('desc', Core_Fun::getEditor('desc', $detail['desc'], 300, 700, 'bbs'));
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#6_4',3);
            }
        }else{
            $this->assign('desc', Core_Fun::getEditor('desc', '', 300, 600, 'bbs'));
        }

        //获取写生列表
        $sketch_list=C::M("star_travel")->field("id,title")->where(" status=1 or status=0 ")->select();
        if( $sketch_list ){
            $sketch_list=array_column($sketch_list,"title","id");
            $this->assign("sketch_list",$sketch_list);
        }

        $this->assign('picdom', 'imgurl');//一定要有的
        $this->display("admin/travel/star_everyday_edit.tpl");

    }

    public function saveAction()
    {
        $id=$this->getParam("id")??0;
        $title=$this->getParam("title");
        $star_travel_id=$this->getParam("star_travel_id");
        $sort=$this->getParam("sort");


        $airport=$this->getParam("airport");
        $desc=Core_Util_Tutil::contentKeywords($this->getParam('desc'));
        $breakfast=$this->getParam("breakfast");
        $accommodation=$this->getParam("accommodation");

        $data=array(
            "title"=>$title,
            "star_travel_id"=>$star_travel_id,
            "airport"=>$airport,
            "breakfast"=>$breakfast,
            "accommodation"=>$accommodation,
            "desc"=>$desc,
            "sort"=>$sort
        );

        if( $id>0 ){//update
            $res=C::M("star_travel_everyday")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $res=C::M("star_travel_everyday")->add($data);
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
* 删除活动
* */
    public function update_statusAction()
    {
        $id=(int)$this->getParam("id");
        if( $id >0 ){
            $res=C::M("star_travel_everyday")->where(" id={$id} ")->delete();
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"删除失败"));
                exit();
            }
        }
        echo json_encode(array("code"=>0,"error"=>"操作错误！"));
        exit();


    }





}