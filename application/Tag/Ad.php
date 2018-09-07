<?php

class Tag_Ad
{
	public function getList($params)
	{
		$arr = C::M('ad')->getAdList($params['tagname'], $params['num']);
		return $arr;
	}
}
?>