<?php
/**
 * vpcvcms
 * 会员个人页面
 * Snake.L
 */
class Controller_Index_Home extends Core_Controller_MAction
{

	public function preDispatch() 
	{
        parent::preDispatch();
	}

	public function indexAction()
	{
		$this->display('user/profile.tpl');
	}

	public function headpicAction()
	{
		$this->display('user/headpic.tpl');
	}

	public function bbsAction()
	{
		$_search = array(
			array('uid', '', $this->user['uid']),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		if($orderby == 'best')
			$order = "isbest DESC";
		if($orderby == 'views')
			$order = "views DESC, replies DESC";
		$_orderby = $orderby ? $order : "addtime DESC";
		
		$Num = C::M('Forumthread')->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 50);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/bbs' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$threads = C::M('Forumthread')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['headpic'] = C::M('User_Member')->getInfoByUid('headpic30', $thread['uid']);
			$threads[$idx]['icon'] = C::M('Forumthread')->formatIcon($thread);
		}
		$this->assign('threads', 		$threads);

		$_search = array(
			array('uid', '', $this->user['uid']),
			array('useable', '', 1),
			array('isfirst', '!=', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		$_orderby = "addtime DESC";
		
		$Num = C::M('Forumpost')->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 50);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = '/home/bbs';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$posts = C::M('Forumpost')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($posts AS $idx => $post)
		{
			$posts[$idx]['ttitle'] = C::M('Forumthread')->getOneById('title', $post['threadid']);
		}
		$this->assign('posts', 		$posts);

		$this->assign ('multipage', 	$multipage);
		$this->display('user/bbs.tpl');
	}

	public function stowAction()
	{
		$uid = $this->user['uid'];
		$where = array(
			array('uid', $uid)
		);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('stow')->getCount($where);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/stow' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stows = C::M('stow')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($stows AS $idx => $stow)
		{
			$stows[$idx]['forumid'] = C::M('Forumthread')->getOneById('forumid', $stow['stowid']);
			$stows[$idx]['username'] = C::M('Forumthread')->getOneById('username', $stow['stowid']);
			$stows[$idx]['addtime'] = C::M('Forumthread')->getOneById('addtime', $stow['stowid']);
			$stows[$idx]['replies'] = C::M('Forumthread')->getOneById('replies', $stow['stowid']);
			$stows[$idx]['views'] = C::M('Forumthread')->getOneById('views', $stow['stowid']);
			$stows[$idx]['lastposter'] = C::M('Forumthread')->getOneById('lastposter', $stow['stowid']);
			$stows[$idx]['lastpost'] = C::M('Forumthread')->getOneById('lastpost', $stow['stowid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('stows', $stows);
		$this->display('user/stow.tpl');
	}

	public function getmsgAction()
	{
		$num = C::M('User_Message')->getMessageCountByWhere(array(array('hasview', 0), array('touid', $this->user['uid'])));
		echo "document.write('".$num."');\r\n";
	}

	public function messageAction()
	{
		$uid = $this->user['uid'];
		$where = array(
			array('touid', $uid)
		);
		
		$_orderby = "sendtime DESC";
		
		$Num = C::M('User_Message')->getMessageCountByWhere($where);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/message' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$messages = C::M('User_Message')->getMessageList($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
        $this->assign ('multipage', $multipage);
		$this->assign('messages', $messages);
		$this->display('user/message.tpl');
	}
}