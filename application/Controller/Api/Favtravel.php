<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/8
 * Time: 16:21
 *
 * 点击收藏API
 *
 */
class Controller_Api_Favtravel extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 收藏API
     * 参数：
     * type：操作类型，0取消，1收藏
     * travel_id:说说ID
     *
     * */
    public function fav_travelAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $type=(int)$this->getParam("type");//0取消，1收藏
        if( !in_array($type,array(1,2)) ){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $travel_id=$this->getParam("travel_id");
        if( $travel_id <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( $type==1 ){//取消,删除记录
            $where=" travel_id = {$travel_id} && user_id = {$user_id} ";
            $res=C::M("fav_travel")->where($where)->delete();
            if($res){
                $json = array('status' => 1, 'tips' => '取消成功!');
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '取消失败');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }else{//收藏
            $data=array(
                'travel_id'=>$travel_id,
                "user_id"=>$user_id,
                "add_time"=>time()
            );

            $res=C::M("fav_travel")->add($data);
            if($res){
                $json = array('status' => 1, 'tips' => '收藏成功，请在个人中心查看!');
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '收藏失败');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }








}