<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/5/31
 * Time: 15:07
 */
class Model_Activity extends Core_Model
{
    protected $_tableName = 'activity as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_user_member as b on b.uid=a.user_id ";
        $join_str.=" left join g_target as c on a.target_id=c.id ";
        $join_str.=" left join g_activity_type as e on e.id=a.type_id ";
//        $join_str.=" left join (select e.target_id ,GROUP_CONCAT(e.city) as city_list from g_target_info as e group by e.target_id ) as d on d.target_id=c.id  ";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $fields=array("a.*,b.id as t_id,c.username");
        $join_str=" left join g_target as b on b.id=a.target_id ";
        $join_str.=" left join g_user_member as c on c.uid=a.user_id ";
        $where[]=array("a.id",$id);
        return $this->joinOne($fields,$where,[],$join_str);
    }

    public function add($data)
    {
        $rt = Core_Db::insert ("g_activity" , $data , array());
        if (true === $rt && $data[$this->_idkey]) {
            $rt = $data[$this->_idkey];
        }

        return $rt;
    }

    public function update_one($data,$type_id)
    {
        return Core_Db::update("g_activity", " type_id= {$type_id} ", $data);
    }




}