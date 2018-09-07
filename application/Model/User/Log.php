<?php

/**

 * vpcvcms

 * 记录日志

 * @author: snake.L

 */

class Model_User_Log extends Core_Model

{
	/**
	 * 表名
	 *
	 * @var string
	 */
	public $_tableName = 'user_log';

	/**
	 * 字段列表
	 *
	 * @var array
	 */
	public $_fields = array('id', 'logtime', 'uid', 'username', 'type', 'loginfo', 'logip', 'score', 'honor', 'isview');

	/**
	 * 主键字段名
	 *
	 * @var string
	 */
	public $_idkey = 'id';

	/**

     * 添加日志

     *

     * @param: (array) $log

     * @return: link to Core_Model::add().

     */

    public function addLog(array $log = array())
    {
		$log['logtime'] = Core_Fun::time();
		$log['logip'] = Core_Comm_Util::getClientIp();
		$log['username'] = C::M('User_Member')->getInfoByUid('username', $log['uid']);
        return $this->add($log);
    }
	
	public function editLog($log)
	{
		return $this->update($log);
	}
	
	public function delLog($ids)
	{
		return $this->remove($ids);
	}
	
	public function getLogCountByWhere($where = array())
	{
		return $this->getCount($where);
	}
	
	public function getLogList($whereArr=array (), $orderByArr=array (), $limitArr=array ())
	{
		$logs = $this->queryAll($whereArr, $orderByArr, $limitArr);
		return $logs;
	}
}

?>