<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/11/22
 * Time: 15:01
 */
class Controller_Admin_LookingStar extends Core_Controller_Action
{
    var $_pagetitle="寻找达人";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"标题",
        "a.thumbfile"=>"图片 ",
        "a.sort"=>'排序<span style="color: red;">(默认100,1排最前面)</span>',
        "a.add_time"=>"添加时间"
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
        $mapurl="admin/LookingStar/index/";

        $list=C::M('looking_star')->order("id desc")->limit($limit)->select();
        $this->assign("list",$list);

        $total=C::M('looking_star')->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/looking_star/list.tpl");
    }


    public function addAction()
    {
        $this->editAction();
    }


    public function editAction()
    {
        $id=$this->getParam("id");
        if( $id ){
            $info=C::M('looking_star')->where("id=$id")->find();
            $this->assign('content', Core_Fun::getEditor('content', $info['content'], 300, 700, 'bbs'));
            $this->assign("detail",$info);
        }else{
            $this->assign('content', Core_Fun::getEditor('content', '', 300, 700, 'bbs'));
        }

        $this->assign("status_list",$this->status);
        $this->display("admin/looking_star/edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $content=Core_Util_Tutil::contentKeywords($this->getParam('content'));
        $title=$this->getParam("title");
        $sort=$this->getParam('sort');
        $thumbfile=$this->getParam("thumbfile");

        $data=array(
            'content'=>$content,
            'title'=>$title,
            'sort'=>$sort,
            'thumbfile'=>$thumbfile
        );

        if( $id ){
            $res=C::M('looking_star')->where("id={$id}")->update($data);
            if( $res ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }else{
            $data['addtime']=date('Y-m-d H:i:s',time());
            $res=C::M('looking_star')->add($data);
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

        $res=C::M("looking_star")->where("id={$id}")->delete();
        if( $res ){
            echo json_encode(array("code"=>1,"message"=>"success"));
            exit();
        }else{
            echo json_encode(array("code"=>0,"error"=>"删除失败!"));
            exit();
        }
    }




}