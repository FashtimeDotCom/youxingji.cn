<?php
/*
 * 论坛板块标签
 * @author snake.L
 * @site http://www.vpcv.com
 */
class Tag_Forum
{
	public function getList($params)
	{
		$num = isset($params['num']) ? $params['num'] : 50;
		$limit = isset($params['limit']) ? $params['limit'] : 0;
		$orderby = isset($params['orderby']) ? $params['orderby'] : 'sort ASC';
		$where = array(array('status', 1), array('isbest', 1));
		if($params['pid'])
		{
			$where[] = array('pid', $params['pid']);
		}
		$forums = C::M('forum')->queryAll($where, $orderby, array($num, $limit));
		$key = 0;
		foreach($forums AS $idx => $forum)
		{
			$key++;
			$forums[$idx]['key'] = $forum;
		}
		return $forums;
	}
}
?>