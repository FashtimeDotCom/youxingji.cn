<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/4
 * Time: 10:49
 */
class Model_Target extends Core_Model
{
    protected $_tableName = 'target as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str="";
        $join_str.=" left join (select c.target_id ,GROUP_CONCAT(c.city) as city_list from g_target_info as c group by c.target_id ) as b on b.target_id=a.id  ";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $fields=array("a.*");
        $join_str="";
        $where[]=array("a.id",$id);
        return $this->joinOne($fields,$where,[],$join_str);
    }

    public function add($data)
    {
        $rt = Core_Db::insert ("g_target" , $data , array());
        if (true === $rt && $data[$this->_idkey]) {
            $rt = $data[$this->_idkey];
        }

        return $rt;
    }



}