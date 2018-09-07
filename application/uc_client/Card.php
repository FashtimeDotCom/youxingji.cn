<?php
/**
 * 消费板块
 * 论坛
 */
class Controller_Index_Card extends Core_Controller_TAction
{
	private $_cardModel = null;
	private $_foodModel = null;
	private $_galleryModel = null;
	public function preDispatch() 
	{
		parent::preDispatch();
		$this->_cardModel = new Model_Card();
		$this->_foodModel = new Model_Food();
		$this->_galleryModel = new Model_Gallery();
		$this->assign('son', $this->getNavByModel('card'));
		$this->assign('active', 'card');
	}
	
	public function indexAction()
	{
		$_linkModel = new Model_Link();
		$this->assign('links', $_linkModel->getLinks());
		$this->assign('current', 'index');
		$this->assign('areas', Core_Comm_Area::$areaConfig);
		$this->assign('atmos', Core_Comm_Area::$atmosphereConfig);
		$this->assign('specials', $this->_cardModel->getFoodList('isspecial', 8));
		$this->assign('hots', $this->_cardModel->getFoodList('ishot', 7));
		//$this->assign('dfoods', $this->_cardModel->getDFoodList(9));
		$this->assign('news', $this->_cardModel->getNewsList());
		$this->assign('newcards', $this->_cardModel->getCardList('addtime', '5'));
		$this->assign('cards', $this->_cardModel->getCardList('isspecial', '8'));
		$this->assign('books', $this->_cardModel->getBookList('addtime', 6));
		$this->assign('feeds', $this->_cardModel->getFeedList());
		$this->setSeo('card');
		$this->display('card/index.tpl');
	}
	
