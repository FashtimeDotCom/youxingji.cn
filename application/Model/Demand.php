<?php
/*
 * 发布需求模型
 */
class Model_Demand extends Core_Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'demand_demand';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'scene', 'style', 'cloth', 'fileurl', 'content', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
}
?>