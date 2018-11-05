<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/26
 * Time: 14:26*/
class Controller_Admin_TvKeyword extends Core_Controller_Action
{

    var $_pagetitle="视频搜索";
    var $_showfield=array(
        "id"=>"ID",
        "title"=>"标题",
        "thumbfile"=>"图片 ",
        "keyword"=>"关键字",
        "status"=>'状态'
    );

    var $status=array(
        0=>"<span style='color: red;'>关闭</span>",
        1=>"<span style='color: blue;'>开启</span>",
    );

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle",$this->_pagetitle);
    }

    public function indexAction()
    {
        $field_list=array_values($this->_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;

        $perpage=15;
        $limit=$perpage*($curpage-1).",".$perpage;
        $mapurl="admin/TvKeyword/index/";

        $list=C::M('tv_keyword')->order("id desc")->limit($limit)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['status']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=C::M('tv_keyword')->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/tv_keyword/list.tpl");
    }

    public function addAction()
    {
        $this->editAction();
    }


    public function editAction()
    {
        $id=$this->getParam("id");
        if( $id ){
            $info=C::M('tv_keyword')->where("id=$id")->find();
            $this->assign("detail",$info);
        }

        $this->assign("status_list",$this->status);
        $this->display("admin/tv_keyword/edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $status=$this->getParam('status');
        $title=$this->getParam("title");
        $keyword=$this->getParam('keyword');
        $thumbfile=$this->getParam("thumbfile");

        $data=array(
            'status'=>$status,
            'title'=>$title,
            'keyword'=>$keyword,
            'thumbfile'=>$thumbfile
        );

        if( $id ){
            $res=C::M('tv_keyword')->where("id={$id}")->update($data);
            if( $res ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }else{
            $res=C::M('tv_keyword')->add($data);
            if( $res ){
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

        $res=C::M("tv_keyword")->where("id={$id}")->delete();
        if( $res ){
            echo json_encode(array("code"=>1,"message"=>"success"));
            exit();
        }else{
            echo json_encode(array("code"=>0,"error"=>"删除失败!"));
            exit();
        }
    }



}