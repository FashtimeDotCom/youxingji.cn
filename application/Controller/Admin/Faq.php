<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/25
 * Time: 15:20
 * 达人问答
 */
class Controller_Admin_Faq extends Core_Controller_Action
{
    var $_pagetitle="达人问答";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.title"=>"问答标题",
        "a.address"=>"目的地",
        "a.label"=>"标签",
        "a.addtime"=>"提问时间",
        "a.status"=>'状态',

        "b.username"=>"提问人",
        "a.uid"=>"用户ID",
    );

    var $status=array(
        0=>"<span style='color: blue;'>禁言</span>",
        1=>"<span style='color: green;'>通过</span>"
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
        $perpage=10;
        $mapurl="admin/Faq/index/";
        $mdl=new Model_Faq();

        $list=$mdl->get_list($select_field,$curpage,$perpage);
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['status_name']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=$mdl->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/faq/faq_list.tpl");
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
                "status"=>0
            );
            $res=C::M("faq")->where(" id={$id} ")->update($data);
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

    /*
     * 回答列表
     * */
    public function faq_responseAction()
    {
        $faq_id=$this->getParam('faq_id');
        if( !$faq_id ){
            die("参数错误");
        }

        $is_exist=C::M('faq')->field('*')->where("id={$faq_id}")->find();
        if( !$is_exist ){
            $this->showmsg('操作错误,达人问答不存在!', 'admin/index/index#13_0',3);
        }

        $_showfield=array(
            "a.id"=>"ID",
            "a.addtime"=>"回答时间",
            "a.uid"=>"回答用户ID",

            "b.title"=>"问题标题",
            "b.status"=>'问题状态',

            "c.username"=>"达人",
        );
        $select_field=array_keys($_showfield);
        $field_list=array_values($_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;
        $perpage=10;
        $mapurl="admin/Faq/faq_response/faq_id/".$faq_id;
        $mdl=new Model_Faq();

        $list=$mdl->get_response_list($select_field,$curpage,$perpage,$faq_id);
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['status_name']=$this->status[$value['status']];
            }
        }
        $this->assign("list",$list);

        $total=C::M('faq_response')->where("faq_id={$faq_id}")->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/faq/faq_response.tpl");
    }




}