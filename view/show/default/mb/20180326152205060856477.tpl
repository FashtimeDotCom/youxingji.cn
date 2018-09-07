<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$res.title}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #box {
            width: 100%;
            max-width: 1200px;
            height:600px;
            position: relative;
            top:1px;

        }
        #box>div {
            position:absolute;
            left: 0;
            top:0;
            width:100%;
            height:100%;
            transform-style:preserve-3d;
        }
        #box>div>div {
            position:absolute;
            transform:preserve-3d;
        }
    </style>
</head>

<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        <div class="ban s4" style="background-image: url({{$res.banner}});"></div>
        <div class="m-inner-lb1">
            <div class="wp">
                <h4 class="m-tit-lb1">“一带一路”旅行接力路线</h4>
                <div class="map" id="box">
                    
                </div>
            </div>
        </div>
        <div class="m-inner-lb2">
            <div class="wp">
                <h4 class="m-tit-lb1">我负责出钱，你负责出发</h4>
                <div class="con">
                    <p>你想体验异国文化之旅吗？</p>
                    <p>你想为传播中国文化贡献自己的力量吗？</p>
                    <p>你想为自己增添一段意义非凡的经历吗？</p>
                </div>
                <div class="con">
                    <p>这是一个真实认识与了解“一带一路”的好机会</p>
                    <p>这是一场不仅能丰富生活阅历，还能增强你感性认识的旅行</p>
                    <p>这是一次强化自己社会责任感，提升自己能力的锻炼</p>
                    <p>这是一次为以后旅行甚至出版游记图书的难得经历</p>
                </div>
                <div class="con">
                    <p>我们从不缺少出发的理由</p>
                    <p>而缺少一颗敢于暂别平凡生活的心</p>
                    <p>如果有一种旅行，不必考虑苟且直奔远方</p>
                    <p>如果有一种青春，可以在路上肆意挥洒飞扬</p>
                    <p>如果有一次旅行机会，免费提供给你</p>
                    <p>你会心动吗？</p>
                    <h4>这次，我们希望你是旅行路上的主角</h4>
                    <h4>出发，去活出生命中每一个精彩</h4>
                </div>
            </div>
        </div>
        <div class="m-inner-lb3" style="background-image: url(/resource/images/bg-lb2.jpg);">
            <div class="wp">
                <h4 class="m-tit-lb1 lb2">什么是达人种子招募令</h4>
                <ul class="ul-txt-lb1">
                    <li>
                        <div class="items">
                            <h4>一带一路</h4>
                            <p>达人种子招募令是游行迹推出的一带一路免费体验之旅。</p >
                        </div>
                    </li>
                    <li>
                        <div class="items">
                            <h4>公益旅游 </h4>
                            <p>每一个国家旅游点，游行迹都为大学生提供免费旅游基金，开阔大学生的视野，让其更加深入地了解“一带一路”。</p >
                        </div>
                    </li>
                    <li>
						<div class="items">
                            <h4>公开招募 </h4>
                            <p>每一期“达人种子招募令”，游行迹都将通过公平、公正、公开的甄选机制，选出一位合适的达人种子。</p >
                        </div>
                    </li>
                    <li>
                        <div class="items">
                            <h4>培养达人 </h4>
                            <p>甄选出的优秀参与者都将作为游行迹的旅游达人种子来重点培养，成为游行迹达人邦的种子会员。</p >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-inner-lb3">
            <div class="wp">
                <h4 class="m-tit-lb1">“一带一路”达人种子招募令第一棒——柬埔寨</h4>
                <div class="con1">
                    <p>当一切的表情一一成为过去，最后，仿佛从污泥的池沼中升起一朵莲花，那微笑成为城市高处唯一的表情，包容<br>了爱恨，超越了生死，通过漫长</p>
                </div>
                <ul class="ul-img-lb1">
                    <li>
                        <div class="img">
                            <img src="/resource/images/daren_1.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="/resource/images/daren_2.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="/resource/images/daren_3.jpg" alt="">
                        </div>
                    </li>
                </ul>
                <div class="con2">
                    <p>这里是一个充满神秘色彩的地方，因为这里太过神秘，太适合掩藏秘密；这里是《国家地理》推荐的人生中必去的50个地方之一；这里是《孤独星球》评选的全球终极旅行地NO.1。</p>
                </div>
                <div class="con2">
                    <p>“我诅咒废墟，我又寄情废墟。”这是余秋雨写给柬埔寨的情诗。《花样年华》里，周慕云将秘密诉说给千年吴哥，秘密随着时光掩埋，往事终究被遗忘。宫崎骏的“天空之城”，据说原型就是崩密列，也是一个倾诉秘密的“基地”，拍摄《古墓丽影》时，朱莉常在酒吧街享受鸡尾酒，把所有的秘密交诸于此。 </p>
                </div>
                <div class="con2">
                    <p>柬埔寨这个国家</p>
                    <p>依靠着世界七大奇迹之一的<em>暹粒吴哥窟</em>，成为了全世界人趋之若鹜的地方</p>
                    <p>有着“东边小巴黎”之称的金边，散发着神秘独特的迷人气息，你可以去<em>金边皇宫</em>参观一番</p>
                  	<p>作为中国商务部首批中标的境外经贸合作区之一，你应该去游览<em>
                      西哈努克港</em></p >
                    <p>高棉的微笑伫立千年，印度教的文化传承在这里得到淋漓尽致的展现</p>
                    <p>雨林和庙宇，大自然和人类文明，在这里完美结合在一起</p>
                    <p>只有亲临现场，才能感受到其中的妙处</p>
                    <p>我们需要你到达柬埔寨，打卡暹粒、西哈努克、金边等定点景点，制定你的探险路线，带回详细的旅行体验和独一无二的柬埔寨探索故事。</p>
                </div>
                <div class="con3">
                    <div class="item">
                        <h4>
                            你还等什么呢？<br> 只需要动动手指，参与进来
                            <br> 就很有可能成为我们“达人种子招募令”的种子会员
                            <br> 免费体验柬埔寨的自然景观和风土人情
                            <br> 窥视吴哥、西哈努克、金边等神奇而永恒的秘密之境
                            <br> 快报名参与吧！
                        </h4>
                    </div>
                    <div class="item">
                        <p><em>阶段一：</em>达人种子报名 （2018年6月6日~6月20日）</p>
                        <p><em>阶段二：</em>达人种子选拔 （2018年6月21日~6月26日）</p>
                        <p><em>阶段三：</em>公布名单 （2018年6月29日）</p>
                        <p><em>阶段四：</em>达人种子直播 （2018年7月9日~7月16日）</p>
                    </div>
                    <div class="item">
                        <h4>获选旅行达人种子（共1名）将赢得</h4>
                        <p>
                            <span>1. 5500元/人旅行基金</span>
                            <span>2. 境外人身旅游意外保险 </span>
                            <span>3. “游行迹达人种子”称号</span>
                            <span>4. “游行迹达人种子”荣誉证书</span>
                            <span>5. 游行迹旅行帽</span>
                        </p>
                    </div>
                    <a href="{{$res.url}}" target="_blank" class="apply">我要报名</a>
                </div>
            </div>
        </div>
        <div class="m-adver-lb">
            <a href=""><img src="images/bg-lb3.jpg" alt=""></a>
        </div>
        <div class="m-inner-lb4" style="background-image: url(/resource/images/bg-lb4.png);">
            <div class="wp">
                <h4 class="m-tit-lb1">关于“一带一路”旅行接力，你应该了解这些</h4>
                <div class="con">
                    <h4>你能获得什么</h4>
                    <p>1. 免费获得与当地消费相符的旅行基金、境外人身旅游意外保险。</p>
                    <p>2. 还可收获“游行迹达人种子”称号，晋升达人邦，荣获游行迹荣誉证书。</p>
                    <p>3. 深入了解“一带一路”的风俗文化，体验当地的风土人情。</p>
                    <p>4. 收获一段难忘的旅行经历，给自己的青春留下一段美好的记忆。</p>
                </div>
                <div class="con">
                    <h4>你需要符合什么条件</h4>
                    <h5>1. 范围</h5>
                    <p>年龄在18岁~35岁，在校大专、本科、硕士、博士生。</p>
                    <h5>2. 健康</h5>
                    <p>身体健康，无重大疾病史。</p>
                    <h5>3. 性格</h5>
                    <p>乐观开朗，性格随和，做事认真负责、勤快。热爱旅行，热爱交友。</p>
                    <h5>4. 技能</h5>
                    <p>有一定的沟通能力和文字表达能力，如果会摄影的话更加分。英语水平为大学英语四级以上（包含大学英语四级），精通第三国语言尤佳。</p>
                    <h5>5. 证照</h5>
                    <p>拥有学生证和身份证等信息证件；拥有中华人民共和国护照，且护照有效期在游行迹规定出发的时间内。</p>
                </div>
                <div class="con">
                    <h4>你需要做什么</h4>
                    <div class="item">
                        <h5>1. 旅行前</h5>
                        <p>达人种子需在获选名单公布后3天内将旅游详细攻略发送给游行迹专业对接人员，以便游行迹客服人员帮忙办理签证、购买往返机票。另外，达人种子还需提供紧急联系人电话，以方便紧急情况发生时，游行迹可以更好地帮助达人种子解决。</p>
                    </div>
                    <div class="item">
                        <h5>2. 旅行中</h5>
                        <p>达人种子需通过文字、图片、视频对旅行过程进行直播。具体为：每天在达人邦栏目发布200字以上的内容，并附上高清照片9张，每天发表3次以上；每天上传旅游视频1次以上，视频内容需与游行迹规定的打卡地点相关。</p>
                        <p>直播内容请与当地旅游相关，必须有当地实景或真实照片。同时，直播内容需积极健康向上，不得有抄袭、欺骗等行为。</p>
                        <p>达人种子需穿着游行迹文化衫，行走完游行迹指定的几个打卡城市定点坐标，并在打卡城市用玩转明信片制作一张明信片分享出来，在微博、朋友圈等公开平台发布</p>
                    </div>
                    <div class="item">
                        <h5>3. 旅行后</h5>
                        <p>行程结束一周内，达人种子需将拍摄的高质量图片（50张以上）、精彩视频（10个以上）和悉心撰写的游记（3000字以上）提交至游行迹客服人员（均提供电子档），届时将作为传播素材在游行迹官网、APP、微博、微信公众号等渠道进行发布，而游行迹对此无需支付其他费用。</p>
                        <p>达人种子此次出行的所有图片、视频、游记等版权都属于游行迹独家所有，请勿在游行迹之外的平台传播和发布。</p>
                    </div>
                    <p>人生，至少该有一次跳出现有的生活圈，做一次张扬的人生主角，“一带一路”旅行的故事等你来书写，给旅行一个新的定义，寻找一个全新的自己！</p>
                </div>
            </div>
        </div>
        <div class="m-inner-lb5" style="background-image: url(/resource/images/bg-lb5.jpg);">
            <div class="wp">
                <h4 class="m-tit-lb1">“一带一路”达人种子招募令Q&A</h4>
                <div class="con">
                    <h4>每一站的旅行目的地均包含哪些奖品？</h4>
                    <p>游行迹将为达人种子提供“旅行基金”。旅行基金需要达人种子合理规划使用。旅行基金中已将签证费用、往返机票、境外旅游险、酒店住宿、餐饮费用等预算在其中签证和往返机票由游行迹代为办理，达人种子可在游行迹规定的出发范围内自行选择入驻酒店。达人种子需合理评估行程费用，旅行总支出超出旅行基金的部分，需达人种子自行承担，比如由于自身原因误机造成的损失。</p>
                </div>
                <div class="con">
                    <h4>旅行的签证由谁办理？</h4>
                    <p>旅行签证由游行迹代为办理，请达人种子在与客服联系后及时准备资料，以便办理相关签证。若因护照逾期、护照信息缺失等而导致签证无法办理，将视作中奖人放弃中奖资格。逾期不补发。</p>
                </div>
                <div class="con">
                    <h4>获选后后如何领取旅行基金？</h4>
                    <p>游行迹将在每一期活动获选名单公布后的24小时内，联系最终获得旅行机会的达人种子签订《“一带一路”达人种子协议》。达人种子需在48小时内签订协议并回复扫描件。获选达人种子需准备好个人护照信息。若因达人种子个人原因无法联系、未能在指定时间内签订协议或无法在规定时间内完成出票，将自动视为放弃奖项。</p>
                </div>
                <div class="con">
                    <h4>旅行基金什么时候派发？</h4>
                    <p>旅行签证和出行往返机票费用由游行迹代为办理后，在旅行基金中扣除相应部分；扣除旅行签证和往返机票费用后，剩余60%的旅行基金将在达人种子出发旅行前进行派发；剩余40%的旅行基金将在达人种子提交游记和所有旅行相关素材后进行派发。若达人种子未能完成直播、游记等任务，游行迹有权利扣掉除去旅行签证和往返机票后的40%的旅行基金。</p>
                </div>
                <div class="con">
                    <h4>获选后想要放弃资格的话该怎么办？</h4>
                    <p>达人种子需与游行迹签署《“一带一路”达人种子协议》，若达人种子因为自身因素放弃出行，将视为放弃奖励，不予补发、折现和任何形式的发放；若达人种子因为自身因素未完成行程或中途退出，需承担补偿（详见《“一带一路”达人种子协议》）。</p>
                </div>
                <div class="con">
                    <h4>旅行过程中是否能自由规划旅行路线？</h4>
                    <p>每一个国家的旅游均为自由行，除了游行迹指定必去的景点需游览外，路线可由达人种子自行规划。</p>
                </div>
                <div class="con">
                    <h4>达人种子获得的旅行资格可以转让给朋友使用吗？</h4>
                    <p>不可以。达人种子所获得的旅行资格为一人份奖励，且仅限于本人使用。请获选达人种子提前准备好个人护照和假期，若因个人原因无法完成出行，视作放弃奖项。</p>
                </div>
            </div>
        </div>
    </div>
    
      <script>
        // 图片
        var imgs = ["/resource/images/map-lb1_1.jpg","/resource/images/map-lb1_2.jpg"];
        //z-index的值
        var z = 199;
        //显示第几张图片
        var index = 0;
        var box = document.getElementById('box')

        boom(10,10)
        //l 传进来几行；t传进来几列;
        function boom(l,t) {
            //创建一个新的div
            var oParentNode = document.createElement("div");
            //设置z-index的值
            oParentNode.style.zIndex = z;
            z--;
            box.appendChild(oParentNode);

            var x = l,y = t;
            for(var i = 0; i < y;i++){
                for(var j = 0;j<x;j++){
                    //创建碎片
                    var oDiv = document.createElement("div");
                    //添加背景图片
                    oDiv.style.background = "url("+imgs[index]+")";
                    oDiv.style.width = box.clientWidth / x + 'px';
                    oDiv.style.height = box.clientHeight / y + 'px';
                    oDiv.style.left = (box.clientWidth / x) * j +'px';
                    oDiv.style.top = (box.clientHeight / y) * i +'px';
                    oDiv.style.backgroundPositionX = (box.clientWidth/ x)* -j + 'px';
                    oDiv.style.backgroundPositionY= (box.clientHeight/y)* -i + 'px';
                    oDiv.style.transition = (Math.random()*1+0.5)+"s";
                    oParentNode.appendChild(oDiv);

                }
            };


            var allDiv = oParentNode.children;
            setTimeout(()=>{
                index++;
            index == imgs.length && (index = 0);

            boom(l,t);
            for(var i= 0;i<allDiv.length;i++){
                allDiv[i].style.transform = 'perspective(800px) rotateX('+ (Math.random()*500-250)+'deg) rotateY('+(Math.random()*500-250)+'deg) translateX('+(Math.random()*500-250)+'px) translateY('+(Math.random()*500-250)+'px) translateZ('+(Math.random()*1000-500)+'px)'
                allDiv[i].style.opacity = 0;
            };
        },5000);

            setTimeout(function(){
                oParentNode.remove();
            },6000)

        }
    </script>
  
  
    {{include file='public/footer.tpl'}}
</body>

</html>