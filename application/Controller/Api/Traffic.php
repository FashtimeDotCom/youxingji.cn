<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/28
 * Time: 14:25
 */
class Controller_Api_Traffic extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function get_trafficAction()
    {
        $info=C::M("traffic_number")->where("id=1")->find();

        if( $info ){
            $visit=$info['visit_num'];
            $customer=$info['customer_num'];
            $platform=$info['platform_num'];
        }else{
            $visit=0;
            $customer=0;
            $platform=0;
        }

        $temp=rand(1,5);
        $visit=$visit+$temp;
        $customer=$customer+$temp;
        $platform=$platform+$temp;

        $data=array(
            "visit_num"=>$visit,
            "customer_num"=>$customer,
            "platform_num"=>$platform
        );
        $res=C::M("traffic_number")->where("id=1")->update($data);
        if( $res ){
            echo json_encode(array("status"=>1,"data"=>$data));
            exit();
        }else{
            echo json_encode(array("status"=>0,"data"=>"获取失败!"));
            exit();
        }
    }




}