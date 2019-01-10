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
        $mdl=new Model_Swimdetail();
        if( $type_list ){
            foreach( $type_list as $key=>$value ){
                $type_id=$value['id'];
                $activity=C::M("activity")->where( "type_id =$type_id and status !=2 " )->order(" status DESC ")->field("*")->select();
                $type_list[$key]['son']=$activity;
                foreach($activity as $k=>$val){
                    if( $val['user_id']==$value['user_id'] && $val['status']==1 && $val['type_id']==$value['id'] ){
                        $type_list[$key]['living']['activity_id']=$val['id'];
                        $type_list[$key]['living']['target_id']=$val['target_id'];
                    }
                }


                //获取推荐的达人邦
                if( isset($type_list[$key]['living']['activity_id']) ){
                    $activity_id=$type_list[$key]['living']['activity_id'];
                    $travel_id=C::M("activity_travel")->field("travel_id")->where(" activity_id={$activity_id} and sort =1 ")->find();
                    if( $travel_id ){
                        $travel_id=$travel_id['travel_id'];
                        $info=$mdl->get_one_detail($travel_id);
                        $info=$info[0];
                        $info['content']=json_decode($info['content']);
                        $info['headpic']=$info['headpic']??"/resource/images/img-lb2.png";
                        $info['describes']=Core_fun::cn_substr(strip_tags($info['describes']),250,'...');
                        $type_list[$key]['info']=$info;
                    }
                }

            }

        }

        $this->assign("ns","swim");
        $this->assign("info",$type_list);
        $this->display("swim/index.tpl");
    }

}