	public function sAction()
	{
		$_feedModel = new Model_Feedback();
		$_search = array(
			array('area', ''),
			array('catid', ''),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC";
		
		$Num = $this->_cardModel->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/card/s' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$cards = $this->_cardModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		
		foreach($cards AS $idx => $card)
		{
			$cards[$idx]['catname'] = Core_Fun::getAtmoName($card['catid']);
			$cards[$idx]['areaname'] = Core_Fun::getAreaName($card['area']);
			$cards[$idx]['feed'] = $_feedModel->getFeedList($card['id'], 'card', 2);
		}
		
        $this->assign ('multipage', $multipage);
		$this->assign('cards', $cards);
		$this->assign('areas', Core_Comm_Area::$areaConfig);
		$this->assign('atmos', Core_Comm_Area::$atmosphereConfig);
		$this->assign('hotcards', $this->_cardModel->getCardList('ishot', '5'));
		$this->assign('current', 'cards');
		$this->setSeo('cards');
		$this->display('card/card_search.tpl');
	}
	
	public function foodAction()
	{
		$_categoryModel = new Model_Category();
		$_search = array(
			array('catid', ''),
			array('kindid', ''),
			array('isonly', ''),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC";
		
		$Num = $this->_foodModel->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/card/food' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$foods = $this->_foodModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		
        $this->assign ('multipage', $multipage);
		$this->assign('foods', $foods);
		$this->assign('cats', $_categoryModel->getCategory(0, 2));
		$this->assign('hotfoods', $this->_foodModel->getFoodList('ishot', '5'));
		$this->assign('current', 'food');
		$this->setSeo('food');
		$this->display('card/food_search.tpl');
	}
	
	public function articleAction()
	{
		$_articleModel = new Model_Article();
		$this->assign('newlist', $_articleModel->getNewsList(5, 1, 'updatetime DESC, sort ASC, shownum DESC'));
		$this->assign('toplist', $_articleModel->getNewsList(10));
		$this->assign('reclist', $_articleModel->getNewsList(10, 1, 'isspecial DESC, updatetime DESC, sort ASC, shownum DESC'));
		$this->assign('cats', $_articleModel->getCategoryArticle(1));
		$this->assign('recs', $this->_foodModel->getFoodList('isspecial', '1'));
		$this->assign('current', 'article');
		$this->setSeo('article');
		$this->display('card/article.tpl');
	}
	
	public function articlesAction()
	{
		$_categoryModel = new Model_Category();
		$_articleModel = new Model_Article();
		$_search = array(
			array('catid', ''),
			array('type', '', 1),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC";
		
		$Num = $_articleModel->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/card/article' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$articles = $_articleModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		
        $this->assign ('multipage', $multipage);
		$this->assign('articles', $articles);
		$this->assign('cats', $_categoryModel->getCategory(0, 1));
		$this->assign('reclist', $_articleModel->getNewsList(10, 1, 'isspecial DESC, updatetime DESC, sort ASC, shownum DESC'));
		$this->setSeo('article');
		$this->assign('current', 'article');
		$this->display('card/article_search.tpl');
	}
	
	public function foodviewAction()
	{
		$id = $this->getParam('id');
		$food = $this->_foodModel->find($id);
		if(!$food)
		{
			$this->showmsg('你查看的信息不存在');
		}
		$this->_foodModel->updateNum($id);
		$_feedModel = new Model_Feedback();
		$_articleModel = new Model_Article();
		$_cbookModel = new Model_Cbook();
		$galleries = $this->_galleryModel->getGalleryList($id, BELONG_FOOD);
		$this->assign('gallerylist', $galleries);
		$card = $this->_cardModel->find($food['cardid']);
		$card['atmoname'] = Core_Fun::getAtmoName($card['catid']);
		$this->assign('card', $card);
		$this->assign('food', $food);
		$this->assign('feeds', $_feedModel->getFeedList($id, 'food', 20));
		$this->assign('specials', $this->_cardModel->getFoodList('isspecial'));
		$this->assign('reclist', $_articleModel->getNewsList(10, 1, 'isspecial DESC, updatetime DESC, sort ASC, shownum DESC'));
		$this->assign('hotcbooks', $_cbookModel->getBookList('ishot', 8));
		$this->assign('current', 'food');
		$this->setSeo('food');
		$this->display('card/food_view.tpl');
	}
	
	public function viewAction()
	{
		$id = $this->getParam('id');
		$card = $this->_cardModel->find($id);
		if(!$card)
		{
			$this->showmsg('你查看的信息不存在');
		}
		$this->_cardModel->updateNum($id);
		$_feedModel = new Model_Feedback();
		$galleries = $this->_galleryModel->getGalleryList($id, BELONG_CARD);
		$this->assign('gallerylist', $galleries);
		$card['atmoname'] = Core_Fun::getAtmoName($card['catid']);
		$card['areaname'] = Core_Fun::getAreaName($card['area']);
		$this->assign('card', $card);
		$this->assign('feeds', $_feedModel->getFeedList($id, 'card', 20));
		$this->assign('specials', $this->_cardModel->getFoodList('isspecial', 5, 'DESC', $id));
		$this->assign('current', 'cards');
		$this->setSeo('cards');
		$this->display('card/card_view.tpl');
	}
	
	public function newviewAction()
	{
		$_articleModel = new Model_Article();
		$id = $this->getParam('id');
		$article = $_articleModel->find($id);
		if(!$article)
		{
			$this->showmsg('你查看的信息不存在');
		}
		$_articleModel->updateShow($id);
		$_feedModel = new Model_Feedback();
		$this->assign('article', $article);
		$this->assign('feeds', $_feedModel->getFeedList($id, 'article', 20));
		$this->assign('recs', $this->_foodModel->getFoodList('isspecial', '1'));
		$this->assign('reclist', $_articleModel->getNewsList(10, 1, 'isspecial DESC, updatetime DESC, sort ASC, shownum DESC'));
		$this->assign('current', 'article');
		$this->setSeo('article');
		$this->display('card/article_view.tpl');
	}
}