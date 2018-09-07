<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/13
 * Time: 14:14
 */
class Model_Sketch extends Core_Model
{
    protected $_tableName = 'sketch as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }


    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_writer as b on a.writer_id=b.id";
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
        $rt = Core_Db::insert ("g_sketch" , $data , array());
        if (true === $rt && $data[$this->_idkey]) {
            $rt = $data[$this->_idkey];
        }

        return $rt;
    }

    public function get_living_sketch($type=1)
    {
        $orderBy="a.id DESC";
        $field=array("a.*","b.name","b.introduction","b.label","b.pics");
        $join_str=" left join g_writer as b on a.writer_id=b.id";
        $where[]=array("a.status",1);
        if( $type==1 ){
            $limit_arr=array(2,0);
        }else{
            $limit_arr=array(1,0);
        }

        return $this->joinAll($where,$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_detail($id)
    {
        $field=array("a.*","b.with_one","b.feture","b.cost_explain","visa_explain","b.tips");
        $join_str=" left join g_sketch_detail as b on b.sketch_id=a.id";
        $where[]=array("a.id",$id);
        return $this->joinOne($field,$where,[],$join_str);
    }



}