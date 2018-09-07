<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/23
 * Time: 16:56
 */
class Model_TravelNote extends Core_Model
{
    protected $_tableName = 'travel_note as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_user_member as b on a.uid=b.uid";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $select_field=array("a.*,b.username");
        $join_str=" left join g_user_member as b on a.uid=b.uid";
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }

    public function font_get_info($uid,$curpage=1,$limit=10,$status=0)
    {
        $field=array('a.*,b.username,b.headpic');
        $join_str=" left join g_user_member as b on a.uid=b.uid";
        $where[]=array('a.uid',$uid);
        if( $status==1 ){
            $where[]=array('a.status',1);
        }
        $limit_arr=array($limit,$limit*($curpage-1));
        $orderBy="a.addtime DESC";
        return $this->joinAll($where,$orderBy,$limit_arr,$field,$join_str);
    }

    public function front_info($id)
    {
        $select_field=array('a.*,b.username,b.headpic');
        $join_str=" left join g_user_member as b on a.uid=b.uid";
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }


}