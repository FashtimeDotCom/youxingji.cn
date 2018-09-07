<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/14
 * Time: 14:02
 */
class Controller_Admin_StarTravelDetail extends Core_Controller_Action
{
    var $_pagetitle="旅行详情";
    var $_showfield=array(
        "a.id"=>"ID",

        "b.title"=>"标题",
        "b.status"=>"状态",
        "c.username"=>"达人名字",
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

        $type_model=new Model_StarTravelDetail();
        $perpage=15;
        $mapurl="admin/starTravelDetail/index/";

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

        $this->display("admin/travel/star_travel_detail.tpl");
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
            $type_model=new Model_StarTravelDetail();
            $detail=$type_model->get_one($id);

            if( $detail ){
                $this->assign("detail",$detail);
                $this->assign('with_one', Core_Fun::getEditor('with_one', $detail['with_one'], 300, 700, 'bbs'));//跟谁去
                $this->assign('feture', Core_Fun::getEditor('feture', $detail['feture'], 300, 700, 'bbs'));//特色体验
                $this->assign('cost_explain', Core_Fun::getEditor('cost_explain', $detail['cost_explain'], 300, 700, 'bbs'));
                $this->assign('visa_explain', Core_Fun::getEditor('visa_explain', $detail['visa_explain'], 300, 700, 'bbs'));
                $this->assign('tips', Core_Fun::getEditor('tips', $detail['tips'], 300, 700, 'bbs'));
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_0',3);
            }
        }else{
            $this->assign('with_one', Core_Fun::getEditor('with_one', '', 300, 600, 'bbs'));
            $this->assign('feture', Core_Fun::getEditor('feture', '', 300, 600, 'bbs'));
            $this->assign('cost_explain', Core_Fun::getEditor('cost_explain', '', 300, 600, 'bbs'));
            $this->assign('visa_explain', Core_Fun::getEditor('visa_explain', '', 300, 600, 'bbs'));
            $this->assign('tips', Core_Fun::getEditor('tips', '', 300, 600, 'bbs'));
        }

        //获取写生列表
        $sketch_list=C::M("starTravel")->field("id,title")->where(" status=1 or status=0 ")->select();
        if( $sketch_list ){
            $sketch_list=array_column($sketch_list,"title","id");
            $this->assign("sketch_list",$sketch_list);
        }

        $this->display("admin/travel/star_detail_edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id")??0;
        $star_travel_id=$this->getParam("star_travel_id");
        if( !$star_travel_id ){
            echo json_encode(array("code"=>0,"error"=>"编辑失败(3)"));
            exit();
        }

        $with_one=Core_Util_Tutil::contentKeywords($this->getParam('with_one'));
        $feture=Core_Util_Tutil::contentKeywords($this->getParam('feture'));
        $cost_explain=Core_Util_Tutil::contentKeywords($this->getParam('cost_explain'));
        $visa_explain=Core_Util_Tutil::contentKeywords($this->getParam('visa_explain'));
        $tips=Core_Util_Tutil::contentKeywords($this->getParam('tips'));


        $data=array(
            'star_travel_id'=>$star_travel_id,
            'with_one'=>$with_one,
            'feture'=>$feture,
            'cost_explain'=>$cost_explain,
            'visa_explain'=>$visa_explain,
            'tips'=>$tips
        );

        if( $id>0 ){//update
            $res=C::M("star_travel_detail")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $res=C::M("star_travel_detail")->add($data);
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
            $res=C::M("star_travel_detail")->where(" id={$id} ")->delete();
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