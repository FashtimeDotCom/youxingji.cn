<?php
/*
 * 模型标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Tag_Module
{
	public function getList($params)
	{
		$arr = C::M('base_module')->select();
		return $arr;
	}
}
?>