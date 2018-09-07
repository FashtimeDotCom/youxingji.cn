<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/14
 * Time: 14:55
 */
class Model_SketchEveryday extends Core_Model
{
    protected $_tableName = 'sketch_everyday as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_sketch as b on b.id=a.sketch_id";
        $join_str.=" left join g_writer as c on b.writer_id=c.id";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_one($id){
        $select_field=array("a.*");
        $join_str="";
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }

    public function add($data)
    {
        $rt = Core_Db::insert ("g_sketch_everyday" , $data , array());
        if (true === $rt && $data[$this->_idkey]) {
            $rt = $data[$this->_idkey];
        }

        return $rt;
    }




}