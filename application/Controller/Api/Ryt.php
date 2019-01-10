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

        if( (int)$code > time() || !$code ){
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
                "istop"=>1,
                'update_time'=>time() //另一个定时任务执行条件
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

    /*
     * 每小时定时执行一次
     * */
    public function insert_pub_rytAction()
    {
        //简单验证
        $code=$this->getParam("code");

        if( (int)$code > time() || !$code ){
            echo date("Y-m-d H:i:s",time())." 响应时间比请求时间小，请求异常!";
            exit();
        }

        $from=intval(time()-1800);
        $to=intval(time()+1800);

        $sql="SELECT * FROM (SELECT id,title,pics as thumbfile,username,'resource/images/img-lb2.png' as headpic,shownum,homecontent as summary,1 as type,show_time as showtime,content,top_pic,address,0 as uid  FROM ##__ryt WHERE status =1 and update_time BETWEEN $from and $to ORDER BY istop DESC,id DESC LIMIT 10) as ryt";
        $sql .=" union ";
        $sql .="SELECT a.id,a.title,a.small_pic as thumbfile,b.username,b.headpic,a.show_num as shownum,a.desc as summary, 2 as type,unix_timestamp(a.addtime) as showtime,a.content,a.thumbfile as top_pic,a.address,a.uid FROM ##__travel_note as a LEFT JOIN ##__user_member as b ON a.uid=b.uid WHERE a.status=1 AND update_time BETWEEN $from AND $to ORDER BY id DESC LIMIT 10 ";
        $list=Core_Db::fetchAll($sql);
        if( $list ){
            foreach( $list as $key=>$value){
                $num=0;
                $num=C::M('ryt_note_table')->where("id={$value['id']} and type={$value['type']}")->getCount();
                if( $num>0 ){//已经存在，那么进行update操作
                    C::M('ryt_note_table')->where("id={$value['id']} and type={$value['type']}")->update($value);
                    unset($list[$key]);
                }
            }
        }

        if( $list ){
            $res=C::M('ryt_note_table')->adds($list);
            if( $res ){
                $id_arr=array_column($list,'id');
                $str=implode(',',$id_arr);
                echo date("Y-m-d H:i:s",time()).",ID 为{$str}发布成功! \n";
                exit();
            }
        }

        exit();
    }




}