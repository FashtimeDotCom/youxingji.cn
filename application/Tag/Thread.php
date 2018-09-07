<?php
/*
 *  调用论坛列表
 *  snake.L
 */
class Tag_Thread
{
	public function getList($params)
	{
		$forumid = $params['forumid'] ? $params['forumid'] : '';
		$num = $params['num'] ? $params['num'] : 5;
		$threads = C::M('forumthread')->getThreadList($forumid, $num);
		return $threads;
	}
}
?>