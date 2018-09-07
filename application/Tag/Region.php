<?php

class Tag_Region
{
	public function getList($params)
	{
		$pid = isset($params['pid']) ? $params['pid'] : 52;
		$arr = C::M('region')->getRegionList($pid);
		$idx = 1;
		foreach($arr AS $key => $value)
		{
			$arr[$key]['idx'] = $idx;
			$idx++;
		}

		return $arr;
	}
}
?>