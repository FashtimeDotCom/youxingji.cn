<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/6
 * Time: 16:13
 */
class Controller_Wap_Swim extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }


    public function indexAction()
    {
        //活动类型数据
        $type_list=C::M("activity_type")->where('status !=2 ')->field("id,img_url,name,link_url,sign_in_url,user_id,status")->select();

        if( $type_list ){
            foreach( $type_list as $key=>$value ){
                $type_id=$value['id'];
                $activity=C::M("activity")->where( "type_id =$type_id and status !=2 " )->order("status desc")->field("*")->select();
                $type_list[$key]['son']=$activity;
                foreach($activity as $k=>$val){
                    if( $val['user_id']==$value['user_id'] && $val['status']==1 && $val['type_id']==$value['id'] ){
                        $type_list[$key]['living']['activity_id']=$val['id'];
                        $type_list[$key]['living']['target_id']=$val['target_id'];
                    }
                }
            }
        }
//        var_dump($type_list);die();
        $this->assign("info",$type_list);
        $this->display("swim/mobile/drb.tpl");
    }

    /*
     * 名单公布
     * */
    public function roster_listAction()
    {
        $activity_id=$this->getParam('activity_id');
        if( !$activity_id ){
            $this->showmsg('缺少参数', 'index.php?m=wap&c=swim&v=index', 0);
        }

        $sql="SELECT * FROM ##__activity_vote WHERE activity_id = {$activity_id} and status=1";
        $info=Core_Db::fetchOne($sql);
        if( $info ){
            $vote_id=$info['id'];
            $sql2="SELECT a.*,b.username,b.headpic FROM ##__activity_vote_result as a LEFT JOIN ##__user_member as b on a.uid=b.uid WHERE a.vote_id={$vote_id} and a.is_top=1 ORDER BY a.vote_num DESC";
            $name_list=Core_Db::fetchAll($sql2);
            if( $name_list ){
                foreach($name_list as $key=>$value){
                    $name_list[$key]['headpic']=empty($value['headpic'])?' /resource/images/img-lb2.png':$value['headpic'];
                }
                $info['name_list']=$name_list;
            }
        }else{
            $this->showmsg('错误的ID', 'index.php?m=wap&c=swim&v=index', 0);
        }
//        var_dump($info);die();

        $this->assign('info',$info);
        $this->display("swim/mobile/roster_list.tpl");
    }





}