<!-- 头部 -->
<header>
	<div class="block clearfix">
		<div id="logo"></div>
		<ul id="menu">
			<li><a href="/">主页</a></li>
			{{vplist from='channel' item='channel'}}
			<li><a href="{{$channel.url}}">{{$channel.name}}</a></li>
			{{/vplist}}
		</ul>
		<div class="search">
			<form action="/index/index/search" method="post">
				<input type="text" class="input" name="keyword" value="{{$keyword}}" />
				<button class="submit"><i class="icon-search"></i></button>
			</form>
		</div>
	</div>
</header>
<script type="text/javascript">
$(function(){
	$('#menu li').each(function(i, el){
		var href = window.location.href;
		if(href == $(el).find('a').attr('href')){
			$(el).find('a').removeClass('menuactive');
			$(el).find('a').addClass('menuactive');
		}
	});
});
</script>
<!-- 头部 END -->