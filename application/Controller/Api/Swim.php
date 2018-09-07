<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/11
 * Time: 18:00
 */
class Controller_Api_Swim extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function get_moreAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        $activity_id=$this->getParam("activity_id");
        if( !$page || !$activity_id ){
            echo Core_Fun::outputjson(array('status'=>0,'tips'=>"缺少参数"));
            exit;
        }

        //查询活动是否存在
        $activity_list=C::M("activity")->where(" id={$activity_id} ")->field('name')->find();
        if( !$activity_list ){
            echo Core_Fun::outputjson(array('status'=>0,'tips'=>"活动不存在!"));
            exit;
        }

        //获取travel_list
        $travel_id=C::M("activity_travel")->field("travel_id")->where(" activity_id = $activity_id ")->select();
        $travel_info=array();
        if( $travel_id ){
            $travel_id=array_column($travel_id,"travel_id");
            $swim_mdl=new Model_Swimdetail();
            $travel_info=$swim_mdl->ajax_get_detail($travel_id,$page);
            if( $travel_info ){
                foreach ($travel_info as $key=>$value){
                    $travel_info[$key]['describes']= Core_fun::cn_substr(strip_tags($value['describes']),240,'...');
                    $travel_info[$key]['content'] = json_decode($value['content']);
                    $travel_info[$key]['addtime'] = date('Y-m-d', $value['addtime']);
                    $travel_info[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
                }
            }else{
                echo Core_Fun::outputjson(array('status'=>0,'tips'=>"没有更多数据了!"));
                exit;
            }
        }else{
            echo Core_Fun::outputjson(array('status'=>0,'tips'=>"没有更多数据了!"));
            exit;
        }
        echo Core_Fun::outputjson(array('status'=>1,'data'=>$travel_info,'page'=>$page+1));
        exit;
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }



}