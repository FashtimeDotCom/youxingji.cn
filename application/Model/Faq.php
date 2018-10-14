<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/25
 * Time: 16:48
 */
class Model_Faq extends Core_Model
{
    protected $_tableName = 'faq as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($field=array(),$curpage=1,$limit=15){
        $orderBy="a.id DESC";
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $limit_arr=array($limit,$limit*($curpage-1));
        return $this->joinAll([],$orderBy,$limit_arr,$field,$join_str);
    }

    public function get_response_list($field=array(),$curpage=1,$limit=15,$faq_id){
        $this->_tableName="##__faq_response as a";
        $orderBy="a.id DESC";
        $join_str=" left join g_faq as b on b.id=a.faq_id ";
        $join_str .=" left join g_user_member as c on c.uid=a.uid ";
        $limit_arr=array($limit,$limit*($curpage-1));
        $where[]=array('a.faq_id',$faq_id);
        return $this->joinAll($where,$orderBy,$limit_arr,$field,$join_str);
    }

    public function add($data)
    {
        $rt = Core_Db::insert ("g_faq" , $data , array());
        if (true === $rt && $data[$this->_idkey]) {
            $rt = $data[$this->_idkey];
        }

        return $rt;
    }


}