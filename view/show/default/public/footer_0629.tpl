<style>
    .wechat{
        width: 150px;
        height:150px;
        display: inline-block;
        position: absolute;
        margin-top: 10px;
        display: none;
    }
</style>
<div class="footer">
        <div class="fd-top">
            <div class="wp">
                <div class="top">
                    <div class="tel">
                        <h3>客服热线</h3>
                        <span><i style="background-image: url(/resource/images/tel-qm.png);"></i>4009-657-018</span>
                    </div>
                    <div class="fd-nav">
                        <dl>
                            <dt>关于游行迹</dt>
                            <dd><a href="/article/gywm">关于我们</a></dd>
                            <dd><a href="/article/jrwm">加入我们</a></dd>
                            <dd><a href="/article/yszc">隐私政策</a></dd>
                        </dl>
                        <dl>
                            <dt>关注我们</dt>
                            <dd><a href="https://weibo.com/u/5994217808?topnav=1&wvr=6&topsug=1"><i style="background-image: url(/resource/images/icon5-qm.png);"></i>微博</a></dd>
                            <dd><a id="wechat_a" href="javascript:;"><i style="background-image: url(/resource/images/icon6-qm.png);"></i>微信
                              	<br>
                                    <img src="/uploadfile/image/20180425/152461868538049.jpg" alt="" class="wechat">
                              </a></dd>
                        </dl>
                        <dl>  
                            <dt>实用信息 </dt>
                            <dd><a href="/article/hyzn">服务协议</a></dd>
                            <dd><a href="/article/lxgl">旅行攻略</a></dd>
                            <dd><a href="/article/lyxl">旅游路线</a></dd>
                        </dl>
                    </div>
                    <div class="fd-ma">
                      	{{vplist from='ad' item='adlist' tagname='footerewm'}}
                      	<div class="ma">
                            <div class="pic"><img src="{{$adlist.imgurl}}" alt=""></div>
                            <span>{{$adlist.adname}}</span>
                        </div>
                        {{/vplist}}
                    </div>
                </div>
                <!--<div class="bot">
                    <span>合作伙伴：</span>
                    {{vplist from='link' item='link'}}
                        <a href="{{$link.link}}" target="_blank">{{$link.name}}</a>
                    {{/vplist}}
                </div>-->

            </div>
        </div>
        <div class="fd-bot">
            <div class="wp">
                <div class="fd-logo"><a href=""><img src="/resource/images/fd-logo.png" alt=""></a></div>
                <div class="addr">
                	<p>广州游行迹新媒体科技有限公司<a href="http://www.miitbeian.gov.cn">&copy;粤ICP备16091699号-1</a></p>
                    <p>地址：广州市越秀区东风东路754号侨房大厦7楼702</p>
                    <p><em>*</em>本网站部分图片来自网络，若作者看到，请尽快与游行迹联系</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 返回顶部 -->
    <div class="m-float-qm">
        <a href="javascript:;" class="tel">
        <img src="/resource/images/icon24-qm.png" alt="">
        <div class="boximg">
            <img src="/resource/images/tel.png" alt="">
        </div>
    </a>
        <a href="javascript:;" class="ma">
        <img src="/resource/images/icon25-qm.png" alt="">
        <div class="boximg">
            <img src="{{TO->cfg key="site_weixin" group="site" default=""}}" alt="">
        </div>
    </a>
        <a href="javascript:;" class="return g-top"><img src="/resource/images/icon26-qm.png" alt=""></a>
    </div>
    <!-- 返回顶部 end-->
    <script>
      //tz
      function href(url)
      {
        window.open(url);
      }
      
      $(function () {
          $("#wechat_a").hover(function () {
              $(".wechat").show();
          },function () {
              $(".wechat").hide();
          });
      })
    </script>



