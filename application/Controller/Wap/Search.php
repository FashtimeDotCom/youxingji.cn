<?php
/**
 * vpcvcms
 * 手机首页
 */
class Controller_Wap_Search extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$q = $this->getParam('q');
		$courses = C::M('course')->queryAll(array(array('coursename', $q, 'LIKE')));
		foreach($courses AS $idx => $course)
		{
			$courses[$idx]['location'] = Core_Comm_Util::getLocation('', '', $course['district'], $course['road']);
			$courses[$idx]['username'] = C::M('User_Member')->getDisplayUsernameByUid($course['uid']);
			$courses[$idx]['organname'] = C::M('organ')->getOrganIdByUid($course['uid'], 'organname');
			$courses[$idx]['catname'] = C::M('category')->getCatNameByCatId($course['catid']);
		}
		/*$events = C::M('event')->queryAll(array(array('eventname', $q, 'LIKE')));
		foreach($events AS $idx => $event)
		{
			$events[$idx]['location'] = Core_Comm_Util::getLocation('', '', $event['district'], $event['road']);
			$events[$idx]['organname'] = C::M('organ')->getOrganIdByUid($event['uid'], 'organname');
			$events[$idx]['catname'] = C::M('category')->getCatNameByCatId($event['catid']);
		}*/
		$this->assign('courses', $courses);
		//$this->assign('events', $events);
		$this->assign('q', $q);
		$this->assign('curr', '搜索列表');
		$this->display('wap/search.tpl');
    }
	
	public function moreAction(){}
}