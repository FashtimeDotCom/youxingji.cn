<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>问题详情_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{$article.title}}" />
    <meta name="keywords" content="{{$article.title}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/commentfaq.css" />
    <link rel="stylesheet" href="/resource/css/response_list.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
	    {{vplist from='ad' item='adlist' tagname='pc_question_list'}}
	    <div class="ban" style="background-image: url({{$adlist.imgurl}});"></div>
	    {{/vplist}}
	    
	    <div class="wp fix" style="padding-top: 34px;">
        	<!--左侧正文-->
        	<div class="col_l">

            	<div class="issueSearch fix">
            		<input type="text" class="searchVal" id="search" maxlength="250" value="" onkeyup="judgeIsNonNull1(event)" placeholder="提问前请先搜索，看看你的问题其他用户是否已经提问" />
            		<input type="button" name="确认按钮" class="searchAffirm" id="searchAffirm" onclick="searchAffirm()" />
            	</div>


            	<!--问题-->
        		<div class="trouble fix">
        			<div class="labelList">
						{{foreach from=$faq_detail.label item=item key=key}}
							<em class="label">{{$item}}</em>
						{{/foreach}}
        				<p class="right"><span><i class="Iclass">{{$faq_detail.show_num}}</i>浏览</span>&nbsp;|&nbsp;<span><i class="Iclass">{{$faq_detail.response_num}}</i>回答</span></p>
        			</div>
            		<p class="issue whiteSpace">{{$faq_detail.title}}</p>
                	<div class="box fix">
                    	<p class="describe whiteSpace">{{$faq_detail.desc}}</p>
                		<img class="illustration" src="{{$faq_detail.thumbfile}}" />
                	</div>
                    <div class="bottom">
                    	<div class="left">
                    		<a href="javascript:;" class="button respond">回答问题</a>
                    		<a href="javascript:;" class="button collect" onclick="collect({{$faq_detail.id}})">收藏问题</a>
                    	</div>
                    	<div class="right">
                    		<span class="figure headPortrait" style="background-image: url({{$faq_detail.headpic}});"></span>&nbsp;&nbsp;
	                		<span class="name">{{$faq_detail.username}}</span>&nbsp;提问于·{{$faq_detail.addtime}}
                    	</div>
                    </div>
                </div>

				<!--回答 列表-->
                <div class="bigBox" data-index="1">
					<!--有回答-->
					<input type="hidden" name="uid" id="uid" data-type="4" value="" />
					<input type="hidden" name="faq_num" id="faq_num" title="回答的总数" value="{{$total}}" />
					<input type="hidden" id="from_url" value="{{$from_url}}" title="登录完之后跳转回这个本来的游记" />
					<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="{{$faq_detail.id}}" data-length="38" value="faq_num" data-uid="{{$faq_detail.uid}}" data-type="4" title="共用JS区分的唯一必须值"/>

					{{if $response_list}}
					<div class="box boxList">
						{{foreach from=$response_list item=vo key=k}}
						<div class="modules fix" id="modules{{$vo.id}}">
							<div class="writer">
								<div class="left">
									<div class="figure headPortrait" style="background-image: url({{$vo.headpic}});"></div>
									<span class="name">{{$vo.realname}}</span>
									<span class="time">{{$vo.addtime}}</span>
								</div>
								<a href="javascript:;" class="dianzan" onclick="zan(this,{{$vo.id}})" data-nature="subject">
									<em></em>&nbsp;<i class="Iclass">{{$vo.top_num}}</i>
								</a>
							</div>
							<div class="detailss whiteSpace" title="回答的内容">{{$vo.content}}</div>
							<p class="readSwitch dis_none">
								<a href="javascript:;" data-switch="{{$k}}">
									<i class="Iclass">展开全文阅读</i><img class="icon icon1" src="/resource/m/images/user/8.png" />
								</a>
							</p>

							<!--无评论-->
							<p class="AddComment fix">
								<a href="javascript:;" data-switch="0">
									<!--无评论-->
									<!--<img class="icon_1" src="/resource/images/common/icon_review1.png"/>添加评论<img class="icon_2" src="/resource/images/icon15-qm.png" />-->

									<!--有评论-->
									<img class="icon_1" src="/resource/images/common/icon_review1.png"/><i class="Iclass" >{{$vo.comment_num}}</i>添加评论
								</a>
							</p>

							<!--有评论或者  生成新评论-->
							<div class="m_comment">
								<em class="location"></em>
								<!--评论列表-->
								<input type="hidden" id="" value="{{$multipage.page}}" title="评论的总页数" />
								<div class="box fix" data-page="1">
									<ul class="ul_imgtxt4 fix" id="receptacle">
										{{foreach from=$vo['comment_list'] item=vo key=k}}
											<li>
											<div class="details">
												<a class="headPortrait" href="{{$vo.uid|helper:'mhref'}}" style="background-image: url({{$vo.uid|helper:'avatar'}});" target="_blank"></a>
												<h3><a class="username_" href="{{$vo.uid|helper:'mhref'}}">{{$vo.uid|helper:'username'}}</a>
													<em class="addtime">{{$vo.addtime}}</em>
													<span class="zan" onclick="zan(this,{{$vo.id}})" data-nature="review">
							                    		<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>
							                    		<i>{{$vo.top_num}}</i>
							                    	</span>
												</h3>
											</div>
											<div class="substance" data-replyNum="{{$vo.count}}">
												<div class="description">{{$vo.content}}parents(".m_comment")parents(".m_comment")</div>
												<div class="BarSubmenu">
													<span class="reply replyReview" data-id="{{$vo.id}}" data-open="0" data-class="1">回复</span>
												</div>

												<!--回复【评论】框-->
												<div class="m_publish details_stair" data-tid="{{$vo.id}}">
													<div class="wp">
														<div class="content">
															<textarea id="comment{{$vo.id}}" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>
															{{if !$user}}
															<div class="nologin">
																<div class="nologinbtn">
																	<a class="from_url" href="javascript:;">登录</a>
																	<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
																</div>
															</div>
															{{/if}}
														</div>
														<div class="bottomArea fix">
															<span class="wordLimit"><i class="Iclass">0</i>/600字</span>
															<span class="btn addReview ReviewComment" data-touid="{{$vo.uid}}" data-id="{{$vo.id}}" data-class="1" data-name="">发表回复</span>
														</div>
													</div>
												</div>

												<!--所有回复-->
												<div class="blockquote_wrap" data-i="{{$k+1}}" data-count="{{$vo.count}}"></div>

												<a class="seeMore hint" href="javascript:;" onclick="seeMore(this)">
													<span class="colorTips name">昵称为什么不可用</span> 等人 <span class="colorTips name">共<i class="Iclass">{{$vo.count}}1</i>条回复</span>
												</a>
											</div>
										</li>
										{{/foreach}}
									</ul>
									<p class="tips"></p>
								</div>

								<!-- 页码 -->
								<div class="pagination">
									{{if $multipage}}
									<div class="pages">
										<ul>
											{{foreach from=$multipage item=page}}
											<li {{if $page.2}}class="{{$page.2}}"{{/if}}><a class="pageTurning" href="javascript:;" data-href="{{$page.1}}">{{$page.0}}</a></li>
											{{/foreach}}
											<li class="pages-form">
												到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
												<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
											</li>
										</ul>
									</div>
									{{/if}}
								</div>
								<!-- 页码 end-->

								<!--评论框-->
								<div class="m_publish original">
									<div class="wp">
										<div class="content">
											<textarea id="" placeholder="" onkeyup="judgecomment(this)"></textarea>
											{{if !$user}}
											<div class="nologin">
												<div class="nologinbtn">
													<a class="from_url" href="javascript:;">登录</a>
													<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
												</div>
											</div>
											{{/if}}
										</div>
										<div class="bottomArea fix">
											<span class="wordLimit"><i class="Iclass">0</i>/600字</span>
											<span class="btn addComment" data-pid="{{$vo.id}}">回复</span>
										</div>
									</div>
								</div>

							</div>
						</div>
						{{/foreach}}
					</div>

					{{else}}
					<!--暂无回答-->
					<div class="NoAnswer">
						<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
						<p class="tipsButtom">这个问题还没有人回答哦！赶紧来抢沙发吧！</p>
					</div>
					{{/if}}
                	<!-- 页码 -->
					<div class="pagination">
						{{if $multipage}}
						<div class="pages">
							<div class="amount">共<i class="Iclass">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
							<ul>
								{{foreach from=$multipage item=page}}
									<li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
								{{/foreach}}
								<li class="pages-form">
									到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
									<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
								</li>
							</ul>
						</div>
						{{/if}}
					</div>
					<!-- 页码 end-->
					
					<!--我要回答-->
					<input type="hidden" name="" id="faq_id" value="{{$faq_id}}" />
					<div class="IWillAnswer fix" id="IWillAnswer">
						<div class="roof fix">
							<div class="figure headPortrait" style="background-image: url(/resource/images/img-lb9.jpg);"></div>
				            <span class="name">雷姆</span>
						</div>
							
			            <p style="margin: 20px 0;"><textarea id="demo" style="display: none;"></textarea></p>
						<div class="buttonVessel fix"><a class="response" id="response" data-type="content" href="javascript:;">回答</a></div>
					</div>
               </div>
            </div>
				
            
            <!--右侧推荐-->
            <div class="col_r">
				<a href="index.php?m=index&c=user&v=set_question"><p class="quizButton" id="skip" data-id="{{$faq_info.id}}"><i class="Iclass">+</i>&nbsp;我要提问</p></a>
                
                <!--广告位-->
				{{vplist from='ad' item='adlist' tagname='pc_question_side'}}
				<div class="figure borderRadius playbill" style="background-image: url(/uploadfile/image/20180629/153026548528241.jpg);"></div>
				{{/vplist}}

                <!--热门标签-->
                <div class="HotTags">
                	<p class="title">相关问题</p>
                	<div class="labelList fix">
						{{foreach from=$arr_similar item=vo key=k}}
						<a href="index.php?m=index&c=faq&v=res_list&id={{$vo.id}}" class="issue omit lineNumber3 whiteSpace">{{$vo.title}}<i class="Iclass"> {{$vo.response_num}}回答</i>
						</a>
						{{/foreach}}
                	</div>
                </div>
            </div>
	    </div>
	    <div class="h81"></div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/layui.js"></script>
	<script src="/resource/js/response_list1.js"></script>
	
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
    <script>
	    function searchAffirm(){
	        var searchVal = $("#search").val();
	        if( searchVal == "" ){
	            layer.msg('请输入要搜索的内容！');
	            return false;
	        }
	        else if(searchVal.replace(/(^\s*)|(\s*$)/g, "")==""){
	            layer.msg('搜索栏不能只输入空格！');
	            return false;
	        }
			window.location = "index.php?m=index&c=faq&v=index&search="+searchVal;
	    }
	</script>
</body>
</html>