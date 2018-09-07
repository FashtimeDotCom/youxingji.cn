<?php
/**
 * vpcvcms
 * 商品
 */
class Controller_Wap_Goods extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
		$this->assign('current', 'good');
	}
    
	public function indexAction()
	{
		$catid = $this->getParam('catid');
		if($catid)
		{
			$_search = array(
				array('catarr', 'FIND_IN_SET', $catid),
				array('useable', '', 1)
			);
		}
		else
		{
			$_search = array(array('useable', '', 1));
		}
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC,addtime DESC";
		
		$Num = C::M('goods')->getCount($_searchArr['where']);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/goods/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$goods = C::M('goods')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($goods AS $idx => $good)
		{
			$goods[$idx]['price'] = C::M('goodspec')->getPriceGoodsId($good['id']);
			$goods[$idx]['unit'] = C::M('goodspec')->getUnitGoodsId($good['id']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('goods', $goods);
		$this->assign('categories', C::M('category')->getCategory(0, 2));
		$this->assign('catname', C::M('category')->getCatNameByCatId($catid));
		$this->assign('curr', '分类');
		$this->display('wap/goods.tpl');
	}
	
	public function showAction()
	{
		$id = $this->getParam('id');
		$good = C::M('goods')->find($id);
		if(!$good['id'])
			$this->showmsg('此商品不存在', 'wap/goods');
		$good['spec'] = C::M('goodspec')->getSpecByGoodsId($id);
		$this->assign('feeds', C::M('feedback')->getFeedList($id, 'goods', 20));
		$this->assign('good', $good);
		$this->assign('curr', '商品详情');
		$this->display('wap/good_show.tpl');
	}
	
	public function priceAction()
	{
		$attrid = $this->getParam('attrid');
		$goodsid = $this->getParam('goodsid');
		$num = $this->getParam('num');
		
		$price = C::M('goodspec')->getPriceByGoodsId($goodsid, $attrid);
		$unit = C::M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'unit');
		if($price)
		{
			$arr['msg'] = 1;
			$arr['price'] = $price;
			$arr['amount'] = $price * $num;
			$arr['unit'] = $unit;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function orderAction()
	{
		$user = $this->getUser();
		$goodsid = $this->getParam('goodsid');
		if(!$user['uid'])
		{
			$arr['msg'] = -1;
		}
		else
		{
			$attrid = $this->getParam('attrid');
			$num = $this->getParam('num');
			$price = C::M('goodspec')->getPriceByGoodsId($goodsid, $attrid);
			$score = C::M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'score');
			$attrname = C::M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'attrname');
			$goodsname = C::M('goods')->getOne('goodsname', array(array('id', $goodsid)));
			$ordersn = Core_Fun::getOrdersn('ht');
			
			$data = array(
				'ordersn' => $ordersn,
				'goodsid' => $goodsid,
				'goodsname' => $goodsname,
				'uid' => $user['uid'],
				'attrid' => $attrid,
				'attrname' => $attrname,
				'price' => $price,
				'goodsnum' => $num,
				'amount' => $price * $num,
				'score' => $score,
				'state' => 1,
				'addtime' => Core_Fun::time()
			);
			if(C::M('order')->addOrder($data))
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
	
	public function getnumAction()
	{
		$user = $this->getUser();
		$num = C::M('order')->getCount(array(array('uid', $user['uid']), array('state', 1)));
		echo Core_Fun::array2json(array('num' => $num)); 
	}
	
	public function catAction()
	{
		$catid = $this->getParam('catid');
		$categories = C::M('category')->getCategoryList($catid, 2);
		$html = '';
		foreach($categories AS $cat)
		{
			$html .= '<li><a href="' . Core_Fun::getPathroot() . 'wap/goods/index/catid/' . $cat['id'] . '">' . $cat['catname'] . '</a></li>';
		}
		echo $html;
	}
}