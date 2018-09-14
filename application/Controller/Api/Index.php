<?php

class Controller_Api_Index extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function getrytAction()
    {
        $time = $this->getParam('time');
        $start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('ryt')->field('id,title,homecontent,pics')->where("show_time between $start_time and $end_time and status=1 ")->find();
        $res['title'] = $res['title']?$res['title']:' ';
        $img_url="";
        if( $res['homecontent'] ){
            //单独提出图片路径
            $pattern="/(http|https):\/\/([\w\d\-_]+[\.\w\d\-_]+)[:\d+]?([\/]?[\w\/\.]+)/i";
            preg_match($pattern,$res['homecontent'],$match);
            $img_url=$match[0]??'';

            $p_arr=explode("<p>",$res['homecontent']);
            if( $p_arr ){
                unset($p_arr[1]);
            }
            $new_str=implode("<p>",$p_arr);
            $res['homecontent']=$new_str;
        }
        $res['img_url']=$img_url??'';

        $res['homecontent'] = $res['homecontent']?$res['homecontent']:' ';
        echo Core_Fun::outputjson($res);
    }

    /*
     *
     * 获取日月潭列表，只获取某一个月的
     * */
    public function getryt_listAction()
    {
        $month=$this->getParam("month");
        if( empty($month) || intval($month)<=0 || intval($month)>12 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $year=date("Y");
        $list=$this->rl_one($year,'',$month);

//        $json = array('status' => 1, 'list' => $list);
        echo json_encode($list);
        exit;
    }


    /*
     *
     * 日月潭值算出一个月的
     * */
    public function rl_one($y, $dy = '', $dm = '12')
    {
        $list = array();
        $first[$dm] = strtotime(date("$y-$dm-01 00:00:00"));
        //计算每月前面的空格
        $first[$dm] = date("w", $first[$dm]);
        for ($j=0; $j < $first[$dm]; $j++) {
            $list[] = array(
                'status' => 0,
                'time' => "",
                'days' => ""
            );
        }
        //计算每月多少天
        $maxDay = date('t', strtotime("" . date("$y") . "-" . date("$dm") . ""));
        for ($s = 1; $s < $maxDay + 1; $s++) {
            $start_time = strtotime(date("$y-$dm-$s")." 00:00:00");
            $end_time=strtotime(date("$y-$dm-$s")." 23:59:59");
            $res = C::M('ryt')->where("show_time between $start_time and $end_time and status=1 ")->find();
            if($res){
                $list[] = array(
                    'status' => 1,
                    'id' => $res['id'],
                    'pics' => $res['pics'],
                    'time' => $y . '-' . $dm . '-' . $s,
                    'days' => $s,
                    'keyword' => $res['keyword']?$res['keyword']:'查看详情'
                );
            }else{
                $list[] = array(
                    'status' => 0,
                    'time' => $y . '-' . $dm . '-' . $s,
                    'days' => $s
                );
            }
        }

        //最后的
        $total = count($list);
        $other = array();
        for ($x = 0; $x < ceil($maxDay / 7) * 7 - $total ; $x++) {
            $list[] = array(
                'status' => 0,
                'time' => "",
                'days' => ""
            );
        }
        return $list;
    }


    //游主张，手风琴图片
    public function getyzzAction()
    {
        header('Access-Control-Allow-Origin:*');
        $type=$this->getParam("type");
        if( strlen(trim($type))==0 ){
            exit();
        }

        if( strtolower($type)=='pc' ){
            $tag_arr=array("'index_zhen_1'","'index_zhen_2'","'index_zhen_3'");
        }else if(strtolower($type)=="mobile"){
            $tag_arr=array("'wap_zhen_1'","'wap_zhen_2'","'wap_zhen_3'");
        }

        $str=implode(",",$tag_arr);
        $img_list=C::M("base_ad")->field("id,imgurl,linkurl")->where(" tagname in ({$str}) ")->select();
        $res=array();
        if( $img_list ){
            foreach($img_list as $key=>$val){
                $one=array();
                if( $key==1 ){
                    $one['class']="active";
                }else{
                    $one['class']="x";
                }
                $one['id']=$val['id'];
                $one['url']="http://".$_SERVER['HTTP_HOST'].$val['imgurl'];
                $one['linkurl']=$val['linkurl'];
                $res[]=$one;
            }
        }
        echo Core_Fun::outputjson($res);
    }

    //报名
    public function enteredAction()
    {
        $id = intval($this->getParam('id'));
        if(!$id){
            $json = array('status' => 0, 'tips' => '参数缺少');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $data = array(
            'rid' => intval($this->getParam('id')),
            'name' => htmlspecialchars($this->getParam('name')),
            'sex' => htmlspecialchars($this->getParam('sex')),
            'phone' => htmlspecialchars($this->getParam('phone')),
            'school' => htmlspecialchars($this->getParam('school')),
            'englishlevel' => htmlspecialchars($this->getParam('englishlevel')),
            'birthday' => htmlspecialchars($this->getParam('birthday')),
            'wechat' => htmlspecialchars($this->getParam('wechat')),
            'email' => htmlspecialchars($this->getParam('email')),
            'y' => htmlspecialchars($this->getParam('y')),
            'activitiesthrough' => htmlspecialchars($this->getParam('activitiesthrough')),
            'travelexperiences' => htmlspecialchars($this->getParam('travelexperiences')),
            'note' => htmlspecialchars($this->getParam('note')),
            'source' => htmlspecialchars($this->getParam('source')),
        );
        if(C::M('entered')->add($data)){
            $json = array('status' => 1, 'tips' => '报名成功，请等待客服审核');
        }else{
            $json = array('status' => 0, 'tips' => '报名失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //在线预约
    public function postleaveAction()
    {
        $realname =  htmlspecialchars($this->getParam('realname'));
        $telephone =  htmlspecialchars($this->getParam('telephone'));
        $email =  htmlspecialchars($this->getParam('email'));
        $message =  htmlspecialchars($this->getParam('messages'));
        if(!$realname){
            $json = array('status' => 0, 'tips' => '请输入您的姓名');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!$telephone){
            $json = array('status' => 0, 'tips' => '请输入您的手机号码');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!$email){
            $json = array('status' => 0, 'tips' => '请输入出发地');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!$message){
            $json = array('status' => 0, 'tips' => '请输入内容');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $data = array(
            'realname' => $realname,
            'telephone' => $telephone,
            'email' => $email,
            'message' => $message,
            'addtime' => CURTIME
        );
        if(C::M('leaving')->add($data)){
            $json = array('status' => 1, 'tips' => '预约成功，请等待客服处理！');
        }else{
            $json = array('status' => 0, 'tips' => '预约失败，请重试！');
        }
        echo Core_Fun::outputjson($json);
    }

    //获取验证码
    public function getphonecodeAction()
    {
        $phone = $this->getParam('phone');
        $code = $this->getParam('code');
        //开始检测验证码获取间隔时间
        $tim = time() - $_SESSION['getcodetime'];
        if($tim < 60){
            $json = array('status' => 0, 'tips' => '获取太频繁，请稍后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!preg_match("/^1[34578]\d{9}$/", $phone)){
            $json = array('status' => 0, 'tips' => '请输入正确的手机号');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!Core_Lib_Gdcheck::check($code)){
            $json = array('status' => 0, 'tips' => '图形验证码错误');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(Core_Fun::getuserinfo($phone)){
            $json = array('status' => 2, 'tips' => '手机号已被注册');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //发送验证码
        $config = array(
            'sms_key' => 'LTAIgsteY1Cz5thr',
            'sms_secret' => 'elQeZT7a49eJRYxJJbqTrPQR240S8N',
            'sms_sign' => '游行迹'
        );
        $tplId = 'SMS_125670010';
        $code = rand(1000,9999);
        $data = array('code' => $code);
        include ROOT . "vendor/sms/Sms.class.php";
        $sms = new Sms();
        $res = $sms->sendSms($config, $phone, $tplId, $data);
        if($res['Message'] == 'OK' && $res['Code'] == 'OK' ){
            $_SESSION['code'] = $code;
            $_SESSION['phone'] = $phone;
            $_SESSION['getcodetime'] = time();
            //发送成功记录
            C::M('sms_log')->add(array(
                'tel' => $phone,
                'note' => "【游行迹】验证码".$code."，您正在注册成为新用户，感谢您的支持！",
                'gettime' => date('Y-m-d H:i:s', time()),
                'ip' => Core_Comm_Util::getClientIp()
            ));
            $json = array('status' => 1, 'tips' => '发送成功，验证码有效期为5分钟');
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' => '发送失败，请稍后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    //获取找回密码的验证码
    public function getforgetphonecodeAction()
    {
        $phone = $this->getParam('phone');
        $code = $this->getParam('code');
        //开始检测验证码获取间隔时间
        $tim = time() - $_SESSION['getforgetcodetime'];
        if($tim < 60){
            $json = array('status' => 0, 'tips' => '获取太频繁，请稍后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!preg_match("/^1[34578]\d{9}$/", $phone)){
            $json = array('status' => 0, 'tips' => '请输入正确的手机号');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!Core_Lib_Gdcheck::check($code)){
            $json = array('status' => 0, 'tips' => '图形验证码错误');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!Core_Fun::getuserinfo($phone)){
            $json = array('status' => 2, 'tips' => '手机号未被注册');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //发送验证码
        $config = array(
            'sms_key' => 'LTAIgsteY1Cz5thr',
            'sms_secret' => 'elQeZT7a49eJRYxJJbqTrPQR240S8N',
            'sms_sign' => '游行迹'
        );
        $tplId = 'SMS_125670009';
        $code = rand(1000,9999);
        $data = array('code' => $code);
        include ROOT . "vendor/sms/Sms.class.php";
        $sms = new Sms();
        $res = $sms->sendSms($config, $phone, $tplId, $data);
        if($res['Message'] == 'OK' && $res['Code'] == 'OK' ){
            $_SESSION['forgetcode'] = $code;
            $_SESSION['forgetphone'] = $phone;
            $_SESSION['getforgetcodetime'] = time();
            //发送成功记录
            C::M('sms_log')->add(array(
                'tel' => $phone,
                'note' => "【游行迹】验证码".$code."，您正在尝试修改登录密码，请妥善保管账户信息。",
                'gettime' => date('Y-m-d H:i:s', time()),
                'ip' => Core_Comm_Util::getClientIp()
            ));
            $json = array('status' => 1, 'tips' => '发送成功，验证码有效期为5分钟');
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' => '发送失败，请稍后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    //注册账户
    public function reguserAction()
    {
        $phone = htmlspecialchars($this->getParam('phone'));
        $code = $this->getParam('code');
        $username = htmlspecialchars($this->getParam('username'));
        $pass1 = $this->getParam('pass1');
        $pass2 = $this->getParam('pass2');
        if(!preg_match("/^1[34578]\d{9}$/", $phone)){
            $json = array('status' => 0, 'tips' => '请输入正确的手机号');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(Core_Fun::getuserinfo($phone)){
            $json = array('status' => 0, 'tips' => '手机号已被注册');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if($code != $_SESSION['code']){
            $json = array('status' => 0, 'tips' => '验证码错误');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(time() - $_SESSION['getcodetime'] > 300){
            $json = array('status' => 0, 'tips' => '验证码已过期');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if($phone != $_SESSION['phone']){
            $json = array('status' => 0, 'tips' => '手机号与当前不一致');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $data = array(
            'username' => $username,
            'realname' => $username,
            'telephone' => $phone,
            'password' => md5($pass1),
            'regip' => Core_Comm_Util::getClientIp(),
            'regtime' => Core_Fun::time()
        );
        if(C::M('user_member')->add($data)){
            //销毁验证码保留信息
            unset($_SESSION['code']);
            unset($_SESSION['phone']);
            unset($_SESSION['getcodetime']);
            //注册赠送50经验
            C::M('user_member')->where("telephone = '$phone'")->setInc('exp', 50);
            $json = array('status' => 1, 'tips' => '注册成功，等待跳转至登录页面...');
        }else{
            $json = array('status' => 0, 'tips' => '注册失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //浏览增加
    public function showtvAction()
    {
        $id = intval($this->getParam('id'));
        C::M('tv')->where('id', $id)->setInc('shownum', 1);
    }

    //找回密码
    public function forgetAction()
    {
        $phone = $this->getParam('phone');
        $code = $this->getParam('code');
        $password = htmlspecialchars($this->getParam('password'));
        if(!preg_match("/^1[34578]\d{9}$/", $phone)){
            $json = array('status' => 0, 'tips' => '请输入正确的手机号');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!Core_Fun::getuserinfo($phone)){
            $json = array('status' => 0, 'tips' => '手机号未被注册');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if($code != $_SESSION['forgetcode']){
            $json = array('status' => 0, 'tips' => '验证码错误');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(time() - $_SESSION['getforgetcodetime'] > 300){
            $json = array('status' => 0, 'tips' => '验证码已过期');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if($phone != $_SESSION['forgetphone']){
            $json = array('status' => 0, 'tips' => '手机号与当前不一致');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $data = array(
            'password' => md5($password),
        );
        if(C::M('user_member')->where("telephone = '$phone'")->update($data)){
            //销毁验证码保留信息
            unset($_SESSION['forgetcode']);
            unset($_SESSION['forgetphone']);
            unset($_SESSION['getforgetcodetime']);
            $json = array('status' => 1, 'tips' => '找回成功，等待跳转至登录页面...');
        }else{
            $json = array('status' => 0, 'tips' => '找回失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //登陆
    public function loginAction()
    {
        $phone = $this->getParam('phone');
        $password = $this->getParam('password');
        if(!preg_match("/^1[34578]\d{9}$/", $phone)){
            $json = array('status' => 0, 'tips' => '请输入正确的手机号');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $isreg = Core_Fun::getuserinfo($phone);
        if(!$isreg){
            $json = array('status' => 0, 'tips' => '手机号未注册');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!Core_Fun::getuserinfo($phone, md5($password))){
            //记录登录失败的日志，以后提醒用户账户不安全
            $data = array(
                'uid' => $isreg['uid'],
                'logintime' => time(),
                'loginstatus' => 0,
                'loginip' => Core_Comm_Util::getClientIp()
            );
            C::M('login_log')->add($data);
            $json = array('status' => 0, 'tips' => '账户或密码错误');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $_SESSION['userinfo'] = Core_Fun::getuserinfo($phone);
        //查询今日是否登录
        $cur_date = strtotime(date('Y-m-d'));
        $uid = $_SESSION['userinfo']['uid'];
        $log = C::M('login_log')->where("uid = $uid and logintime >= $cur_date and loginstatus = 1")->find();
        if(!$log){
            //每天第一次登录赠送10经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 10);
        }
        //记录每次登录的日志
        $data = array(
            'uid' => $uid,
            'logintime' => time(),
            'loginstatus' => 1,
            'loginip' => Core_Comm_Util::getClientIp()
        );
        C::M('login_log')->add($data);
        $json = array('status' => 1, 'tips' => '登陆成功，等待跳转至个人中心...');
        echo Core_Fun::outputjson($json);
    }

    //保存个人设置
    public function savesettingAction()
    {
        $username = htmlspecialchars($this->getParam('username'));
        $sex = intval($this->getParam('sex'));
        $city = htmlspecialchars($this->getParam('city'));
        $birthday = htmlspecialchars($this->getParam('birthday'));
        $autograph = htmlspecialchars($this->getParam('autograph'));
        $data = array(
            'username' => $username,
            'sex' => $sex,
            'city' => $city,
            'birthday' => $birthday,
            'autograph' => $autograph
        );
        if(C::M('user_member')->where("uid = ".$_SESSION['userinfo']['uid'])->update($data)){
            $numerical = 0;
            if($username != ''){
                $numerical += 20;
            }
            if($sex != ''){
                $numerical += 20;
            }
            if($city != ''){
                $numerical += 20;
            }
            if($birthday != ''){
                $numerical += 20;
            }
            if($autograph != ''){
                $numerical += 20;
            }
            if($numerical >= 80){
                $user = Core_Fun::getuiduserinfo($_SESSION['userinfo']['uid'], 'uid,telephone,isgetsettingexp');
                //初次填写资料超过80%赠送50经验
                if($user['isgetsettingexp'] == 0){
                    C::M('user_member')->where("telephone = '$user[telephone]'")->setInc('exp', 50);
                    C::M('user_member')->where("telephone = '$user[telephone]'")->setField('isgetsettingexp', 1);
                }
            }
            echo 1;
        }else{
            echo 0;
        }
    }

    //保存头像
    public function saveavatarAction()
    {
        $base64_img = trim($_POST['imgPath']);
        $up_dir = './uploadfile/image/'.date('Ymd').'/';//存放在当前目录的upload文件夹下
        if(!file_exists($up_dir)){
            mkdir($up_dir,0777);
        }
        if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $result)){
            $type = $result[2];
            if(in_array($type,array('jpeg','jpg','gif','bmp','png'))){
                $new_file = $up_dir.date('YmdHis').rand(0000,9999).'.'.$type;
                if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_img)))){
                    C::M('user_member')->where("uid = ".$_SESSION['userinfo']['uid'])->update(array('headpic' => ltrim($new_file,'.')));
                    $json = array(
                        'status' => 1,
                        'url' => ltrim($new_file,'.'),
                        'msg' => '上传成功'
                    );
                }else{
                    $json = array(
                        'status' => 0,
                        'url' => '',
                        'msg' => '上传失败'
                    );
                }
            }else{
                $json = array(
                    'status' => 0,
                    'url' => '',
                    'msg' => '图片类型错误'
                );
            }
        }else{
            $json = array(
                'status' => 0,
                'url' => '',
                'msg' => '文件错误'
            );
        }
        echo Core_Fun::outputjson($json);
    }

    //保存封面
    public function savecoverAction()
    {
        $config = array(
            "pathFormat" => 'image/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 2048000000,
            "allowFiles" => array(".png", ".jpg", ".jpeg", ".bmp"),
            "ext" => ''
        );
        $fieldName = 'file';

        $ret = array(); // 返回到客户端的信息

        $file_path = Core_Util_Upload::webuploader($fieldName, $config);

        if(C::M('user_member')->where("uid = ".$_SESSION['userinfo']['uid'])->update(array('cover' => $file_path['link']))){
            $json = array(
                'status' => 1,
                'url' => $file_path['link'],
                'tips' => '上传成功'
            );
        }else{
            $json = array(
                'status' => 0,
                'url' => '',
                'tips' => '上传失败'
            );
        }
        echo Core_Fun::outputjson($json);
    }

    //上传图片接口
    public function uploadpicAction()
    {
        $config = array(
            "pathFormat" => 'image/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 524288,
            "allowFiles" => array(".png", ".jpg", ".jpeg", ".bmp"),
            "ext" => ''
        );
        $fieldName = 'file';

        $ret = array(); // 返回到客户端的信息

        $res = Core_Util_Upload::webuploader($fieldName, $config);
        if( $res['code'] !=1 ){
            echo Core_Fun::outputjson($res);
            exit();
        }

        $json = array(
            'url' => $res['link']
        );
        echo Core_Fun::outputjson($json);
    }

    //上传图片接口
    public function lay_uploadpicAction()
    {
        $config = array(
            "pathFormat" => 'image/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 524288,
            "allowFiles" => array(".png", ".jpg", ".jpeg", ".bmp"),
            "ext" => ''
        );
        $fieldName = 'file';

        $ret = array(); // 返回到客户端的信息

        $res = Core_Util_Upload::webuploader($fieldName, $config);
        if( $res['code'] !=1 ){//失败
            $json=array(
                'code'=>1,
                'msg'=>$res['msg']
            );
            echo Core_Fun::outputjson($json);
            exit();
        }

        //成功
        $json = array(
            'code'=>0,
            'msg'=>"上传成功",
            'data' => array(
                'src'=>$res['link'],
                'title'=>$res['title']
            )
        );
        echo Core_Fun::outputjson($json);
    }

    //关注或取消关注
    public function followAction()
    {
        $bid = intval($this->getParam('bid'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否关注自己
        if($bid == $uid){
            $json = array('status' => 0, 'tips' => '不能关注自己');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否关注
        $isfollow = C::M('follow')->where("uid = $uid and bid = $bid")->find();
        if($isfollow){
            //取消关注
            if(C::M('follow')->where("uid = $uid and bid = $bid")->delete()){
                //扣除关注获得的经验
                if($isfollow['isget_u'] == 1){
                    C::M('user_member')->where("uid = $isfollow[uid]")->setReduce('exp', 5);
                }
                //扣除被关注人的经验
                if($isfollow['isget_b'] == 1){
                    C::M('user_member')->where("uid = $isfollow[bid]")->setReduce('exp', 5);
                }
                $json = array('status' => 2, 'tips' => '取消成功');
            }
        }else{
            //关注
            $addfollow = C::M('follow')->add(array('uid' => $uid, 'bid' => $bid, 'addtime' => time()));
            if($addfollow){
                //查询今日关注数，小于等于10加5经验
                $cur_date = strtotime(date('Y-m-d'));
                $follownum = C::M('follow')->where("uid = $uid and addtime >= $cur_date")->getCount();
                if($follownum <= 10){
                    //增加5经验
                    C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
                    C::M('follow')->where("id = $addfollow")->setField('isget_u',1);
                }
                //查询被关注人今日被关注数，小于等于10加5经验
                $cur_date = strtotime(date('Y-m-d'));
                $bfollownum = C::M('follow')->where("bid = $bid and addtime >= $cur_date")->getCount();
                if($follownum <= 10){
                    //增加5经验
                    C::M('user_member')->where("uid = $bid")->setInc('exp', 5);
                    C::M('follow')->where("id = $addfollow")->setField('isget_b',1);
                }
                $json = array('status' => 1, 'tips' => '关注成功');
            }
        }
        echo Core_Fun::outputjson($json);
    }

    //发布游记
    public function addtravelAction()
    {
        $title = htmlspecialchars($this->getParam('title'));
        $describe = htmlspecialchars($this->getParam('describe'));
        $list = $this->getParam('list');
        $uid = $_SESSION['userinfo']['uid'];
        //草稿ID
        $did = intval($this->getParam('did'));
        $address=$this->getParam("address");
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('travel')->add(
            array(
                'uid' => $uid,
                'title' => $title,
                'content' => $list,
                'describes' => $describe,
                'addtime' => time(),
                'status' => 0,
                'address'=>$address
            )
        )){
            //查询今日是否是第一次发布游记
            $cur_date = strtotime(date('Y-m-d'));
            $publishnum = C::M('travel')->where("uid = $uid and addtime >= $cur_date")->getCount();
            if($publishnum <= 1){
                //赠送25经验
                C::M('user_member')->where("uid = $uid")->setInc('exp', 25);
            }
            //清除当前游记草稿
            C::M('draft')->where("uid = $uid and type = 0 and id = $did")->delete();
            $json = array('status' => 1, 'tips' => '发布成功~');
        }else{
            $json = array('status' => 0, 'tips' => '发布失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //编辑游记
    public function edittravelAction()
    {
        $title = htmlspecialchars($this->getParam('title'));
        $describe = htmlspecialchars($this->getParam('describe'));
        $list = $this->getParam('list');
        $uid = $_SESSION['userinfo']['uid'];
        $id = intval($this->getParam('id'));
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('travel')->where("id = $id and uid = $uid")->update(
            array(
                'title' => $title,
                'content' => $list,
                'describes' => $describe,
            )
        )){
            $json = array('status' => 1, 'tips' => '更新成功~');
        }else{
            $json = array('status' => 0, 'tips' => '更新失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //发布TV
    public function addtvAction()
    {
        $title = htmlspecialchars($this->getParam('title'));
        $describe = htmlspecialchars($this->getParam('describe'));
        $url = htmlspecialchars($this->getParam('url'));
        $pics = htmlspecialchars($this->getParam('pic'));
        $address=$this->getParam("address");
        //草稿ID
        $did = intval($this->getParam('did'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('tv')->add(
            array(
                'uid' => $uid,
                'title' => $title,
                'pics' => $pics,
                'url' => $url,
                'describes' => $describe,
                'addtime' => time(),
                'status' => 0,
                'address'=>$address
            )
        )){
            //查询今日是否是第一次发布TV
            $cur_date = strtotime(date('Y-m-d'));
            $publishnum = C::M('tv')->where("uid = $uid and addtime >= $cur_date")->getCount();
            if($publishnum <= 1){
                //赠送25经验
                C::M('user_member')->where("uid = $uid")->setInc('exp', 25);
            }
            //清除当前TV草稿
            C::M('draft')->where("uid = $uid and type = 1 and id = $did")->delete();
            $json = array('status' => 1, 'tips' => '发布成功~');
        }else{
            $json = array('status' => 0, 'tips' => '发布失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //编辑TV
    public function edittvAction()
    {
        $title = htmlspecialchars($this->getParam('title'));
        $describe = htmlspecialchars($this->getParam('describe'));
        $url = htmlspecialchars($this->getParam('url'));
        $pics = htmlspecialchars($this->getParam('pic'));
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('tv')->where("id = $id and uid = $uid")->update(
            array(
                'uid' => $uid,
                'title' => $title,
                'pics' => $pics,
                'url' => $url,
                'describes' => $describe,
            )
        )){
            $json = array('status' => 1, 'tips' => '更新成功~');
        }else{
            $json = array('status' => 0, 'tips' => '更新失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //保存草稿
    public function adddraftAction()
    {
        $title = htmlspecialchars($this->getParam('title'));
        $describe = htmlspecialchars($this->getParam('describe'));
        $content = $this->getParam('list');
        $type = intval($this->getParam('type'));
        $uid = $_SESSION['userinfo']['uid'];
        $address=$this->getParam("address");
        $tag=$this->getParam("tag")??'';
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //清除所有草稿
        //C::M('draft')->where("uid = $uid and type = $type")->delete();
        if(C::M('draft')->add(
            array(
                'uid' => $uid,
                'title' => $title,
                'content' => $content,
                'describe' => $describe,
                'type' => $type,
                'addtime' => time(),
                'address'=>$address,
                'tag'=>$tag
            )
        )){
            $json = array('status' => 1, 'tips' => '保存成功~');
        }else{
            $json = array('status' => 0, 'tips' => '保存失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //删除草稿
    public function deletedraftAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('draft')->where("uid = $uid and id = $id")->delete()){
            $json = array('status' => 1, 'tips' => '删除成功');
        }else{
            $json = array('status' => 0, 'tips' => '删除失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //删除游记
    public function deletetravelAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('travel')->where("uid = $uid and id = $id")->delete()){
            $json = array('status' => 1, 'tips' => '删除成功');
        }else{
            $json = array('status' => 0, 'tips' => '删除失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //删除TV
    public function deletetvAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('tv')->where("uid = $uid and id = $id")->delete()){
            $json = array('status' => 1, 'tips' => '删除成功');
        }else{
            $json = array('status' => 0, 'tips' => '删除失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //日月潭赞
    public function zanrytAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询今日是否是第一次点赞游记
        $cur_date = strtotime(date('Y-m-d'));
        $zannum = C::M('top')->where("uid = $uid and type = 'ryt' and addtime >= $cur_date")->getCount();
        if($zannum <= 0){
            //赠送5经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
        }
        $zan = C::M('top')->where("uid = $uid and type = 'ryt' and tid = $id")->find();
        if($zan){
            $json = array('status' => 0, 'tips' => '你已经点赞过了');
        }else{
            //添加点赞记录
            C::M('top')->add(array(
                'uid' => $uid,
                'type' => 'ryt',
                'tid' => $id,
                'addtime' => time()
            ));
            C::M('ryt')->where('id', $id)->setInc('zannum', 1);
            $json = array('status' => 1, 'tips' => '点赞成功');
        }
        echo Core_Fun::outputjson($json);
    }

    //游记赞
    public function zanAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询今日是否是第一次点赞游记
        $cur_date = strtotime(date('Y-m-d'));
        $zannum = C::M('top')->where("uid = $uid and type = 'travel' and addtime >= $cur_date")->getCount();
        if($zannum <= 0){
            //赠送5经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
        }
        $zan = C::M('top')->where("uid = $uid and type = 'travel' and tid = $id")->find();
        if($zan){
            $json = array('status' => 2, 'tips' => '你已经点赞过了');
        }else{
            //添加点赞记录
            C::M('top')->add(array(
                'uid' => $uid,
                'type' => 'travel',
                'tid' => $id,
                'addtime' => time()
            ));
            C::M('travel')->where('id', $id)->setInc('topnum', 1);
            $json = array('status' => 1, 'tips' => '点赞成功');
        }
        echo Core_Fun::outputjson($json);
    }

    //tv赞
    public function zantvAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询今日是否是第一次点赞游记
        $cur_date = strtotime(date('Y-m-d'));
        $zannum = C::M('top')->where("uid = $uid and type = 'tv' and addtime >= $cur_date")->getCount();
        if($zannum <= 0){
            //赠送5经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
        }
        $zan = C::M('top')->where("uid = $uid and type = 'tv' and tid = $id")->find();
        if($zan){
            $json = array('status' => 0, 'tips' => '你已经点赞过了');
        }else{
            //添加点赞记录
            C::M('top')->add(array(
                'uid' => $uid,
                'type' => 'tv',
                'tid' => $id,
                'addtime' => time()
            ));
            C::M('tv')->where('id', $id)->setInc('topnum', 1);
            $json = array('status' => 1, 'tips' => '点赞成功');
        }
        echo Core_Fun::outputjson($json);
    }


    //油画赞
    public function zan_sceneryAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询今日是否是第一次点赞油画
        $cur_date = strtotime(date('Y-m-d'));
        $zannum = C::M('top')->where("uid = $uid and type = 'scenery' and addtime >= $cur_date")->getCount();
        if($zannum <= 0){
            //赠送5经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
        }
        $zan = C::M('top')->where("uid = $uid and type = 'scenery' and tid = $id")->find();
        if($zan){
            $json = array('status' => 2, 'tips' => '你已经点赞过了');
        }else{
            //添加点赞记录
            C::M('top')->add(array(
                'uid' => $uid,
                'type' => 'scenery',
                'tid' => $id,
                'addtime' => time()
            ));
            C::M('scenery')->where('id', $id)->setInc('top_num', 1);
            $json = array('status' => 1, 'tips' => '点赞成功');
        }
        echo Core_Fun::outputjson($json);
    }

    //长篇游记赞
    public function zantravelAction()
    {
        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        //查询今日是否是第一次点赞游记
        $cur_date = strtotime(date('Y-m-d'));
        $zannum = C::M('top')->where("uid = $uid and type = 'travel_note' and addtime >= $cur_date")->getCount();
        if($zannum <= 0){
            //赠送5经验
            C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
        }
        $zan = C::M('top')->where("uid = $uid and type = 'travel_note' and tid = $id")->find();
        if($zan){
            $json = array('status' => 0, 'tips' => '你已经点赞过了');
        }else{
            //添加点赞记录
            C::M('top')->add(array(
                'uid' => $uid,
                'type' => 'travel_note',
                'tid' => $id,
                'addtime' => time()
            ));
            C::M('travel_note')->where('id', $id)->setInc('top_num', 1);
            $json = array('status' => 1, 'tips' => '点赞成功');
        }
        echo Core_Fun::outputjson($json);
    }

    //评论
    public function commentAction()
    {
        $rid = intval($this->getParam('rid'));
        $content = htmlspecialchars($this->getParam('str'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(!$content){
            $json = array('status' => 0, 'tips' => '评论内容不能为空');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $data = array(
            'rid' => $rid,
            'uid' => $uid,
            'content' => $content,
            'status' => 1,
            'addtime' => time()
        );
        if(C::M('comment')->add($data)){
            //查询今日是否是第一次评论
            $cur_date = strtotime(date('Y-m-d'));
            $commentnum = C::M('comment')->where("uid = $uid and addtime >= $cur_date")->getCount();
            if($commentnum <= 1){
                //赠送10经验
                C::M('user_member')->where("uid = $uid")->setInc('exp', 10);
            }
            $json = array('status' => 1, 'tips' => '评论成功');
        }else{
            $json = array('status' => 0, 'tips' => '评论失败，请重试');
        }
        echo Core_Fun::outputjson($json);
    }

    //私信
    public function sendmsgAction()
    {
        $to_id = intval($this->getParam('to_id'));
        $content = htmlspecialchars($this->getParam('content'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if($to_id == $uid){
            $json = array('status' => 0, 'tips' => '不能私信自己');
            echo Core_Fun::outputjson($json);
            exit;
        }
        $msg = C::M('msg')->where("form_id = $uid and to_id = $to_id or form_id = $to_id and to_id = $uid")->find();
        if($msg){
            //查询到记录直接插入详情表
            $data = array(
                'mid' => $msg['id'],
                'form_id' => $uid,
                'to_id' => $to_id,
                'content' => $content,
                'status' => 0,
                'addtime' => time()
            );
            if(C::M('msg_detail')->add($data)){
                $json = array('status' => 1, 'tips' => '发送成功', 'content' => Core_Fun::ubbreplace($content));
            }else{
                $json = array('status' => 0, 'tips' => '发送失败，请重试');
            }
        }else{
            $msgs = C::M('msg')->add(array(
                'form_id' => $uid,
                'to_id' => $to_id
            ));
            if($msgs){
                $data = array(
                    'mid' => $msgs,
                    'form_id' => $uid,
                    'to_id' => $to_id,
                    'content' => $content,
                    'status' => 0,
                    'addtime' => time()
                );
                if(C::M('msg_detail')->add($data)){
                    $json = array('status' => 1, 'tips' => '发送成功');
                }else{
                    $json = array('status' => 0, 'tips' => '发送失败，请重试');
                }
            }
        }

        echo Core_Fun::outputjson($json);
    }

    //删除私信
    public function deletemsgAction()
    {
        $mid = intval($this->getParam('mid'));
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }
        if(C::M('msg')->where("form_id = $uid and id = $mid or to_id = $uid and id = $mid")->delete()){
            C::M('msg_detail')->where("mid = $mid")->update(array('status' => 1));
            $json = array('status' => 1, 'tips' => '删除成功');
        }else{
            $json = array('status' => 0, 'tips' => '删除失败');
        }
        echo Core_Fun::outputjson($json);
    }

    //获取日历报价
    public function getcalendarAction()
    {
        $jid = intval($this->getParam('jid'));
        $year = intval($this->getParam('year'));
        $month = $this->getParam('month');
        $first = strtotime(date("$year-$month-01 00:00:00"));
        if($first < strtotime(date("Y-m-01 00:00:00"))){
            //返回
            $json = array(
                'BeginMonth' => intval(date("n", time())),
                'BeginYear' => intval(date("Y", time())),
                'EndMonth' => intval(date("n", time() + 10368000)),
                'EndYear' => intval(date("Y", time() + 10368000)),
                'MonthModel' => null
            );
            echo Core_Fun::outputjson($json);
            exit;
        }
        $first = date("w", $first);
        $maxDay = date('t', strtotime("" . $year . "-" . $month . ""));
        $blankArr = [];
        for ($j = 0; $j < $first; $j++) {
            $blankArr[]['DateString'] = null;
        }
        $days = array();
        for ($i = 0; $i < $maxDay; $i++) {
            $days[]['DateString'] = "$year-$month-" . ($i + 1);
        }
        $total = $first + count($days);
        $other = array();
        for ($x = 0; $x < ceil($maxDay / 7) * 7 - $total; $x++) {
            $other[]['DateString'] = null;
        }
        $list = array_merge($blankArr, $days, $other);
        foreach ($list as $key => $value) {
            $start_time = strtotime($value['DateString'] . " 00:00:00");
            $end_time = strtotime($value['DateString'] . " 23:59:59");
            $calendar = C::M('journey_price')->where("addtime between $start_time and $end_time")->find();
            $d = date("d", time());
            if($calendar && $value['DateString'] && $d < date("d", $start_time)){
                $list[$key]['DateType'] = 1;
                $list[$key]['Day'] = intval(date("d", $start_time));
                $list[$key]['MinPerson'] = intval($calendar['minperson']);
                $list[$key]['DateText'] = $calendar['text'];
                if($calendar['text'] == '截止销售'){
                    $list[$key]['DateType'] = 6;
                }else if($calendar['text'] == '候补'){
                    $list[$key]['DateType'] = 2;
                }
                $list[$key]['Price'] = intval($calendar['price']);
                $list[$key]['IsBooking'] = true;
            }else{
                $list[$key]['DateType'] = 0;
                if(!$value['DateString']){
                    $list[$key]['Day'] = null;
                }else{
                    $list[$key]['Day'] = intval(date("d", $start_time));
                }
                $list[$key]['MinPerson'] = null;
                $list[$key]['DateText'] = null;
                $list[$key]['Price'] = null;
                $list[$key]['IsBooking'] = false;
            }
            if(!$value['DateString']){
                $list[$key]['IsOtherMonth'] = true;
            }else{
                $list[$key]['IsOtherMonth'] = false;
            }
        }
        //返回
        $json = array(
            'BeginMonth' => intval(date("n", time())),
            'BeginYear' => intval(date("Y", time())),
            'EndMonth' => intval(date("n", time() + 10368000)),
            'EndYear' => intval(date("Y", time() + 10368000)),
            'MonthModel' => array(
                'Days' => $list,
                'HasDepartDate' => true,
                'Month' => intval(date("n", strtotime(date("$year-$month-01 00:00:00")))),
                'Year' => intval(date("Y", strtotime(date("$year-$month-01 00:00:00")))),
            )
        );
        echo Core_Fun::outputjson($json);
    }


    /*
     * 名师写生报名
     *
     * */
    public function sketch_applyAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $realname=$this->getParam("realname");
        $phone=$this->getParam("phone");
        $place=$this->getParam("place");
        $sketch_id=$this->getParam("sketch_id");

        //判断用户是否登录
        $uid = $_SESSION['userinfo']['uid'];
//        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( empty($realname) || empty($phone) || empty($place) || $sketch_id<=0 ){
            $json = array('status' => 0, 'tips' => '参数错误!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $sketch_info=C::M("sketch")->field("id,status")->where(" id={$sketch_id}")->find();
        if( !$sketch_info ){
            $json = array('status' => 0, 'tips' => '写生活动不存在!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( $sketch_info['status'] != 1 ){
            $json = array('status' => 0, 'tips' => '活动尚未开始报名或已过期!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //查看用户是否已经报名
        $is_apply=C::M("sketch_apply")->field("id")->where(" sketch_id= {$sketch_id} and user_id= {$uid} ")->find();
        if( $is_apply ){
            $json = array('status' => 0, 'tips' => '您已经报过名啦，感谢您的支持!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $data=array(
            "sketch_id"=>$sketch_id,
            "realname"=>$realname,
            "telephone"=>$phone,
            "remark"=>$place,
            "addtime"=>date("Y-m-d H:i:s",time()),
            "user_id"=>$uid
        );

        $res=C::M("sketch_apply")->add($data);
        if( $res ){
            $json = array('status' => 1, 'tips' => '报名成功，感谢您的支持!');
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' => '报名失败，请您重试!');
            echo Core_Fun::outputjson($json);
            exit;
        }

    }

    /*
 * 达人报名
 *
 * */
    public function star_applyAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $realname=$this->getParam("realname");
        $phone=$this->getParam("phone");
        $place=$this->getParam("place");
        $sketch_id=$this->getParam("sketch_id");

        //判断用户是否登录
        $uid = $_SESSION['userinfo']['uid'];
//        //查询是否登陆
        if(!$uid){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( empty($realname) || empty($phone) || empty($place) || $sketch_id<=0 ){
            $json = array('status' => 0, 'tips' => '参数错误!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $sketch_info=C::M("star_travel")->field("id,status")->where(" id={$sketch_id}")->find();
        if( !$sketch_info ){
            $json = array('status' => 0, 'tips' => '旅行活动不存在!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( $sketch_info['status'] != 1 ){
            $json = array('status' => 0, 'tips' => '活动尚未开始报名或已过期!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //查看用户是否已经报名
        $is_apply=C::M("star_travel_apply")->field("id")->where(" star_travel_id= {$sketch_id} and user_id= {$uid} ")->find();
        if( $is_apply ){
            $json = array('status' => 0, 'tips' => '您已经报过名啦，感谢您的支持!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $data=array(
            "star_travel_id"=>$sketch_id,
            "realname"=>$realname,
            "telephone"=>$phone,
            "remark"=>$place,
            "addtime"=>date("Y-m-d H:i:s",time()),
            "user_id"=>$uid
        );

        $res=C::M("star_travel_apply")->add($data);
        if( $res ){
            $json = array('status' => 1, 'tips' => '报名成功，感谢您的支持!');
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' => '报名失败，请您重试!');
            echo Core_Fun::outputjson($json);
            exit;
        }

    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }



}