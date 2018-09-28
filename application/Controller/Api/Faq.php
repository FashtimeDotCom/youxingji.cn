<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/27
 * Time: 15:32
 */
class Controller_Api_Faq extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
 * 自己的个人中心查看tv
 * */
    public function get_moreAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        if( !$page || $page <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //分类,1-热门回答，2-最新回答，3-等待回答
        $type=$this->getParam("type")??1;
        if( !in_array($type,array(1,2,3)) ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        switch($type){
            case 1:
                $order="show_num desc";
                break;
            case 2:
                $order="addtime desc";
                break;
            case 3:
                $order="addtime desc";
                break;
            default:
                $order="show_num desc";
                break;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        if( $type==3 ){
            $list=C::M("faq")->where("status=1 and is_response=1")->order($order)->limit($limit)->select();
        }else{
            $list=C::M("faq")->where("status=1")->order($order)->limit($limit)->select();
        }

        if( $list ){
            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }


    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}