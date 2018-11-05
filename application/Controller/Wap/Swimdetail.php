<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/6
 * Time: 20:16
 */
class Controller_Wap_Swimdetail extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function detailAction()
    {
        $activity_id=(int)$this->getParam("act_id");
        $target_id=(int)$this->getParam("tar_id");
        $user_id=(int)$this->getParam("u");

        //根据活动ID查找说说,也是达人邦样式
        $travel_id=C::M("activity_travel")->field("travel_id")->where(" activity_id = $activity_id ")->select();
        $tv_id=C::M("activity_tv")->field("tv_id")->where( "activity_id= $activity_id" )->select();

        $travel_info=array();
        $info=array();
        if( $travel_id ){
            $travel_id=array_column($travel_id,"travel_id");

            $swim_mdl=new Model_Swimdetail();
            $travel_info=$swim_mdl->get_detail($travel_id);
            if( $travel_info ){
                foreach ($travel_info as $key=>$value){
                    $travel_info[$key]['content'] = json_decode($value['content']);
                    $travel_info[$key]['addtime'] = date('Y-m-d', $value['addtime']);
                    $travel_info[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
                }
            }
        }

        //通过用户ID获取达人的头像、简介
        $user_info=C::M("user_member")->where("uid ={$user_id}")->field("autograph,username,headpic")->find();
        $info['desccibes']=$user_info['autograph'];
        $info['username']=$user_info['username'];
        $info['avatar']=$user_info['headpic']?$user_info['headpic']:'/resource/images/img-lb2.png';
        $info['user_id']=$user_id;

        //查找tv视频
        $tv_info=array();
        if( $tv_id ){
            $tv_id=array_column($tv_id,"tv_id");
            $tv_id=implode("','",$tv_id);
            $tv_info=C::M("tv")->field("id,uid,title,pics,url,addtime")->where(" id in ('{$tv_id}') ")->select();
            if( $tv_info ){
                foreach ($tv_info as $key=>$value){
                    $tv_info[$key]['addtime'] = date('Y-m-d', $value['addtime']);
                }
            }
        }

        //目的地(国家)信息
        $target=C::M("target")->field("*")->where("id={$target_id}")->find();
        if( $target ){
            //国家基本信息
            $info['name']=$target['name'];
            $info['ad_img_url']=$target['ad_img_url'];
            $info['desc']=$target['desc'];
            $info['title']=$target['title'];
            $info['university']=$target['university'];
        }

        //获取子详情
        $target_info=C::M("target_info")->field("*")->where("target_id =$target_id")->select();

//        var_dump($target_info);die();
        $this->assign("activity_id",$activity_id);
        $this->assign("target_info",$target_info);
        $this->assign("detail_info",$info);
        $this->assign("travel_info",$travel_info);
        $this->assign("tv_info",$tv_info);
        $this->display("swim/mobile/detail.tpl");
    }





}