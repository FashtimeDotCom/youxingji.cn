<?php
/**
 * vpcvcms
 * 中大商圈
 */
class Controller_Wap_Trade extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
		$this->assign('curr', '中大商圈');
	}
    public function indexAction()
    {
		$where = array(array('uid', '219', '!='));
		$Num = C::M('shopgoods')->getCount($where);
		
		$perpage = 20;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/trade/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$goods = C::M('shopgoods')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($goods AS $idx => $good)
		{
			$goods[$idx]['yt'] = C::M('shopgoods')->getYtName($good['yt']);
			$goods[$idx]['gy'] = C::M('category')->getCatNameByCatId($good['gy']);
			$goods[$idx]['ml'] = C::M('category')->getCatNameByCatId($good['ml']);
			$goods[$idx]['shopname'] = C::M('shop')->getOne('shopname', array(array('id', $good['shopid'])));
			$goods[$idx]['sellnum'] = C::M('shoporder')->getSellNum($good['id']);
			$piclist = explode(',', $good['pic']);
			$pic = $piclist[0];
			$goods[$idx]['pic'] = $pic;
		}
		$this->assign('multipage', $multipage);
		$this->assign('goods', $goods);
		$this->display('wap/trade.tpl');
    }
	
	public function moreAction(){}
	
	public function showAction()
	{
		$id = $this->getParam('id');
		if(!$id)
			$this->showmsg('', 'index', 0);
		$good = C::M('shopgoods')->find($id);
		if(!$good)
			$this->showmsg('该产品不存在', 'index');
		$good['piclist'] = explode(',', $good['pic']);
		$good['firstpic'] = $good['piclist'][0];
		$good['colors'] = explode(',', $good['color']);
		$good['sizes'] = explode(',', $good['size']);
		$good['shopname'] = C::M('shop')->getOne('shopname', array(array('id', $good['shopid'])));
		$good['ytname'] = C::M('shopgoods')->getYtName($good['yt']);
		$good['gyname'] = C::M('category')->getOne('catname', array(array('id', $good['gy'])));
		$good['mlname'] = C::M('category')->getOne('catname', array(array('id', $good['ml'])));
		$good['feednum'] = C::M('shopfeed')->getCount(array(array('goodsid', $good['id'])));
		
		$this->assign('good', $good);
		$this->display('wap/trade_show.tpl');
	}
	
	public function addorderAction()
	{
		$goodsid = $this->getParam('goodsid');
		$user = $this->getUser();
		$goodsname = C::M('shopgoods')->getOne('goodsname', array(array('id', $goodsid)));
		$price = C::M('shopgoods')->getOne('price', array(array('id', $goodsid)));
		$shopid = C::M('shopgoods')->getOne('shopid', array(array('id', $goodsid)));
		$color = $this->getParam('color');
		$size = $this->getParam('size');
		$num = $this->getParam('num');
		$num = $num ? $num : 1;
		$ordersn = Core_Fun::getOrdersn('ML');
		$data = array(
			'uid' => $user['uid'],
			'ordersn' => $ordersn,
			'shopid' => $shopid,
			'goodsid' => $goodsid,
			'goodsname' => $goodsname,
			'color' => $color,
			'size' => $size,
			'num' => $num,
			'price' => $price,
			'amount' => $price * $num,
			'status' => 0,
			'addtime' => Core_Fun::time()
		);
		$orderid = C::M('shoporder')->add($data);
		if($orderid)
		{
			$arr['msg'] = 1;
			$arr['orderid'] = $orderid;
		}
		else
		{
			$arr['msg'] = 0;
			$arr['orderid'] = '';
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function getorderAction()
	{
		$user = $this->getUser();
		if(!$user['uid'])
		{
			$arr['msg'] = -1;
		}
		else
		{
			$arr['msg'] = 1;
		}
		echo Core_Fun::array2json($arr);
	}
	
	public function orderAction()
	{
		$id = $this->getParam('id');
		if(!$id)
			$this->showmsg('', 'index', 0);
		$order = C::M('shoporder')->find($id);
		$this->assign('order', $order);
		$this->display('wap/trade_order.tpl');
	}
	
	public function payAction()
	{
		require_once(ROOT . "alipay/alipay.config.php");
		require_once(ROOT . "alipay/lib/alipay_submit.class.php");
		$amount = $this->getParam('amount');
		$orderid = $this->getParam('orderid');
		$order = C::M('shoporder')->find($orderid);
		$user = $this->getUser();
		if(empty($amount))
			$this->showmsg('金额不正确', 'wap/trade/order/id/' . $orderid);
		
		$data = array(
			'uid' => $user['uid'],
			'type' => '购买',
			'ordersn' => $order['ordersn'],
			'money' => $amount,
			'status' => 0,
			'log' => '购买[' . $order['goodsname'] . ']' . $amount . '元',
			'addtime' => Core_Fun::time()
		);
		C::M('record')->add($data);
		
		$payment_type = "1";
		//服务器异步通知页面路径
		$notify_url = "http://www.bzhidao.com/wap/alipay/notifyurl";

		//页面跳转同步通知页面路径
		$return_url = "http://www.bzhidao.com/wap/alipay/returnurl";

		//卖家支付宝帐户
		$seller_email = $alipay_config['seller_email'];

		$out_trade_no = $order['ordersn'];
		//订单名称
		$subject = $order['ordersn'];
		$total_fee = $amount;

		$body = '';
		$show_url = '';
		$anti_phishing_key = "";
		$exter_invoke_ip = "";
		$parameter = array(
				"service" => "alipay.wap.create.direct.pay.by.user",
				"partner" => trim($alipay_config['partner']),
				"seller_id" => trim($alipay_config['seller_email']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"show_url"	=> $show_url,
				"body"	=> $body,
				"it_b_pay"	=> $it_b_pay,
				"extern_token"	=> '',//钱包
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}
	
	public function delAction()
	{
		$orderid = $this->getParam('id');
		if(C::M('shoporder')->remove($orderid))
		{
			$this->showmsg('订单删除成功', 'trade');
		}
		else
		{
			$this->showmsg('订单删除失败', 'trade/order/id/' . $orderid);
		}
	}
}