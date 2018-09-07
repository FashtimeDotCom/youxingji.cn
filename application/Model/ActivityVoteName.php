<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/13
 * Time: 15:21
 */
class Model_ActivityVoteName extends Core_Model
{
    protected $_tableName = 'activity_vote_result as a';
    protected $_idkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_one($id){
        $select_field=array("a.*,b.username");
        $join_str=" left join g_user_member as b on b.uid=a.uid ";
        $where[]=array("a.id",$id);
        return $this->joinOne($select_field,$where,[],$join_str);
    }




}