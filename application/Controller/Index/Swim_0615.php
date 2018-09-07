<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/5
 * Time: 14:59
 */
class Controller_Index_Swim extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        //活动类型数据
        $type_list=C::M("activity_type")->where(" status !=2 ")->field("*")->select();
        if( $type_list ){
            foreach( $type_list as $key=>$value ){
                $type_id=$value['id'];
                $activity=C::M("activity")->where( "type_id =$type_id" )->field("*")->select();
                $type_list[$key]['son']=$activity;
            }
        }

        $this->assign("ns","swim");
        $this->assign("info",$type_list);
        $this->display("swim/index.tpl");
    }

}