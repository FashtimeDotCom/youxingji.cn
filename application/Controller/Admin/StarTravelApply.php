<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/14
 * Time: 15:40
 */
class Controller_Admin_StarTravelApply extends Core_Controller_Action
{
    var $_pagetitle="写生报名";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.realname"=>"真实姓名",
        "a.telephone"=>"联系电话 ",
        "a.remark"=>"备注",
        "a.addtime"=>"报名时间",

        "b.title as sketch_title"=>"隶属",
        "c.username"=>"达人",
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

        $type_model=new Model_StarTravelApply();
        $perpage=15;
        $mapurl="admin/starTravelApply/index/";

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

        $this->display("admin/travel/star_travel_apply.tpl");
    }




}