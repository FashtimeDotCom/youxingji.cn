<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/28
 * Time: 11:48
 */
class Controller_Admin_TrafficNum extends Core_Controller_Action
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function indexAction()
    {
        $info=C::M("traffic_number")->where("id=1")->find();
        $this->assign("detail",$info);

        $this->display("admin/traffic_num.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $visit=$this->getParam("visit_num");
        $customer=$this->getParam("customer_num");
        $platform=$this->getParam("platform_num");

        $data=array(
            'visit_num'=>(int)$visit,
            "customer_num"=>(int)$customer,
            "platform_num"=>(int)$platform
        );

        $res=C::M("traffic_number")->where("id={$id}")->update($data);
        if( $res ){
            echo json_encode(array("status"=>1,"msg"=>"修改成功"));
            exit();
        }else{
            echo json_encode(array("status"=>0,"msg"=>"修改失败"));
            exit();
        }
    }



}