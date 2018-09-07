<?php /* vpcvcms compiled created on 2018-09-03 10:19:38
         compiled from public/header.tpl */ ?>
    <div class="header">
        <div class="wp">
            <div class="logo" style="margin-right: 30px;"><a href="/"><img src="/resource/images/logo.png" alt=""></a></div>
            <ul class="nav">
                <li <?php if ($this->_tpl_vars['ns'] == ''): ?>class="on"<?php endif; ?>><a href="/">首页</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'swim'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=swim&v=index">免费游</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'star'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=star">达人邦</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'tv'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=tv">达人视频</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'ryt'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=ryt">达人游记</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'journey'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=journey">独家旅行</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'scenery'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=scenery">游画</a></li>
                <li <?php if ($this->_tpl_vars['ns'] == 'mxp'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=mxp">玩转明信片</a></li>
            </ul>
            <div class="hdr">
                <?php if ($this->_tpl_vars['user']): ?>
                <div class="user">
                    <div class="pic"><a href="/index.php?m=index&c=user&v=index"><img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" id="headavatarpic" style="border-radius: 50%;vertical-align: baseline;height: 100%;width: 100%;"></a></div>
                    <dl>
                        <dd><a href="/index.php?m=index&c=user&v=addtravel">发布游记</a></dd>
                        <dd><a href="/index.php?m=index&c=user&v=addtv">发布旅拍TV</a></dd>
                        <dd><a href="/index.php?m=index&c=user&v=follow">我的关注</a></dd>
                        <dd><a href="/index.php?m=index&c=user&v=msg">我的私信</a></dd>
                        <dd><a href="/index.php?m=index&c=user&v=fans">我的粉丝</a></dd>
                        <dd><a href="/index.php?m=index&c=user&v=setting">设置</a></dd>
                        <dd><a href="javascript:void(0)" onclick="logout()">退出</a></dd>
                    </dl>
                </div>
                <?php if ($this->_tpl_vars['weidu'] > 0): ?>
                <div class="tx">
                    <span class="lf">私信</span>
                    <span class="rg weidu">!</span>
                </div>
                <script type="text/javascript">
                    $('.tx').click(function(){
                        window.location.href="/index.php?m=index&c=user&v=msg";
                    })
                </script>
                <?php endif; ?>
                <?php else: ?>
                <div class="left">
                    <a href="/index.php?m=index&c=index&v=weibologin" style="background-image: url(/resource/images/icon2-qm.png);"></a>
                    <a href="/index.php?m=index&c=index&v=qqlogin" style="background-image: url(/resource/images/icon3-qm.png);"></a>
                    <a href="/index.php?m=index&c=index&v=weixinlogin" style="background-image: url(/resource/images/icon4-qm.png);"></a>
                </div>
                <div class="right">
                    <a href="/index.php?m=index&c=index&v=login">登录</a> |
                    <a href="/index.php?m=index&c=index&v=reg">注册</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function logout()
        {
            //退出畅言
            var img = new Image();
            img.src='http://changyan.sohu.com/api/2/logout?client_id=cytIKVFKm';
            window.location.href="/index.php?m=index&c=user&v=logout";
        }
    </script>