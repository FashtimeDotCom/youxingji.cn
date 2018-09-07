<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/5/30
 * Time: 14:22
 */
class Model_ActivityType extends Core_Model
{

    protected $_tableName = 'activity_type as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15)
    {
        $orderBy="a.id DESC";
        $join_str=" left join g_user_member as b on b.uid=a.user_id ";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $select_field=array("a.*,b.uid,b.username");
        $join_str=" left join g_user_member as b on b.uid=a.user_id ";
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }


}