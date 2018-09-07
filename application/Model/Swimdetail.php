<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/6
 * Time: 09:30
 */
class Model_Swimdetail extends Core_Model
{
    protected $_tableName = 'travel as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_detail($travel_id)
    {
        $id_list=implode(",",$travel_id);

        $order_by=" a.addtime desc";
        $fields=array("a.*,b.username,b.headpic,b.autograph");
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $where[]=array("a.id",$id_list,"in");
        $limit_arr=array(4,0);
        return $this->joinAll($where,$order_by,$limit_arr,$fields,$join_str);
    }

    public function get_one_detail($travel_id)
    {
        $order_by=" a.addtime desc";
        $fields=array("a.content,a.uid,a.shownum,a.topnum,a.addtime,a.describes,b.username,b.headpic");
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $where[]=array("a.id",$travel_id);
        $limit_arr=array(1,0);
        return $this->joinAll($where,$order_by,$limit_arr,$fields,$join_str);
    }

    public function ajax_get_detail($travel_id,$page)
    {
        $id_list=implode(",",$travel_id);

        $order_by=" a.addtime desc";
        $fields=array("a.*,b.username,b.headpic,b.autograph");
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $where[]=array("a.id",$id_list,"in");
        $limit_arr=array(4,4 * ($page - 1));
        return $this->joinAll($where,$order_by,$limit_arr,$fields,$join_str);
    }

    public function get_batch_detail($uid,$id)
    {
        $order_by=" a.addtime desc";
        $fields=array("a.id,a.content,a.uid,a.shownum,a.topnum,a.addtime,a.describes,b.username,b.headpic");
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $where[]=array("a.uid",$uid);
        $where[]=array("a.id",$id,'!=');
        $limit_arr=array(2,0);
        return $this->joinAll($where,$order_by,$limit_arr,$fields,$join_str);
    }



}