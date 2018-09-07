<?php
/**
 * vpcvcms
 * 会员
 */
class Controller_Index_User extends Core_Controller_TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
        if(!$_SESSION['userinfo']){
        	$this->showmsg('', 'index.php?m=index&c=index&v=login', 0);
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
	public function indexAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$Num = C::M('travel')->where("uid = $uid")->getCount();
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=user&v=index";
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
        $this->display('user/index.tpl');
	}

	//我的相册
	public function albumAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$sql = "Select FROM_UNIXTIME(addtime,'%Y%m%d') days from ##__travel where uid = $uid GROUP BY days desc";
		$num = Core_Db::fetchAll($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=user&v=album";
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
		$this->display('user/album.tpl');
	}

	//tv
	public function tvAction()
	{
		$perpage = 10;
		$uid = $this->userInfo['uid'];
		$sql = "Select FROM_UNIXTIME(addtime,'%Y%m%d') days from ##__tv where uid = $uid GROUP BY days desc";
		$num = Core_Db::fetchAll($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=user&v=tv";
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
		$this->display('user/tv.tpl');
	}

	//我的游记
    public function travelAction()
    {
        $perpage = 10;
        $uid = $this->userInfo['uid'];
        $num = C::M("travel_note")->where("uid={$uid}")->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=user&v=travel";
        $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
        $mdl=new Model_TravelNote();
        $list =$mdl->font_get_info($uid,$curpage,10);
        if( $list ){
            foreach($list as $key=>$value){
                $list[$key]['headpic']=$list[$key]['headpic']??'/resource/images/img-lb2.png';
            }
        }

        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->display("user/travel_list.tpl");
    }

	//草稿
	public function draftAction()
	{
		$list = C::M('draft')->where("uid = " . $this->userInfo['uid'])->order('id desc')->select();
		foreach ($list as $key => $value) {
          	if($value['type'] == 0){
            	$pic = json_decode($value['content']);
              	$list[$key]['pic'] = $pic['0']?$pic['0']:'/resource/images/s-pic1.jpg';
              	$list[$key]['url'] = '/index.php?m=index&c=user&v=addtravel&type=' . $value['type'] . '&did=' . $value['id'];
            }elseif($value['type'] == 1){
              	$pic = explode('||', $value['content']);
              	$list[$key]['pic'] = $pic['0']?$pic['0']:'/resource/images/s-pic1.jpg';
				$list[$key]['url'] = '/index.php?m=index&c=user&v=addtv&type=' . $value['type'] . '&did=' . $value['id'];
			}else if( $value['type'] == 2){
                $pic = explode('||', $value['content']);
                $list[$key]['pic'] = $pic['0']?$pic['0']:'/resource/images/s-pic1.jpg';
                $list[$key]['url'] = '/index.php?m=index&c=user&v=travel_note&type=' . $value['type'] . '&did=' . $value['id'];
            }
			$list[$key]['title'] = $value['title']?$value['title']:'未命名草稿';
			$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
			
		}
		$this->assign('list', $list);
		$this->assign('num', count($list));
		$this->display('user/draft.tpl');
	}

	//发布
	public function addtravelAction()
	{
		$did = intval($this->getParam('did'));
		$type = intval($this->getParam('type'));
		if($did){
			$res = C::M('draft')->where("uid = " . $this->userInfo['uid'] . " and type = 0 and id = $did")->order('id desc')->find();
			$res['json_content']=$res['content'];
            $res['content'] = json_decode($res['content']);
			$this->assign('res', $res);
			$this->assign('did', $did);
		}
		$this->display('user/addtravel.tpl');
	}
  
  	//编辑
	public function edittravelAction()
	{
		$id = intval($this->getParam('id'));
		if($id){
			$res = C::M('travel')->where("uid = " . $this->userInfo['uid'] . " and id = $id")->find();
            $res['json_content']=$res['content'];
			$res['content'] = json_decode($res['content']);
			$this->assign('res', $res);
			$this->assign('id', $id);
		}
		$this->display('user/edittravel.tpl');
	}

	//发布
	public function addtvAction()
	{
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
		$this->display('user/addtv.tpl');
	}
  
  	//编辑
	public function edittvAction()
	{
		$id = intval($this->getParam('id'));
		if($id){
			$res = C::M('tv')->where("uid = " . $this->userInfo['uid'] . " and id = $id")->find();
			$this->assign('res', $res);
			$this->assign('id', $id);
		}
		$this->display('user/edittv.tpl');
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
		$mpurl = "index.php?m=index&c=user&v=follow&keys=$keys";
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
		$this->display('user/follow.tpl');
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
		$mpurl = "index.php?m=index&c=user&v=fans&keys=$keys";
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
		$this->display('user/fans.tpl');
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
		$mpurl = "index.php?m=index&c=user&v=visitor&keys=$keys";
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
		$this->display('user/visitor.tpl');
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
        $mpurl = "index.php?m=index&c=user&v=findfriends&keys=$keys";
        $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
        $list = C::M('user_member')->where($where)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
          	$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
		$this->assign('keys', $keys);
      	$this->assign('num', $num);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('user/findfriends.tpl');
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
		$this->display('user/setting.tpl');
	}

	//头像
	public function avatarAction()
	{
		$this->display('user/avatar.tpl');
	} 
  
  	//封面
	public function coverAction()
	{
		$this->display('user/cover.tpl');
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
		$this->display('user/msg.tpl');
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
		$this->display('user/msgdetail.tpl');
	}

	//退出登陆
	public function logoutAction()
	{
		unset($_SESSION['userinfo']);
		$url = $_SERVER['HTTP_REFERER'];
		header("location:$url");
	}

	//游记
    public function travel_noteAction()
    {
        $did = intval($this->getParam('did'));
        $type = intval($this->getParam('type'));
        if($did){
            $res = C::M('draft')->where("uid = " . $this->userInfo['uid'] . " and type = 2 and id = $did")->order('id desc')->find();
            $content = explode('||', $res['content']);
            $res['pic'] = $content[0];
            $res['content'] = $content[1];
            $this->assign('res', $res);
            $this->assign('did', $did);
        }

        //设置cookie，加密ID
        $uid = $_SESSION['userinfo']['uid'];
        $id_code=urlencode(base64_encode("travel_note_{$uid}"));
        setcookie('travel_note',$id_code,time()+3600);
        $this->display("user/travel_note.tpl");
    }

    //编辑游记
    public function edit_travel_noteAction()
    {
        $id=$this->getParam("id");
        if( $id ){
            $mdl=new Model_TravelNote();
            $info=$mdl->front_info($id);
            if( !$info ){
                $this->showmsg('数据不存在，跳转中...', '/index.php?m=index&c=user&v=index', 2);
            }
            $this->assign("info",$info);
        }else{
            $this->showmsg('非法操作，跳转中...', '/index.php?m=index&c=user&v=index', 2);
        }

        //设置cookie，加密ID
        $uid = $_SESSION['userinfo']['uid'];
        $id_code=urlencode(base64_encode("travel_note_{$uid}"));
        setcookie('travel_note',$id_code,time()+3600);
        $this->display("user/travel_note_edit.tpl");
    }




}