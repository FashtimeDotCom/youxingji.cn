<?php
/**
 * vpcvcms
 * 机构控制器
 */
class Controller_Wap_Organ extends Core_Controller_WapAction
{
	private $_organid;
	public function preDispatch() 
	{
        parent::preDispatch();
		if($this->getActionName() != 'index')
		{
			$id = $this->getParam('id'); //机构ID
			$organ = C::M('organ')->find($id);
			if(!$organ['id'])
				$this->showmsg('该机构不存在', 'wap/organ');
			$organ['location'] = Core_Comm_Util::getLocation('', '', $organ['district'], $organ['road']);
			$this->_organid = $id;
			$this->assign('organ', $organ);
			$this->assign('stowid', $organ['id']);
			$this->assign('stowtype', 'organ');
			$this->assign('stowtitle', $organ['organname']);
		}
	}
    public function indexAction()
    {
		$road = $this->getParam('road');
		$district = $this->getParam('district');
		$catid = $this->getParam('catid');
		$orderby = $this->getParam('orderby');
		$orderby = $orderby ? $orderby : 3;
		$where = array(array('useable', 1));
		$conditions = array();
		if($road)
		{
			$where[] = array('road', $road);
			$conditions['road'] = $road;
			$this->assign('regionname', C::M('region')->getRegionName($road));
		}
		if($district)
		{
			$where[] = array('district', $district);
			$conditions['district'] = $district;
			$this->assign('regionname', C::M('region')->getRegionName($district));
		}
		if($catid)
		{
			$where[] = array('catarr', $catid, 'FIND_IN_SET');
			$conditions['catid'] = $catid;
			$this->assign('catname', C::M('category')->getCatNameByCatId($catid));
		}

		if($orderby == 1)
		{
			$_orderby = "joinnum DESC";
			$this->assign('orderby', '报名人数');
		}
		elseif($orderby == 2)
		{
			$_orderby = "feednum DESC";
			$this->assign('orderby', '评论数');
		}
		elseif($orderby == 3)
		{
			$_orderby = "km ASC";
			$this->assign('orderby', '距离');
		}
		else
		{
			$_orderby = "addtime DESC";
		}
		
		$mylng = $_SESSION['mylng'];
		$mylat = $_SESSION['mylat'];
		
		$Num = C::M('organ')->getCount($where);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/organ/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$organs = C::M('organ')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)), array('*', 'GETDISTANCE(lat,lng,'.$mylat.','.$mylng.') AS km'));
		foreach($organs AS $idx => $organ)
		{
			$organs[$idx]['location'] = Core_Comm_Util::getLocation('', '', $organ['district'], $organ['road']);
		}
		$this->assign('organs', $organs);
		$this->assign ('multipage', $multipage);
		$this->assign('conditions', $conditions);
		$this->assign('curr', 'organ');
		$this->display('wap/organ_index.tpl');
    }
	
	public function showAction()
	{
		C::M('organ')->updateNum($this->_organid, 'shownum');
		$this->assign('curr', '机构详情');
		$this->display('wap/organ_show.tpl');
	}
	
	public function courseAction()
	{
		$time = Core_Fun::time();
		$where = array(array('useable', 1), array('endtime', $time, '>='));
		$conditions = array();
		if($this->_organid)
		{
			$where[] = array('organid', $this->_organid);
			$conditions['id'] = $this->_organid;
		}

		$_orderby = "addtime DESC";
		
		$Num = C::M('course')->getCount($where);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/organ/course' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$courses = C::M('course')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		$this->assign('courses', $courses);
		$this->assign ('multipage', $multipage);
		$this->assign('oc', 'course');
		$this->assign('curr', '机构课程');
		$this->display('wap/organ_course.tpl');
	}
	
	public function eventAction()
	{
		$where = array(array('useable', 1));
		$conditions = array();
		if($this->_organid)
		{
			$where[] = array('organid', $this->_organid);
			$conditions['id'] = $this->_organid;
		}

		$_orderby = "addtime DESC";
		
		$Num = C::M('event')->getCount($where);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/organ/event' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$events = C::M('event')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		$this->assign('events', $events);
		$this->assign ('multipage', $multipage);
		$this->assign('oc', 'event');
		$this->assign('curr', '机构活动');
		$this->display('wap/organ_event.tpl');
	}
	
	public function feedAction()
	{
		$this->assign('curr', '机构评论');
		$this->assign('oc', 'feed');
		$this->display('wap/organ_feed.tpl');
	}
	
	public function postfeedAction()
	{
		$id = $this->getParam('id');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . Core_Fun::iurlencode(Core_Fun::getPathroot() . 'wap/organ/postfeed/id/' . $id), 0);
		$organname = C::M('organ')->getOneById('organname', $id);
		$this->assign('id', $id);
		$this->assign('organname', $organname);
		$this->assign('curr', '点评机构');
		$this->display('wap/organ_postfeed.tpl');
	}
	
	public function activeAction()
	{
		$where = array(array('useable', 1));
		$conditions = array();
		if($this->_organid)
		{
			$where[] = array('organid', $this->_organid);
			$conditions['id'] = $this->_organid;
		}

		$_orderby = "addtime DESC";
		
		$Num = C::M('active')->getCount($where);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/organ/active' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$actives = C::M('active')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		$this->assign('actives', $actives);
		$this->assign ('multipage', $multipage);
		$this->assign('oc', 'active');
		$this->assign('curr', '机构动态');
		$this->display('wap/organ_active.tpl');
	}
	
	public function joinAction()
	{
		$where = array(array('state', 1));
		$conditions = array();
		if($this->_organid)
		{
			$where[] = array('organid', $this->_organid);
			$conditions['id'] = $this->_organid;
		}

		$_orderby = "addtime DESC";
		
		$Num = C::M('order')->getCount($where);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/organ/join' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$orders = C::M('order')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($orders AS $idx => $order)
		{
			$username = C::M('User_Member')->getInfoByUid('username', $order['uid']);
			$orders[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$orders[$idx]['realname'] = C::M('User_Member')->getInfoByUid('realname', $order['uid']);
		}
		$this->assign('orders', $orders);
		$this->assign ('multipage', $multipage);
		$this->assign('oc', 'join');
		$this->assign('curr', '报名情况');
		$this->display('wap/organ_join.tpl');
	}
}