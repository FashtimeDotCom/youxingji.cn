<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/5/22
 * Time: 17:26
 *
 * 这个接口是定时定时执行
 *
 */

class Controller_Api_Ryt extends Core_Controller_Action
{
    public function preDispatch(){
        parent::preDispatch();
    }

    public function settimeAction()
    {
        //简单验证
        $code=$this->getParam("code");

        if( (int)$code > time() ){
            echo date("Y-m-d H:i:s",time())." 响应时间比请求时间小，请求异常!";
            exit();
        }

        $start_time=intval(time()-1800);
        $end_time=intval(time()+1800);
        $list=C::M("ryt")->field("id")->where(" show_time between $start_time and $end_time and status=2 ")->select();
        if( $list ){
            $where=array();
            foreach($list as $key=>$val){
                $where[]=$val['id'];
            }
            $update_data=array(
                'status'=>1,
                "istop"=>1
            );
            $where_str=implode(",",$where);
            $res=C::M("ryt")->where(" id in ({$where_str}) and status=2 ")->update($update_data);
            if($res){
                $str=json_encode($where);
                echo date("Y-m-d H:i:s",time()).",ID 为{$str}发布成功! \n";
                exit();
            }else{
                echo date("Y-m-d H:i:s",time()).",发布失败";
                exit();
            }
        }
        exit();

    }




}