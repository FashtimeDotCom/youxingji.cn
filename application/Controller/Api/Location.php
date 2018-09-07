<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/4
 * Time: 15:38
 */
class Controller_Api_Location extends Core_Controller_Action
{
    var $key="FYr00WVyuwiUutm3QKMF87bWfF09Asgr";//服务器端
    var $browser_key="l3rvDUNj68gCXNAjEnXtVI1RZSPYu1mv";//浏览器
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     *
     *  //获取用户地理位置信息
     * */
    public function get_location_infoAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $ak=$this->getParam('code');
        $lat = $this->getParam("latitude");
        $lng = $this->getParam("longitude");
        if( !$ak || !$lat || !$lng ){
            echo json_encode(array('code'=>0,'tips'=>'缺少参数'));
            exit();
        }

        //验证百度AK是否正确,浏览器
        $str=base64_encode($this->browser_key);
        if( strtolower($ak) != strtolower($str) ){
            echo json_encode(array('code'=>0,'tips'=>'非法操作:)'));
            exit();
        }

        $ak=$this->key;//动态获取，以后可以多个账号使用
        $url = "http://api.map.baidu.com/geocoder/v2/?ak={$ak}&location={$lat},{$lng}&output=json&coordtype=gcj02ll";
        $res = file_get_contents($url);
        //百度地图返回的并不是json,而是字符串,需要自己在做一个处理
        if( $res ){
            $res=json_decode($res,TRUE);
            if( isset($res['status']) && $res['status']==0 ){
                $response_str="{$res['result']['addressComponent']['country']}.{$res['result']['addressComponent']['province']}.{$res['result']['addressComponent']['city']}";
                echo json_encode(array('code'=>1,'tpis'=>$response_str));
                exit();
            }else{
                echo json_encode(array('code'=>0,'tips'=>$res['message']));
                exit();
            }
        }else{
            echo json_encode(array('code'=>0,'tips'=>'非法操作:)'));
            exit();
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }


}