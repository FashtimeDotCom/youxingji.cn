<?php
/**
 * 成都地区编码表
 * @param 
 * @return
 * @author Snake
 */
class Core_Comm_Area
{
	public static $areaConfig;
	public static $atmosphereConfig;
	public static $siteConfig;
	
	public static function getLngLat($address)
	{
		$url = 'http://restapi.amap.com/v3/geocode/geo?key=a05e7a39632b39aad6bc2d9aa227fc61&output=json&address=' . $address . '&city=010';
		$result = file_get_contents($url);
		$json = json_decode($result, true);
		$location = $json['geocodes'][0]['location'];
		$local = explode(',', $location);
		return array('lng' => $local[0], 'lat' => $local[1]);
	}
}
Core_Comm_Area::$areaConfig = array(array('id' => 1, 'name' => '青羊区'), array('id' => 2, 'name' => '锦江区'), array('id' => 3, 'name' => '金牛区'), array('id' => 4, 'name' => '武侯区'), array('id' => 5, 'name' => '成华区'), array('id' => 6, 'name' => '龙泉驿区'), array('id' => 7, 'name' => '青白江区'), array('id' => 8, 'name' => '高新区'), array('id' => 9, 'name' => '新都区'), array('id' => 10, 'name' => '温江区'), array('id' => 11, 'name' => '其他'));
Core_Comm_Area::$atmosphereConfig = array(array('id' => 1, 'name' => '情侣约会'), array('id' => 2, 'name' => '商务宴请'), array('id' => 3, 'name' => '朋友聚餐'), array('id' => 4, 'name' => '休闲时光'), array('id' => 5, 'name' => '能刷卡'), array('id' => 6, 'name' => '能上网'), array('id' => 7, 'name' => '有无烟区'), array('id' => 8, 'name' => '送外卖'), array('id' => 9, 'name' => '老字号'));

Core_Comm_Area::$siteConfig = array(
	array('id' => 1, 'name' => '大众点评网', 'api' => Core_Fun::iurlencode('http://api.t.dianping.com/n/api.xml?cityId=8')), 
	array('id' => 2, 'name' => '拉手网', 'api' => Core_Fun::iurlencode('http://open.client.lashou.com/api/detail/city/1840')), 
	array('id' => 3, 'name' => '美团网', 'api' => Core_Fun::iurlencode('http://www.meituan.com/api/v2/chengdu/deals')), 
	array('id' => 4, 'name' => '窝窝团', 'api' => Core_Fun::iurlencode('http://www.55tuan.com/partner/partnerApi?partner=wowo&city=chengdu')), 
	array('id' => 5, 'name' => '高朋'), 
	array('id' => 6, 'name' => '嘀嗒团', 'api' => Core_Fun::iurlencode('http://i2.didaimg.com/api/openapi?city=chengdu')), 
	array('id' => 7, 'name' => 'QQ团购'), 
	array('id' => 8, 'name' => '满座网', 'api' => Core_Fun::iurlencode('http://api.manzuo.com/common_chengdu.xml')), 
	array('id' => 9, 'name' => '团购王', 'api' => Core_Fun::iurlencode('http://www.go.cn/api/detail.php?city=30')), 
	array('id' => 10, 'name' => '万众团'), 
	array('id' => 11, 'name' => '品质团'), 
	array('id' => 12, 'name' => '糯米网', 'api' => Core_Fun::iurlencode('http://www.nuomi.com/api/dailydeal?version=v1&city=chengdu')), 
	array('id' => 13, 'name' => '携程团购'), 
	array('id' => 14, 'name' => '艺龙团购'), 
	array('id' => 15, 'name' => '同程网团购'), 
	array('id' => 16, 'name' => '京东团购'), 
	array('id' => 17, 'name' => 'LIKE团'), 
	array('id' => 18, 'name' => '聚美优品')
);
?>