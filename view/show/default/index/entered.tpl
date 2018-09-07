<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$res.title}}报名表_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        <div class="ban s4" style="background-image: url({{$res.banner}});"></div>
        <div class="m-form1-hlg">
            <div class="wp">
                <h4 class="m-tit-lb1">{{$res.title}}报名表</h4>
                <div>
                    <div class="d1">
                        <div class="txt">
                            <h3>一、申请说明</h3>
                            {{$res.instructions}}
                        </div>
                        <div class="item i1">
                            <span class="name">姓名<em>*</em></span>
                            <input class="inp" id="name" type="text" />
                        </div>
                        <div class="item">
                            <span class="name">出生日期<em>*</em></span>
                            <input class="inp" id="birthday" type="text" />
                        </div>
                        <div class="item i1">
                            <span class="name">性别<em>*</em></span>
                            <div class="inp" role="radio">
                                <label>
                                    <span>男</span>
                                    <input type="radio" value="男" id="sex" name="gender"/>
                                </label>
                                <label>
                                    <span>女</span>
                                    <input type="radio" value="女" id="sex" name="gender"/>
                                </label>
                            </div>
                        </div>
                        <div class="item">
                            <span class="name">微信号<em>*</em></span>
                            <input class="inp" type="text" id="wechat"/>
                        </div>
                        <div class="item i1">
                            <span class="name">手机<em>*</em><i>（这是我们与你联系的重要方式，请填写常用手机号）</i></span>
                            <input class="inp" type="text" id="phone"/>
                        </div>
                        <div class="item">
                            <span class="name">邮箱<em>*</em><i>（活动通知主要通过邮箱发送，请仔细核对）</i></span>
                            <input class="inp" type="text" id="email"/>
                        </div>
                        <div class="item i1">
                            <span class="name">学校<em>*</em><i>（请填写完整学校名称，例：北京大学如填写“北大”，将视为不符合要求）</i></span>
                            <input class="inp" type="text" id="school"/>
                        </div>
                        <div class="item">
                            <span class="name">是否已经办理护照<em>*</em></span>
                            <div class="inp" role="radio">
                                <label>
                                    <span>是</span>
                                    <input type="radio" id="y" value="是" name="inp1"/>
                                </label>
                                <label>
                                    <span>否</span>
                                    <input type="radio" id="y" value="否" name="inp1"/>
                                </label>
                            </div>
                        </div>
                        <div class="item">
                            <span class="name">英语等级水平<em>*</em></span>
                            <input class="inp" type="text" id="englishlevel"/>
                        </div>
                        <div class="item i2">
                            <span class="name">大概阐述在校活动经历<em>*</em><i>（请罗列具体活动阐述，这是你能力的重要体现哦）</i></span>
                            <textarea name="" id="activitiesthrough"></textarea>
                        </div>
                        <div class="item i2">
                            <span class="name">是否有过旅行经历<em>*</em><i>（有的话，请说明目的地及旅行感受）</i></span>
                            <textarea name="" id="travelexperiences"></textarea>
                        </div>
                        <div class="item i2">
                            <span class="name">请大致说明你会如何在本次旅行过程中推广游行迹品牌形象</span>
                            <textarea name="" id="note"></textarea>
                        </div>
                        <div class="item i3">
                            <span class="name">如何了解到该招募信息<em>*</em></span>
                            <div role="radio">
                                <label>
                                    <span>游行迹官网</span>
                                    <input type="radio" name="inp2" id="source" value="游行迹官网"/>
                                </label>
                                <label>
                                    <span>游行迹公众号</span>
                                    <input type="radio"  name="inp2" id="source" value="游行迹公众号"/>
                                </label>
                                <label>
                                    <span>其他公众号</span>
                                    <input type="radio"  name="inp2" id="source" value="其他公众号"/>
                                </label>
                                <label>
                                    <span>朋友圈转发</span>
                                    <input type="radio"  name="inp2" id="source" value="朋友圈转发"/>
                                </label>
                                <label>
                                    <span>朋友介绍</span>
                                    <input type="radio"  name="inp2" id="source" value="朋友介绍"/>
                                </label>
                                <label>
                                    <span>微博</span>
                                    <input type="radio"  name="inp2" id="source" value="微博"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d1">
                        <div class="txt t1">
                            <h3>二、项目参与流程</h3>
                            <p>Step1　填写提交游行迹“达人种子招募令”报名表</p>
                            <p>Step2　在7*24小时内查收预报名审核结果邮件</p>
                            <p>Step3　若报名审核通过，项目专员小游会添加您的微信沟通项目细节内容；请务必通过好友认证，在24小时内如未通过，将取消免费旅行资格</p>
                            <p>Step4　请制定旅行路线，并提供护照、英语等级等相关证明</p>
                            <p>Step5　请在48小时内查收最终审核邮件</p>
                            <p>Step6　审核通过即可获取旅行资格</p>
                        </div>
                        <div class="item">
                            <label role="checkbox">
                            <span>我已确认游行迹“达人种子招募令”项目参与流程</span>
                            <input type="checkbox" checked="checked" id="confirm" value="1"/>
                        </label>
                        </div>
                    </div>
                    <div class="d1">
                        <div class="txt">
                            <h3>三、隐私保护</h3>
                            <p>游行迹高度重视并保护所有用户的个人隐私权，我们将以绝对的负责、专业的态度来尊重和对待所有用户信息，提交报名表即表示同意以上协议</p>
                            <p><em>*</em>本活动最终解释权归游行迹所有</p>
                        </div>
                        <input class="submit" type="submit" value="提交报名表" />
                    </div>
                </div>
                <div class="txt explain">
                    <p>提交报名表后的72小时内，我们将会给您发送报名通知函邮件，请您及时查看您的邮箱。</p>
                    <p>请确认我们的联系方式，以便与我们及时取得联系：</p>
                    <p>电话：400-965-7018 18028669548</p>
                    <p>邮箱：youxingji@sina.cn</p>
                </div>
            </div>
        </div>
    </div>
  	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    {{include file='public/footer.tpl'}}
  	<script>
  		$('.submit').click(function(){
        	var name = $('#name').val();
          	var sex = $('#sex:checked ').val();
          	var phone = $('#phone').val();
          	var school = $('#school').val();
          	var englishlevel = $('#englishlevel').val();
          	var birthday = $('#birthday').val();
          	var wechat = $('#wechat').val();
          	var email = $('#email').val();
          	var y = $('#y:checked ').val();
          	var activitiesthrough = $('#activitiesthrough').val();
          	var travelexperiences = $('#travelexperiences').val();
          	var note = $('#note').val();
          	var source = $('#source:checked ').val();
          	var confirm = $('#confirm:checked ').val();
          	if(!name){
                layer.msg('请输入姓名');
                return false;
            }
          	if(!sex){
                layer.msg('请选中性别');
                return false;
            }
          	if(!phone){
                layer.msg('请输入手机号');
                return false;
            }
          	if(!school){
                layer.msg('请输入学校');
                return false;
            }
          	if(!englishlevel){
                layer.msg('请输入英语水平');
                return false;
            }
          	if(!birthday){
                layer.msg('请输入出生日期');
                return false;
            }
          	if(!wechat){
                layer.msg('请输入微信号');
                return false;
            }
          	if(!email){
                layer.msg('请输入邮箱');
                return false;
            }
          	if(!y){
                layer.msg('请选择是否已经办理护照');
                return false;
            }
          	if(!activitiesthrough){
                layer.msg('请大概阐述在校活动经历');
                return false;
            }
          	if(!travelexperiences){
                layer.msg('是否有过旅行经历');
                return false;
            }
          	if(!note){
                layer.msg('请大致说明你会如何在本次旅行过程中推广游行迹品牌形象');
                return false;
            }
          	if(!source){
                layer.msg('请选择了解途径');
                return false;
            }
          	if(!confirm){
                layer.msg('请确认项目参与流程 ');
                return false;
            }
          	$.post("/index.php?m=api&c=index&v=entered", {
                'id':{{$res.id}},
                'name':name,
               	'sex':sex,
                'phone':phone,
               	'school':school,
               	'englishlevel':englishlevel,
                'birthday':birthday,
                'wechat':wechat,
                'email':email,
                'y':y,
                'activitiesthrough':activitiesthrough,
                'travelexperiences':travelexperiences,
                'note':note,
                'source':source
            }, function(data){
              	 layer.msg(data.tips);
                if(data.status == 1){
                    window.location.href = window.location.href;
                }
            },"JSON");
        });
  	</script>
</body>

</html>