<?php
/**
 * vpcvcms
 * 会员
 */
class Controller_Wap_User extends Core_Controller_WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
        if(!$_SESSION['userinfo']){
        	$this->showmsg('', 'index.php?m=wap&c=index&v=login', 0);
        	exit;
        }
        //我的关注
        $follow = C::M('follow')->where("uid = ".$this->userInfo['uid'])->limit('0,20')->select();
        $myfollow = array();
        $i = 0;
        foreach ($follow as $key => $value) {
        	$key = $key + 1;
        	$myfollow[$i][] = Core_Fun::getuiduserinfo($value['bid'], 'uid,username,headpic');
        	//if($key % 2 == 0){
        		$i = $i + 1;
        	//}
        	
        }

        //推荐达人
        $tjstar = C::M('user_member')->where("startop = 1")->order("rand()")->limit('0,8')->select();
        foreach ($tjstar as $key => $value) {
        	$tjstar[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
        $this->assign('ns', 'user');
        $this->assign('tjstar', $tjstar);
        $this->assign('myfollow', $myfollow);
	}

	//我的游记
	public function travelAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$Num = C::M('travel')->where("uid = $uid")->getCount();
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=index";
		$multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
		$list = C::M('travel')->where("uid = $uid")->order('addtime desc')->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
			$list[$key]['content'] = json_decode($value['content']);
          	$list[$key]['picnum'] = count(json_decode($value['content']));
			$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
		}
		$this->assign('list', $list);
		$this->assign('num', $Num);
		$this->assign ('multipage', $multipage);
        $this->display('wap/user/index.tpl');
	}

	//新版移动端个人中心-我的
    public function indexAction(){
        $uid = $this->userInfo['uid'];

        //获取用户信息
        $user = C::M('user_member')->field('uid,headpic,cover,exp,city,username,autograph')->where("uid = '$uid' and uid <> 1")->find();
        if($user){
            $user['avatar'] = $user['headpic']?$user['headpic']:'/resource/images/img-lb2.png';
            $user['cover'] = $user['cover']?$user['cover']:'/resource/images/s-ban1.jpg';
        }else{
            $this->showmsg('', 'index.php', 0);
            exit;
        }
        //获取等级
        $lv = C::M('lv')->where("exp <= ".$user['exp'])->order('id desc')->limit(0,1)->select();
        $user['lvname'] = $lv[0]['lvname'];

        //统计私信
        $message_total=C::M('msg_detail')->where("to_id = $uid and status = 0")->getCount();
        if( $message_total ){
            $this->assign('msg_total',$message_total);
        }

        $this->assign('user',$user);
        $this->display('wap/user/new_index.tpl');
    }

	//我的相册
	public function albumAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$sql = "Select FROM_UNIXTIME(addtime,'%Y%m%d') days from ##__travel where uid = $uid GROUP BY days desc";
		$num = Core_Db::fetchAll($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=album";
		$multipage = $this->multipages (count($num), $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select FROM_UNIXTIME(addtime,'%Y-%m-%d') days from ##__travel where uid = $uid GROUP BY days desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$start_time = strtotime($value['days'] . " 00:00:00");
        	$end_time=strtotime($value['days'] . " 23:59:59");
        	$sql = "Select content from ##__travel where uid = $uid and addtime between $start_time and $end_time order by id desc";
			$reslist = Core_Db::fetchAll($sql, false);
			$pics = '';
			foreach ($reslist as $k => $val) {
				$list[$key]['pics'][$k] = json_decode($val['content']);
				foreach ($list[$key]['pics'][$k] as $ke => $vals) {
					$pics .= $vals . '||';
				}
			}
			$list[$key]['days'] = $value['days'];
			$list[$key]['pics'] = explode('||', rtrim($pics, '||'));
		}
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/album.tpl');
	}

	//tv
	public function tvAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$sql = "Select FROM_UNIXTIME(addtime,'%Y%m%d') days from ##__tv where uid = $uid GROUP BY days desc";
		$num = Core_Db::fetchAll($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=tv";
		$multipage = $this->multipages (count($num), $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select FROM_UNIXTIME(addtime,'%Y-%m-%d') days from ##__tv where uid = $uid GROUP BY days desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$start_time = strtotime($value['days'] . " 00:00:00");
        	$end_time=strtotime($value['days'] . " 23:59:59");
        	$sql = "Select * from ##__tv where uid = $uid and addtime between $start_time and $end_time";
			$reslist = Core_Db::fetchAll($sql, false);
			$list[$key]['days'] = $value['days'];
			$list[$key]['list'] = $reslist;
		}
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/tv.tpl');
	}

	public function new_tvAction(){
        $perpage = 4;
        $uid = $this->userInfo['uid'];
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;
        $list=C::M("tv")->where("uid={$uid}")->order("addtime DESC")->limit($limit)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                C::M('tv')->where('id', $value['id'])->setInc('shownum', 1);
            }
            $this->assign("list",$list);
        }

        //total
        $total=$this->totalAction($uid);
        $this->assign("total",$total);

        //user info
        $user_info=C::M('user_member')->field('uid,headpic as avatar,username,autograph,city,cover')->where("uid={$uid}")->find();
        if(empty($user_info['avatar'])) $user_info['avatar']="/resource/images/img-lb2.png";
        $this->assign("user",$user_info);

        $this->display('wap/user/new_tv.tpl');
    }

	//草稿
	public function draftAction()
	{
		$list = C::M('draft')->where("uid = " . $this->userInfo['uid'])->order('id desc')->select();
		foreach ($list as $key => $value) {
          	if($value['type'] == 0){
            	$pic = json_decode($value['content']);
              	$list[$key]['pic'] = $pic['0']?$pic['0']:'/resource/images/s-pic1.jpg';
              	$list[$key]['url'] = '/index.php?m=wap&c=user&v=addtravel&type=' . $value['type'] . '&did=' . $value['id'];
            }elseif($value['type'] == 1){
              	$pic = explode('||', $value['content']);
              	$list[$key]['pic'] = $pic['0']?$pic['0']:'/resource/images/s-pic1.jpg';
				$list[$key]['url'] = '/index.php?m=wap&c=user&v=addtv&type=' . $value['type'] . '&did=' . $value['id'];
			}
			$list[$key]['title'] = $value['title']?$value['title']:'未命名草稿';
			$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
			
		}
		$this->assign('list', $list);
		$this->assign('num', count($list));
		$this->display('wap/user/draft.tpl');
	}

	//发布
	public function addtravelAction()
	{
        //获取access_token
        $this->wx_infoAction();
        
		$did = intval($this->getParam('did'));
		$type = intval($this->getParam('type'));
		if($did){
			$res = C::M('draft')->where("uid = " . $this->userInfo['uid'] . " and type = 0 and id = $did")->order('id desc')->find();
			$res['content'] = json_decode($res['content']);
            $res['str_content']=implode(',',$res['content']);
			$this->assign('res', $res);
			$this->assign('did', $did);
		}

		//百度ak,浏览器
        $key="l3rvDUNj68gCXNAjEnXtVI1RZSPYu1mv";
        $code=base64_encode($key);
        $this->assign("code",$code);
		$this->display('wap/user/addtravel.tpl');
	}


  
  	//编辑
	public function edittravelAction()
	{
	    //获取微信信息
        $this->wx_infoAction();

		$id = intval($this->getParam('id'));
		if($id){
			$res = C::M('travel')->where("uid = " . $this->userInfo['uid'] . " and id = $id")->find();
			$res['content'] = json_decode($res['content']);
            $res['str_content']=implode(',',$res['content']);
			$this->assign('res', $res);
			$this->assign('id', $id);
		}
        //百度ak,浏览器
        $key="l3rvDUNj68gCXNAjEnXtVI1RZSPYu1mv";
        $code=base64_encode($key);
        $this->assign("code",$code);
		$this->display('wap/user/edittravel.tpl');
	}

	//发布
	public function addtvAction()
	{
        //获取access_token
        $this->wx_infoAction();

		$did = intval($this->getParam('did'));
		$type = intval($this->getParam('type'));
		if($did){
			$res = C::M('draft')->where("uid = " . $this->userInfo['uid'] . " and type = 1 and id = $did")->order('id desc')->find(); 
			$content = explode('||', $res['content']);
			$res['pic'] = $content[0];
			$res['url'] = $content[1];
			$this->assign('res', $res);
			$this->assign('did', $did);
		}

        //百度ak,浏览器
        $key="l3rvDUNj68gCXNAjEnXtVI1RZSPYu1mv";
        $code=base64_encode($key);
        $this->assign("code",$code);
		$this->display('wap/user/addtv.tpl');
	}
  
  	//编辑
	public function edittvAction()
	{
        //获取access_token
        $this->wx_infoAction();

		$id = intval($this->getParam('id'));
		if($id){
			$res = C::M('tv')->where("uid = " . $this->userInfo['uid'] . " and id = $id")->find();
			$this->assign('res', $res);
			$this->assign('id', $id);
		}
        //百度ak,浏览器
        $key="l3rvDUNj68gCXNAjEnXtVI1RZSPYu1mv";
        $code=base64_encode($key);
        $this->assign("code",$code);
		$this->display('wap/user/edittv.tpl');
	}

	//关注
	public function followAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'));
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$sql = "Select count(*) as num from ##__follow as f left join ##__user_member as u on u.uid = f.bid where f.uid = " . $this->userInfo['uid'] . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=follow&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__follow as f left join ##__user_member as u on u.uid = f.bid where f.uid = " . $this->userInfo['uid'] . "$where order by f.id desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/follow.tpl');
	}

	//粉丝
	public function fansAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'));
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$sql = "Select count(*) as num from ##__follow as f left join ##__user_member as u on u.uid = f.uid where f.bid = " . $this->userInfo['uid'] . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=fans&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__follow as f left join ##__user_member as u on u.uid = f.uid where f.bid = " . $this->userInfo['uid'] . "$where order by f.id desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/fans.tpl');
	}

	//访客
	public function visitorAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'));
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$sql = "Select count(*) as num from ##__visitor as v left join ##__user_member as u on u.uid = v.uid where v.bid = " . $this->userInfo['uid'] . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=wap&c=user&v=visitor&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__visitor as v left join ##__user_member as u on u.uid = v.uid where v.bid = " . $this->userInfo['uid'] . "$where order by v.lasttime desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/visitor.tpl');
	}
  
  	//查找好友
  	public function findfriendsAction()
    {
    	$keys = htmlspecialchars($this->getParam('keys'));
      	$where = "uid <> 1";
		if($keys){
			$where .= " and username like '%$keys%'";
		}
      	$perpage = 20;
        $num = C::M('user_member')->where($where)->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=wap&c=user&v=findfriends&keys=$keys";
        $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
        $list = C::M('user_member')->where($where)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
          	$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
		$this->assign('keys', $keys);
      	$this->assign('num', $num);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('wap/user/findfriends.tpl');
    }

	//设置
	public function settingAction()
	{
		$numerical = 0;
		if($this->userInfo['username'] != ''){
			$numerical += 20;
		}
		if($this->userInfo['sex'] != ''){
			$numerical += 20;
		}
		if($this->userInfo['city'] != ''){
			$numerical += 20;
		}
		if($this->userInfo['birthday'] != ''){
			$numerical += 20;
		}
		if($this->userInfo['autograph'] != ''){
			$numerical += 20;
		}
		$this->assign('numerical', $numerical);
		$this->display('wap/user/setting.tpl');
	}

	//头像
	public function avatarAction()
	{
		$this->display('wap/user/avatar.tpl');
	} 
  
  	//封面
	public function coverAction()
	{
		$this->display('wap/user/cover.tpl');
	} 

	//私信
	public function msgAction()
	{
		$uid = $_SESSION['userinfo']['uid'];
		$sql = "Select * from ##__msg where form_id = $uid or to_id = $uid";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			if($value['form_id'] == $uid){
				$list[$key]['toid'] = $value['to_id'];
			}
			if($value['to_id'] == $uid){
				$list[$key]['toid'] = $value['form_id'];
			}
			//查询最后一条记录
			$sql = "Select * from ##__msg_detail where mid = $value[id] order by id desc";
			$lastone = Core_Db::fetchOne($sql, false);
			$list[$key]['lastcontent'] = $lastone['content'];
			$list[$key]['lastaddtime'] = date('Y-m-d H:i:s', $lastone['addtime']);
			$list[$key]['weidunum'] = C::M('msg_detail')->where("mid = $value[id] and to_id = $uid and status = 0")->getCount();
		}
		$this->assign('list', $list);
		$this->display('wap/user/msg.tpl');
	}

	//私信详情
	public function msgdetailAction()
	{
		$mid = intval($this->getParam('mid'));
		$uid = $_SESSION['userinfo']['uid'];
		$msg = C::M('msg')->where("form_id = $uid and id = $mid or to_id = $uid and id = $mid")->find();
		if(!$msg || !$mid){
			$this->showmsg('没有权限', 'index.php?m=index&c=user&v=msg', 2);
            exit;
		} 
		if($msg['form_id'] == $uid){
			$msg['toid'] = $msg['to_id'];
		}else{
			$msg['toid'] = $msg['form_id'];
		}
		$list = C::M('msg_detail')->where("mid = $mid")->select();
		foreach ($list as $key => $value) {
			if($value['form_id'] == $uid){
				$list[$key]['isme'] = 1;
			}else{
				$list[$key]['isme'] = 0;
			} 
			$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
			$list[$key]['content'] = Core_Fun::ubbreplace($value['content']);
			if($value['status'] == 0){
				C::M('msg_detail')->where("id = $value[id] and to_id = $uid")-> setField ('status', 1);
			}
		}
		$this->assign('list', $list);
		$this->assign('msg', $msg);
		$this->display('wap/user/msgdetail.tpl');
	}

	//退出登陆
	public function logoutAction()
	{
		unset($_SESSION['userinfo']);
		$url = $_SERVER['HTTP_REFERER'];
		header("location:$url");
	}

	/*
	 * 获取access_token之类信息
	 * */
	private function wx_infoAction()
    {
        //获取access_token
        if( !isset($_SESSION['access_token']) ){
            Core_Fun::wx_get_token();
        }

        $timestamp=time();
        $wxnonceStr="hezhihuishidatiancai".time();
        $url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //微信接口部分
        $wxticket = Core_Fun::wx_get_jsapi_ticket();
        $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
            $wxticket, $wxnonceStr, $timestamp, $url);

        $wxSha1 = sha1($wxOri);
        $this->assign('appid','wx9953ad5ae1108b51');
        $this->assign('timestamp', $timestamp);
        $this->assign('nonceStr', $wxnonceStr);
        $this->assign('signature', $wxSha1);
    }

    /*
     * 统计日志，视频，游记，问题总数
     * */
    protected function totalAction($uid)
    {
        $data=array();
        //日志
        $travel_num=0;
        $travel_num=C::M('travel')->where("uid={$uid}")->getCount();
        $data['travel_num']=$travel_num;

        //视频
        $tv_num=0;
        $tv_num=C::M('tv')->where("uid={$uid}")->getCount();
        $data['tv_num']=$tv_num;

        //游记
        $note_num=0;
        $note_num=C::M('travel_note')->where("uid={$uid}")->getCount();
        $data['note_num']=$note_num;

        //问答，暂时没有，0
        $answer=0;
        $data['answer']=$answer;

        return $data;

    }


}