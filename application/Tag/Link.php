<?php
/*
 * 友情链接标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Tag_Link
{
	public function getList($params)
	{
		$arr = C::M('link')->getLinks();
		return $arr;
	}
}
?>