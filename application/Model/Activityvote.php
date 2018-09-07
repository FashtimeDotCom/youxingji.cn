<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/10
 * Time: 15:16
 */
class Model_ActivityVote extends Core_Model
{
    protected $_tableName = 'activity_vote as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15)
    {
        $orderBy="a.id DESC";
        $join_str=" left join g_activity as b on b.id=a.activity_id ";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $select_field=array("a.*");
//        $join_str=" left join g_user_member as b on b.uid=a.user_id ";
        $join_str='';
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }

}