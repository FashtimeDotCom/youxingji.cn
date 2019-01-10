<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的订单</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/my_order.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz">
				<div class="wp">
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的旅行日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li class="on"><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
					</ul>
				</div>
			</div>
			<div class="wp">
				{{include file='user/left.tpl'}}
				<div class="col-r">
					<!--二级导航-->
					<div class="m_mine_sz">
						<div class="secondaryMenu fix">
							<a class="option on" href="/index.php?m=index&c=user&v=my_order&type=1">全部订单</a>
							<a class="option" href="/index.php?m=index&c=user&v=my_order&type=2">待支付</a>
							<a class="option" href="/index.php?m=index&c=user&v=my_order&type=3">待出行</a>
							<a class="option" href="/index.php?m=index&c=user&v=my_order&type=4">取消/退款</a>
							<div class="hunt">
								<input type="text" name="" id="" value="" placeholder="查看我的订单" />
								<a class="verify" href="javascript:;"></a>
							</div>
						</div>
						<p class="title">订单信息<img class="direction left1" src="/resource/images/pay/icon_direction.png" /></p>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="collect" value="faq_num" data-type="4" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="faq_num" title="总数" value="{{$total.faq_num}}"/>
					<div class="content">
						
						<div class="commonality issue">
							<ul class="ul_box">
								<li class="item_{{$vo.t_id}}">
									<div class="boxTop fix">
										<div class="orderNumber">订单号：<span id="orderNumber">2531546546546546546</span></div>
										<div class="DepartureDate">出发日期</div>
										<div class="paymentAmount">支付金额</div>
										<div class="orderStatus">订单状态</div>
										<div class="operation">操作</div>
									</div>
									<div class="boxBottom fix">
										<div class="orderiofn">
											<a class="dis_block" href="javascript:;">
												<span class="figure preview" style="background-image: url(/resource/images/img-lb4.jpg);"></span>
												<div class="rightSection">
													<p class="title omit lineNumber2 whiteSpace">国庆预售-纯玩无购物，长沙直飞越南芽庄5天4晚/6天5晚/7天6晚，仅售4999，限时优惠，时不再来，赶紧约上家人好友预定吧！</p>
													<p class="orderTime">下单时间：<span id="orderTime">2018-09-11 18:51:54</span></p>
												</div>
											</a>
										</div>
										<div class="DepartureDate">2018-09-20</div>
										<div class="paymentAmount">￥<span id="paymentAmount">4499</span></div>
										<div class="orderStatus">已关闭</div>
										<div class="operation">
											<a class="carte delete" onclick="delete(this,id)" href="javascript:;">删除订单</a>
											<a class="carte dis_none" href="javascript:;">查看订单</a>
											<a class="carte" onclick="againReserve(this,id)" href="javascript:;">重新预定</a>
										</div>
									</div>
								</li>
								<li class="item_{{$vo.t_id}}">
									<div class="boxTop fix">
										<div class="orderNumber">订单号：<span id="orderNumber">2531546546546546546</span></div>
										<div class="DepartureDate">出发日期</div>
										<div class="paymentAmount">支付金额</div>
										<div class="orderStatus">订单状态</div>
										<div class="operation">操作</div>
									</div>
									<div class="boxBottom fix">
										<div class="orderiofn">
											<a class="dis_block" href="javascript:;">
												<span class="figure preview" style="background-image: url(/resource/images/img-lb4.jpg);"></span>
												<div class="rightSection">
													<p class="title omit lineNumber2 whiteSpace">国庆预售-纯玩无购物，长沙直飞越南芽庄5天4晚/6天5晚/7天6晚，仅售4999，限时优惠，时不再来，赶紧约上家人好友预定吧！</p>
													<p class="orderTime">下单时间：<span id="orderTime">2018-09-11 18:51:54</span></p>
												</div>
											</a>
										</div>
										<div class="DepartureDate">2018-09-20</div>
										<div class="paymentAmount">￥<span id="paymentAmount">4499</span></div>
										<div class="orderStatus">已退款</div>
										<div class="operation">
											<a class="carte delete" onclick="delete(this,id)" href="javascript:;">删除订单</a>
											<a class="carte dis_none" href="javascript:;">查看订单</a>
											<a class="carte" onclick="againReserve(this,id)" href="javascript:;">重新预定</a>
										</div>
									</div>
								</li>
								<li class="item_{{$vo.t_id}}">
									<div class="boxTop fix">
										<div class="orderNumber">订单号：<span id="orderNumber">2531546546546546546</span></div>
										<div class="DepartureDate">出发日期</div>
										<div class="paymentAmount">支付金额</div>
										<div class="orderStatus">订单状态</div>
										<div class="operation">操作</div>
									</div>
									<div class="boxBottom fix">
										<div class="orderiofn">
											<a class="dis_block" href="javascript:;">
												<span class="figure preview" style="background-image: url(/resource/images/img-lb4.jpg);"></span>
												<div class="rightSection">
													<p class="title omit lineNumber2 whiteSpace">国庆预售-纯玩无购物，长沙直飞越南芽庄5天4晚/6天5晚/7天6晚，仅售4999，限时优惠，时不再来，赶紧约上家人好友预定吧！</p>
													<p class="orderTime">下单时间：<span id="orderTime">2018-09-11 18:51:54</span></p>
												</div>
											</a>
										</div>
										<div class="DepartureDate">2018-09-20</div>
										<div class="paymentAmount">￥<span id="paymentAmount">4499</span></div>
										<div class="orderStatus">已完成</div>
										<div class="operation">
											<a class="carte delete" onclick="delete(this,id)" href="javascript:;">删除订单</a>
											<a class="carte dis_none" href="javascript:;">查看订单</a>
											<a class="carte" onclick="againReserve(this,id)" href="javascript:;">重新预定</a>
										</div>
									</div>
								</li>
								<li class="item_{{$vo.t_id}}">
									<div class="boxTop fix">
										<div class="orderNumber">订单号：<span id="orderNumber">2531546546546546546</span></div>
										<div class="DepartureDate">出发日期</div>
										<div class="paymentAmount">支付金额</div>
										<div class="orderStatus">订单状态</div>
										<div class="operation">操作</div>
									</div>
									<div class="boxBottom fix">
										<div class="orderiofn">
											<a class="dis_block" href="javascript:;">
												<span class="figure preview" style="background-image: url(/resource/images/img-lb4.jpg);"></span>
												<div class="rightSection">
													<p class="title omit lineNumber2 whiteSpace">国庆预售-纯玩无购物，长沙直飞越南芽庄5天4晚/6天5晚/7天6晚，仅售4999，限时优惠，时不再来，赶紧约上家人好友预定吧！</p>
													<p class="orderTime">下单时间：<span id="orderTime">2018-09-11 18:51:54</span></p>
												</div>
											</a>
										</div>
										<div class="DepartureDate">2018-09-20</div>
										<div class="paymentAmount">￥<span id="paymentAmount">4499</span></div>
										<div class="orderStatus">超时未支付</div>
										<div class="operation">
											<a class="carte delete" onclick="delete(this,id)" href="javascript:;">删除订单</a>
											<a class="carte dis_none" href="javascript:;">查看订单</a>
											<a class="carte" onclick="againReserve(this,id)" href="javascript:;">重新预定</a>
										</div>
									</div>
								</li>
							</ul>
							
							<!-- 页码 -->
							{{if $multipage}}
							<div class="pages">
								<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
								<ul>{{foreach from=$multipage item=page}}
									<li {{if $page.2}}class="{{$page.2}}" {{/if}}>
										<a href="{{$page.1}}">{{$page.0}}</a>
									</li>
									{{/foreach}}
									<li class="pages-form">
										到<input class="inp" type="text" id="pages" onkeyup="judgeIsNonNull2(event)" />页
										<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
									</li>
								</ul>
							</div>
							{{/if}}
							<!-- 页码 end-->
						</div>
						
						<!--无信息-->
						<div class="mainTips fix dis_none">
							<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_bg.png);" title="海报/封面"></div>
							<div class="tip"><p class="title">你还没有下过任何订单哦！<br />快去查看旅行线路吧！</p></div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<script src="/resource/js/skip.js" title="页码跳转"></script>
    <script src="/resource/js/pulldownscroll.js" title="右侧下拉菜单"></script>
</body>
</html>