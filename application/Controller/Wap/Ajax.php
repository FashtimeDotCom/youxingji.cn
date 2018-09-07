<?php
/**
 * vpcvcms
 * 异步操作
 */
class Controller_Wap_Ajax extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
	
	public function feedlistAction()
	{
		$pagenum = $this->getParam('pagenum');
		$perpage = 10;
		$type = $this->getParam('type');
		$postid = $this->getParam('postid');
		
		$feeds = C::M('feedback')->queryAll(array(array('type', $type), array('postid', $postid)), 'addtime DESC', array($perpage, $perpage * ($pagenum - 1)));
		$html = '';
		if($feeds)
		{
			foreach($feeds AS $feed)
			{
				$headpic = C::M('User_Member')->getInfoByUid('headpic50', $feed['uid']);
				$realname = C::M('User_Member')->getInfoByUid('realname', $feed['uid']);
				$headpic = $headpic ? $headpic : Core_Fun::getPathroot() . 'resource/images/user_head_img.gif';
				$realname = $realname ? $realname : '匿名';
				$score = C::M('feedback')->formatScore($feed['score']);
				$html .= '<li><div class="topinfo clearfix"><img src="' . $headpic . '" width="50" height="50" class="avter" /><div class="info"><p>' . $realname . '</p><p>' . $score . '</p></div><div class="time">' . Core_Fun::date('Y-m-d', $feed['addtime']) . '</div></div><div class="mc">' . $feed['content'] . '</div></li>';
			}
			$arr['msg'] = 1;
			$arr['html'] = $html;
			$arr['pagenum'] = $pagenum + 1;
		}
		else
		{
			$arr['msg'] = 0;
			$arr['html'] = '';
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function organfeedlistAction()
	{
		$pagenum = $this->getParam('pagenum');
		$perpage = 10;
		$organid = $this->getParam('organid');
		$courseid = C::M('course')->getCourseIdsByOrganId($organid);
		$eventid = C::M('event')->getEventIdsByOrganId($organid);
		if(empty($courseid) || empty($eventid))
		{
			$arr['msg'] = 0;
			$arr['html'] = '';
		}
		else
		{
			$feeds = C::M('feedback')->queryAll(array(array('type', 'book', '!='), array('type', 'active', '!='), array('postid', $courseid . $eventid, 'IN')), 'addtime DESC', array($perpage, $perpage * ($pagenum - 1)));
			$html = '';
			if($feeds)
			{
				foreach($feeds AS $feed)
				{
					$headpic = C::M('User_Member')->getInfoByUid('headpic50', $feed['uid']);
					$realname = C::M('User_Member')->getInfoByUid('realname', $feed['uid']);
					$headpic = $headpic ? $headpic : Core_Fun::getPathroot() . 'resource/images/user_head_img.gif';
					$realname = $realname ? $realname : '匿名';
					$score = C::M('feedback')->formatScore($feed['score']);
					$html .= '<li><div class="topinfo clearfix"><img src="' . $headpic . '" width="50" height="50" class="avter" /><div class="info"><p>' . $realname . '</p><p>' . $score . '</p></div><div class="time">' . Core_Fun::date('Y-m-d', $feed['addtime']) . '</div></div><div class="mc">' . $feed['content'] . '</div></li>';
				}
				$arr['msg'] = 1;
				$arr['html'] = $html;
				$arr['pagenum'] = $pagenum + 1;
			}
			else
			{
				$arr['msg'] = 0;
				$arr['html'] = '';
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function feedAction()
	{
		$cUser = $this->getUser();
		$postid = $this->getParam('id');
		$type = $this->getParam('type');
		$score = $this->getParam('score');
		$posttitle = $this->getParam('title');
		$content = htmlspecialchars($this->getParam('content'));
		$time = Core_Fun::time();
		$isfeed = C::M('Feedback')->isFeedBack($cUser['uid'], $postid, $type);
		if(empty($cUser['uid']))
		{
			$arr['msg'] = -1;
		}
		/*elseif($isfeed > 0)
		{
			$arr['msg'] = -2;
		}*/
		else
		{
			$data = array(
				'uid' => $cUser['uid'],
				'postid' => $postid,
				'type' => $type,
				'score' => $score,
				'posttitle' => $posttitle,
				'status' => 1,
				'content' => $content,
				'addtime' => $time
			);
			$feedid = C::M('Feedback')->add($data);
			if($feedid > 0)
			{
				C::M($type)->updateNum($postid, 'feednum');
				$score = Core_Config::get('feed_score', 'basic', '10');
				C::M('User_Member')->editUserInfo(array(
					'uid' => $cUser['uid'],
					'score' => $score
				));
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function categoryAction()
	{
		$pid = $this->getParam('pid');
		$joinid = $this->getParam('joinid');
		$type = $this->getParam('type');
		$categories = C::M('category')->getCategoryList($pid, 2);
		$catname = C::M('category')->getCatNameByCatId($pid);
		$html = '';
		$allurl = $joinid ? Core_Fun::getPathroot() . 'wap/' . $type . '/index/catid/' . $pid . '/road/' . $joinid : Core_Fun::getPathroot() . 'wap/' . $type . '/index/catid/' . $pid;
		$html .= '<li><a href="' . $allurl . '">' . $catname . '(全部)</a></li>';
		foreach($categories AS $cat)
		{
			$url = $joinid ? Core_Fun::getPathroot() . 'wap/' . $type . '/index/catid/' . $cat['id'] . '/road/' . $joinid : Core_Fun::getPathroot() . 'wap/' . $type . '/index/catid/' . $cat['id'];
			$html .= '<li><a href="' . $url . '">' . $cat['catname'] . '</a></li>';
		}
		echo $html;
	}
	
	public function districtAction()
	{
		$pid = $this->getParam('pid');
		$joinid = $this->getParam('joinid');
		$type = $this->getParam('type');
		$cattype = $type == 'event' ? 'kind' : 'catid';
		$regions = C::M('region')->getRegionList($pid, 2);
		$regionname = C::M('region')->getRegionName($pid);
		$html = '';
		$allurl = $joinid ? Core_Fun::getPathroot() . 'wap/' . $type . '/index/district/' . $pid . '/' . $cattype . '/' . $joinid : Core_Fun::getPathroot() . 'wap/' . $type . '/index/district/' . $pid;
		$html .= '<li><a href="' . $allurl . '">' . $regionname . '(全部)</a></li>';
		foreach($regions AS $region)
		{
			$url = $joinid ? Core_Fun::getPathroot() . 'wap/' . $type . '/index/road/' . $region['id'] . '/' . $cattype . '/' . $joinid : Core_Fun::getPathroot() . 'wap/' . $type . '/index/road/' . $region['id'];
			$html .= '<li><a href="' . $url . '">' . $region['regionname'] . '</a></li>';
		}
		echo $html;
	}
	
	public function hcatAction()
	{
		$pid = $this->getParam('pid');
		$type = $this->getParam('type');
		$categories = C::M('category')->getCategoryList($pid, 2);
		$html = '';
		foreach($categories AS $cat)
		{
			$url = Core_Fun::getPathroot() . 'wap/home/' . $type . '/catid/' . $cat['id'];
			$html .= '<li><a href="' . $url . '">' . $cat['catname'] . '</a></li>';
		}
		echo $html;
	}
	
	public function postfriendAction()
	{
		$cUser = $this->getUser();
		$content = $this->getParam('content');
		$msg = $this->getParam('msg');
		$kind = $this->getParam('kind');
		$district = $this->getParam('district');
		$road = $this->getParam('road');
		$grade = $this->getParam('grade');
		$catid = $this->getParam('catid');
		$sex = $this->getParam('sex');
		$mytime = $this->getParam('mytime');
		$destination = $this->getParam('destination');
		$ip = Core_Comm_Util::getClientIp();
		$geo = Core_Lib_Curl::getLngLatByIP($ip);
		$data = array(
			'uid' => $cUser['uid'],
			'kind' => $kind,
			'content' => $content,
			'msg' => $msg,
			'district' => $district,
			'road' => $road,
			'grade' => $grade,
			'catid' => $catid,
			'mytime' => $mytime,
			'destination' => $destination,
			'sex' => $sex,
			'useable' => 1,
			'lng' => $geo['lng'],
			'lat' => $geo['lat'],
			'ip' => $ip,
			'addtime' => Core_Fun::time()
		);
		
		if(C::M('findfriend')->add($data))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function posttopicAction()
	{
		$cUser = $this->getUser();
		$content = $this->getParam('content');
		$realname = $this->getParam('realname');
		$telephone = $this->getParam('telephone');
		$topicname = $this->getParam('topicname');
		$ip = Core_Comm_Util::getClientIp();
		$data = array(
			'uid' => $cUser['uid'],
			'realname' => $realname,
			'content' => $content,
			'telephone' => $telephone,
			'topicname' => $topicname,
			'useable' => 0,
			'ip' => $ip,
			'addtime' => Core_Fun::time()
		);
		
		if(C::M('topic')->add($data))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function bestAction()
	{
		$cUser = $this->getUser();
		$topicid = $this->getParam('topicid');
		$time = Core_Fun::time();
		$data = array(
			'uid' => $cUser['uid'],
			'topicid' => $topicid,
			'isbest' => 1,
			'addtime' => $time
		);
		$r = C::M('topicbest')->addBest($data);
		if($r)
		{
			C::M('topicpost')->editPost(array(
				'id' => $topicid,
				'bestnum' => 1
			));
			$score = Core_Config::get('best_score', 'basic', '1');
			C::M('User_Member')->editUserInfo(array(
				'uid' => $cUser['uid'],
				'score' => $score
			));
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function abestAction()
	{
		$articleid = $this->getParam('articleid');
		$r = C::M('article')->addBest($articleid);
		if($r)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function treplyAction()
	{
		$cUser = $this->getUser();
		$content = $this->getParam('content');
		$id = $this->getParam('id');
		$topicid = $this->getParam('topicid');
		$ip = Core_Comm_Util::getClientIp();
		$data = array(
			'uid' => $cUser['uid'],
			'content' => $content,
			'postid' => $id,
			'topicid' => $topicid,
			'useable' => 1,
			'ip' => $ip,
			'addtime' => Core_Fun::time()
		);
		
		if(C::M('topicpost')->add($data))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function freplyAction()
	{
		$cUser = $this->getUser();
		$content = $this->getParam('content');
		$id = $this->getParam('id');
		$ip = Core_Comm_Util::getClientIp();
		$data = array(
			'uid' => $cUser['uid'],
			'content' => $content,
			'pid' => 0,
			'friendid' => $id,
			'useable' => 1,
			'ip' => $ip,
			'addtime' => Core_Fun::time()
		);
		
		if(C::M('findfriendreply')->add($data))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function mreplyAction()
	{
		$cUser = $this->getUser();
		$content = $this->getParam('content');
		$id = $this->getParam('id');
		$friendid = $this->getParam('friendid');
		$ip = Core_Comm_Util::getClientIp();
		$data = array(
			'uid' => $cUser['uid'],
			'content' => $content,
			'pid' => $id,
			'friendid' => $friendid,
			'useable' => 1,
			'ip' => $ip,
			'addtime' => Core_Fun::time()
		);
		
		if(C::M('findfriendreply')->add($data))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function distanceallAction()
	{
		$courses = C::M('course')->queryAll(array(array('useable', 1), array('endtime', $time, '>=')));
		$events = C::M('event')->queryAll(array(array('useable', 1)));
		$list = array();
		foreach($courses AS $idx => $course)
		{
			$list[] = array(
				'type' => 'course',
				'id' => $course['id'],
				'lng' => $course['lng'],
				'lat' => $course['lat']
			);
		}
		foreach($events AS $idx => $event)
		{
			$list[] = array(
				'type' => 'event',
				'id' => $event['id'],
				'lng' => $event['lng'],
				'lat' => $event['lat']
			);
		}

		echo Core_Fun::array2json(array('list' => $list));
	}

	public function distanceAction()
	{
		//$lng = $this->getParam('lng');
		//$lat = $this->getParam('lat');
		$m = $this->getParam('m');
		$id = $this->getParam('id');
		//$ip = Core_Comm_Util::getClientIp();
		//$geo = Core_Lib_Curl::getLngLatByIP($ip);
		/*if(!$geo['lng'])
		{
			$km = '0km';
			$numdistance = '0';
		}
		else
		{
			$distance = $this->getDistance($lng, $lat, $geo['lng'], $geo['lat']);
			$km = $distance['km'];
			$numdistance = $distance['numkm'];
		}*/
		$numdistance = $this->getParam('km');
		C::M($m)->update(array(
			'id' => $id,
			'km' => $numdistance
		));
		$arr['html'] = $km;
		
		echo Core_Fun::array2json($arr);
	}
	
	public function setlnglatAction(){
		$lng = $this->getParam('lng');
		$lat = $this->getParam('lat');
		$_SESSION['mylng'] = $lng;
		$_SESSION['mylat'] = $lat;
	}

	private function getDistance($lng1, $lat1, $lng2, $lat2, $isk = true)
	{
		$radLat1 = deg2rad($lat1);
		$radLat2 = deg2rad($lat2);
		$radLng1 = deg2rad($lng1);
		$radLng2 = deg2rad($lng2);
		$lat = $radLat1 - $radLat2;//两纬度之差,纬度<90
		$lng = $radLng1 - $radLng2;//两经度之差纬度<180
		$distance = 2*asin(sqrt(pow(sin($lat/2),2) + cos($radLat1)*cos($radLat2)*pow(sin($lng/2),2)))*6378.137;
		$km = round($distance, 1);
		return array('km' => $km . 'km', 'numkm' => $km);
		//return $isk ? $km . 'km' : $km;
	}
	
	public function smsAction()
	{
		$smsuser = $hotword = Core_Config::get('smsuser', 'third', '');
		$smspwd = $hotword = Core_Config::get('smspwd', 'third', '');
		$telephone = $this->getParam('telephone');
		if(empty($telephone))
		{
			$arr['msg'] = -1;
		}
		elseif(empty($smsuser))
		{
			$arr['msg'] = -2;
		}
		elseif(!Core_Comm_Validator::isTelephone($telephone))
		{
			$arr['msg'] = -3;
		}
		else
		{
			$url = "http://114.113.154.5/smsJson.aspx";
			$sign = Core_Comm_Token::randomnum(6);
			$params = array(
				'action' => 'send',
				'userid' => '4030',
				'account' => $smsuser,
				'password' => strtoupper(md5($smspwd)),
				'mobile' => $telephone,
				'content' => "您的验证码是：" . $sign . "【优学网】"
			);
			$gets = Core_Lib_Curl::makeRequest($url, $params);
			$lists = json_decode($gets['msg'], true);
			if($lists['returnstatus'] == 'Success')
			{
				$arr['msg'] = 1;
				C::M('Base_Valid')->addValid(array('telephone' => $telephone, 'sign' => $sign, 'type' => 'reg'));
			} 
			else
			{
				$arr['msg'] = $lists['message'];
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function newsmsAction()
	{
		$cUser = $this->getUser();
		$uid = $cUser['uid'];
		$smsuser = $hotword = Core_Config::get('smsuser', 'third', '');
		$smspwd = $hotword = Core_Config::get('smspwd', 'third', '');
		$oldtelephone = C::M('User_Member')->getInfoByUid('telephone', $uid);
		$telephone = $this->getParam('telephone');
		if(empty($telephone))
		{
			$arr['msg'] = -1;
		}
		elseif(empty($smsuser))
		{
			$arr['msg'] = -2;
		}
		elseif(!Core_Comm_Validator::isTelephone($telephone))
		{
			$arr['msg'] = -3;
		}
		elseif($oldtelephone == $telephone)
		{
			$arr['msg'] = -4;
		}
		else
		{
			$url = "http://114.113.154.5/smsJson.aspx";
			$sign = Core_Comm_Token::randomnum(6);
			$params = array(
				'action' => 'send',
				'userid' => '4030',
				'account' => $smsuser,
				'password' => strtoupper(md5($smspwd)),
				'mobile' => $telephone,
				'content' => "您的验证码是：" . $sign . "【优学网】"
			);
			$gets = Core_Lib_Curl::makeRequest($url, $params);
			$lists = json_decode($gets['msg'], true);
			if($lists['returnstatus'] == 'Success')
			{
				$arr['msg'] = 1;
				C::M('Base_Valid')->addValid(array('telephone' => $telephone, 'sign' => $sign, 'type' => 'new'));
			} 
			else
			{
				$arr['msg'] = $lists['message'];
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function findsmsAction()
	{
		$smsuser = $hotword = Core_Config::get('smsuser', 'third', '');
		$smspwd = $hotword = Core_Config::get('smspwd', 'third', '');
		$telephone = $this->getParam('telephone');
		$userinfo = C::M('User_Member')->getUserCount(array(array('username', $telephone)));
		if(empty($telephone))
		{
			$arr['msg'] = -1;
		}
		elseif(empty($smsuser))
		{
			$arr['msg'] = -2;
		}
		elseif(!Core_Comm_Validator::isTelephone($telephone))
		{
			$arr['msg'] = -3;
		}
		elseif($userinfo == 0)
		{
			$arr['msg'] = -4;
		}
		else
		{
			$url = "http://114.113.154.5/smsJson.aspx";
			$sign = Core_Comm_Token::randomnum(6);
			$params = array(
				'action' => 'send',
				'userid' => '4030',
				'account' => $smsuser,
				'password' => strtoupper(md5($smspwd)),
				'mobile' => $telephone,
				'content' => "您的验证码是：" . $sign . "【优学网】"
			);
			$gets = Core_Lib_Curl::makeRequest($url, $params);
			$lists = json_decode($gets['msg'], true);
			if($lists['returnstatus'] == 'Success')
			{
				$arr['msg'] = 1;
				C::M('Base_Valid')->addValid(array('telephone' => $telephone, 'sign' => $sign, 'type' => 'find'));
			} 
			else
			{
				$arr['msg'] = $lists['message'];
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function stowAction()
	{
		$cUser = $this->getUser();
		$stowid = $this->getParam('stowid');
		$stowtype = $this->getParam('stowtype');
		$stowtitle = $this->getParam('stowtitle');
		$time = Core_Fun::time();
		$isstow = C::M('stow')->checkStow($cUser['uid'], $stowid, $stowtype);
		if(empty($cUser['uid']))
		{
			$arr['msg'] = -1;
		}
		elseif(!$isstow)
		{
			$arr['msg'] = -2;
		}
		else
		{
			$data = array(
				'uid' => $cUser['uid'],
				'stowid' => $stowid,
				'stowtype' => $stowtype,
				'stowtitle' => $stowtitle,
				'useable' => 1,
				'ip' => Core_Comm_Util::getClientIp(),
				'addtime' => $time
			);
			$r = C::M('stow')->add($data);
			if($r > 0)
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function getorderAction()
	{
		$buytype = $this->getParam('buytype');
		$goodsid = $this->getParam('goodsid');
		
		$orders = C::M('order')->queryAll(array(array('buytype', $buytype), array('goodsid', $goodsid), array('state', 1)), 'addtime DESC');
		$html = '';
		foreach($orders AS $idx => $order)
		{
			$username = C::M('User_Member')->getInfoByUid('username', $order['uid']);
			$username = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$html .= '<li class="line">' . $username . '<span class="time">' . Core_Fun::date('Y-m-d', $order['addtime']) . '</span></li>';
		}
		
		echo Core_Fun::array2json(array('html' => $html));
	}
}
?>