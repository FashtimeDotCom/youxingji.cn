<?php
/**
 * vpcvcms
 * 搜索
 */
class Controller_Index_Search extends Core_Controller_TAction
{
	
	public function bbsAction()
	{
		$q = $this->getParam('q');
		$_search = array(
			array('title', 'LIKE', $q),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		if($orderby == 'best')
			$order = "isbest DESC";
		if($orderby == 'views')
			$order = "views DESC, replies DESC";
		$_orderby = $orderby ? $order : "addtime DESC";
		
		$Num = C::M('Forumthread')->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/search/bbs' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$threads = C::M('Forumthread')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['headpic'] = C::M('User_Member')->getInfoByUid('headpic30', $thread['uid']);
			$threads[$idx]['icon'] = C::M('Forumthread')->formatIcon($thread);
		}
		$this->assign('threads', 		$threads);
		$this->assign('q', 		$q);
		$this->assign ('multipage', 	$multipage);
		$this->display('search/threads.tpl');
	}

	public function articleAction()
	{
		$q = $this->getParam('q');
		$_search = array(
			array('title', 'LIKE', $q),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		$_orderby = "addtime DESC";
		
		$Num = C::M('article')->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/search/article' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$articles = C::M('article')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($articles AS $idx => $article)
		{
			$articles[$idx]['catname'] = C::M('category')->getCatNameByCatId($article['catid']);
		}
		$this->assign('articles', 		$articles);
		$this->assign('q', 		$q);
		$this->assign ('multipage', 	$multipage);
		$this->display('search/article.tpl');
	}
}
?>