<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/14
 * Time: 15:41
 */
class Model_StarTravelApply extends Core_Model
{
    protected $_tableName = 'star_travel_apply as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }


    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_star_travel as b on b.id=a.star_travel_id";
        $join_str.=" left join g_user_member as c on b.user_id=c.uid";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }




}