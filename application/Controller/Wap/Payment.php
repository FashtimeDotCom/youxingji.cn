<?php
/**
 * vpcvcms
 * 手机首页
 */
class Controller_Wap_Payment extends Core_Controller_WapAction
{
	private $_cUser;
	public function preDispatch() 
	{
        parent::preDispatch();
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login', 0);
		$this->_cUser = $user;
	}
    public function indexAction()
    {
		$_search = array(
			array('uid', $this->_cUser['uid'])
		);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('record')->getCount($_search);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = '/wap/payment/index';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$records = C::M('record')->queryAll($_search, $_orderby, array($perpage, $perpage * ($curpage - 1)));

        $this->assign ('multipage', $multipage);
		$this->assign('records', $records);
		$this->display('wap/payment.tpl');
    }
	
	public function rechargeAction()
	{
		$this->display('wap/recharge.tpl');
	}
	
	public function doneAction()
	{
		require_once(ROOT . "alipay/alipay.config.php");
		require_once(ROOT . "alipay/lib/alipay_submit.class.php");
		$amount = $this->getParam('amount');
		if(empty($amount))
			$this->showmsg('请输入充值金额', 'payment/recharge');
		$ordersn = Core_Fun::getOrdersn('RE');
		
		$data = array(
			'uid' => $this->_cUser['uid'],
			'type' => '充值',
			'ordersn' => $ordersn,
			'money' => $amount,
			'status' => 0,
			'log' => '充值' . $amount . '元',
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

		$out_trade_no = $ordersn;
		//订单名称
		$subject = $ordersn;
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
	
	public function withAction()
	{
		$this->display('wap/with.tpl');
	}
	
	public function cashoutAction()
	{
		$honor = C::M('User_Member')->getInfoByUid('honor', $this->_cUser['uid']);
		$amount = $this->getParam('amount');
		if($amount > $honor)
			$this->showmsg('提现的本金必须小于本金总数', 'payment/with');
		
		$data = array(
			'uid' => $this->_cUser['uid'],
			'accountid' => 0,
			'cashsn' => Core_Fun::getOrdersn('TX'),
			'money' => $amount,
			'type' => '提现',
			'state' => 0,
			'log' => '',
			'addtime' => Core_Fun::time()
		);
		if(C::M('User_Cash')->addCash($data))
		{
			$this->showmsg('提现申请成功，请等待处理', 'payment/with');
		}
		else
		{
			$this->showmsg('提现申请失败', 'payment/with');
		}
	}
	
	public function outAction()
    {
		$_search = array(
			array('uid', $this->_cUser['uid'])
		);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('User_Cash')->getCashCountByWhere($_search);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/payment/out' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$logs = C::M('User_Cash')->getCashList($_search, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		
        $this->assign ('multipage', $multipage);
		$this->assign('logs', $logs);
		$this->display('wap/out.tpl');
    }
}