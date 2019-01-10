<?php
class Controller_Index_Muser extends Core_Controller_TAction
{
    public function preDispatch() 
    {
        parent::preDispatch();
        $uid = $this->getParam('id');
        $user = C::M('user_member')->where("uid = '$uid' and uid <> 1")->find();
        $this->user = $user;
        if($user){
            $user['avatar'] = $user['headpic']?$user['headpic']:'/resource/images/img-lb2.png';
          	$user['cover'] = $user['cover']?$user['cover']:'/resource/images/s-ban1.jpg';
            if( !empty($user['tag']) ){
                $user['tag']=explode("/",$user['tag']);
            }
        }else{
        	$this->showmsg('', 'index.php', 0);
        	exit;
        }
        //获取等级
        $lv = C::M('lv')->where("exp <= ".$user['exp'])->order('id desc')->limit(0,1)->select();
        $user['lvname'] = $lv[0]['lvname'];
        //他的关注
        $follow = C::M('follow')->where("uid = $uid")->limit('0,20')->select();
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

        if($_SESSION['userinfo']['uid'] && $_SESSION['userinfo']['uid'] != $uid){
        	$isvisitor = C::M('visitor')->where("uid = ".$_SESSION['userinfo']['uid']." and bid = $uid")->find();
	        if(!$isvisitor){
	        	$data = array(
	        		'uid' => $_SESSION['userinfo']['uid'],
	        		'bid' => $uid,
	        		'lasttime' => time()
	        	);
	        	C::M('visitor')->add($data);
	        }else if($isvisitor){
	        	C::M('visitor')->where("uid = ".$_SESSION['userinfo']['uid']." and bid = $uid")->update(array('lasttime' => time()));
	        }
        }

        $this->assign('ns', 'muser');
        $this->assign('muser', $user);
        $this->assign('tjstar', $tjstar);
        $this->assign('myfollow', $myfollow);
    }

    public function indexAction()
    {
    	$perpage = 10;
		$uid = $this->user['uid'];
		$Num = C::M('travel')->where("uid = $uid and status = 1")->getCount();
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=index&id=$uid";
		$multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
		$list = C::M('travel')->where("uid = $uid and status = 1")->order('addtime desc')->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
			$list[$key]['content'] = json_decode($value['content']);
          	$list[$key]['picnum'] = count(json_decode($value['content']));
			$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
		}
		$this->assign('list', $list);
		$this->assign('num', $Num);
		$this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display('muser/index.tpl');
    }

    //相册
	public function albumAction()
	{
		$perpage = 10;
		$uid = $this->user['uid'];
		$sql = "Select FROM_UNIXTIME(addtime,'%Y%m%d') days from ##__travel where uid = $uid and status = 1 GROUP BY days desc";
		$num = Core_Db::fetchAll($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=album&id=$uid";
		$multipage = $this->multipages (count($num), $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select FROM_UNIXTIME(addtime,'%Y-%m-%d') days from ##__travel where uid = $uid and status = 1 GROUP BY days desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$start_time = strtotime($value['days'] . " 00:00:00");
        	$end_time=strtotime($value['days'] . " 23:59:59");
        	$sql = "Select content from ##__travel where uid = $uid and status = 1 and addtime between $start_time and $end_time order by id desc";
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
		$this->display('muser/album.tpl');
	}

	//tv
	public function tvAction()
	{
		$perpage = 10;
		$uid = $this->user['uid'];
		$num = C::M('tv')->where("uid = $uid and status=1")->getCount();
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=tv&id=$uid";
		$multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
        $list = C::M('tv')->where("uid = $uid and status=1")->order('addtime desc')->limit($limit)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
            }
            $this->assign("list",$list);
        }
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$num,'total_page'=>ceil($num/$perpage),'cur_page'=>$curpage));
		$this->display('muser/tv.tpl');
	}

	//关注
	public function followAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'),ENT_QUOTES);
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$uid = $this->user['uid'];
		$sql = "Select count(*) as num from ##__follow as f left join ##__user_member as u on u.uid = f.bid where f.uid = " . $uid . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=follow&id=$uid&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__follow as f left join ##__user_member as u on u.uid = f.bid where f.uid = " . $uid . "$where order by f.id desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('muser/follow.tpl');
	}

	//粉丝
	public function fansAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'),ENT_QUOTES);
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$uid = $this->user['uid'];
		$sql = "Select count(*) as num from ##__follow as f left join ##__user_member as u on u.uid = f.uid where f.bid = " . $uid . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=fans&id=$uid&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__follow as f left join ##__user_member as u on u.uid = f.uid where f.bid = " . $uid . "$where order by f.id desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('muser/fans.tpl');
	}

	//访客
	public function visitorAction()
	{
		$keys = htmlspecialchars($this->getParam('keys'),ENT_QUOTES);
		if($keys){
			$where = " and u.username like '%$keys%'";
		}
		$perpage = 20;
		$uid = $this->user['uid'];
		$sql = "Select count(*) as num from ##__visitor as v left join ##__user_member as u on u.uid = v.uid where v.bid = " . $uid . "$where";
		$Num = Core_Db::fetchOne($sql, false);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = "index.php?m=index&c=muser&v=visitor&id=$uid&keys=$keys";
		$multipage = $this->multipages ($Num['num'], $perpage, $curpage, $mpurl);
		$limit = $perpage * ($curpage - 1) . "," . $perpage;
		$sql = "Select u.uid,u.username,u.headpic from ##__visitor as v left join ##__user_member as u on u.uid = v.uid where v.bid = " . $uid . "$where order by v.lasttime desc limit $limit";
		$list = Core_Db::fetchAll($sql, false);
		foreach ($list as $key => $value) {
			$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
		}
		$this->assign('keys', $keys);
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('muser/visitor.tpl');
	}

	//TA的游记
    public function travel_noteAction()
    {
        $perpage = 10;
        $uid = $this->getParam("id");
        if( !$uid ){
            $this->showmsg('数据不存在，跳转中...', '', 2);
        }
        $num = C::M("travel_note")->where("uid={$uid} and status =1 ")->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=muser&v=travel_note&id={$uid}";
        $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
        $mdl=new Model_TravelNote();
        $list =$mdl->font_get_info($uid,$curpage,10,1);
        if( $list ){
            foreach($list as $key=>$value){
                $list[$key]['headpic']=$list[$key]['headpic']??'/resource/images/img-lb2.png';
            }
        }

        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$num,'total_page'=>ceil($num/$perpage),'cur_page'=>$curpage));
        $this->display("muser/travel_list.tpl");
    }

    //新版-我TA的问答
    public function ta_faqAction()
    {
        $perpage = 10;
        $uid = $this->getParam("id");
        if( !$uid ){
            $this->showmsg('数据不存在，跳转中...', '', 2);
        }
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $type=$this->getParam('type')??1;
        $limit = $perpage * ($curpage - 1) . "," . $perpage;
        if( $type==1 ){
            $list = C::M('faq')->where("uid = $uid")->order('addtime desc')->limit($limit)->select();
            $mpurl = "index.php?m=index&c=muser&v=ta_faq&type=1&id={$uid}";
            $Num=C::M('faq')->where("uid = {$uid}")->getCount();
        }else{
            $list=C::M('faq as a')->field('a.*,b.addtime as response_time')->join('##__faq_response as b','a.id=b.faq_id','left')->where("b.uid={$uid}")->order("b.addtime desc")->limit($limit)->select();
            $mpurl = "index.php?m=index&c=muser&v=ta_faq&type=2&id={$uid}";
            $Num=C::M('faq_response')->where("uid = {$uid}")->getCount();
        }
        if( $list ){
            foreach ($list as $key=>$value){
                C::M('faq')->where('id', $value['id'])->setInc('show_num', 1);
                if( trim($value['label']) ){
                    $list[$key]['label']=explode("/",$value['label']);
                }
            }
            $this->assign('list', $list);
        }

        //total
        $total=$this->totalAction($uid);
        $this->assign("total",$total);

        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $this->assign('type',$type);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage)));
        $this->display('muser/ta_faq.tpl');
    }

    /*
* 统计日志，视频，游记，问题总数
* */
    protected function totalAction($uid)
    {
        $data=array();
        //日志
        $travel_num=0;
        $travel_num=C::M('travel')->where("uid={$uid} and status=1")->getCount();
        $data['travel_num']=$travel_num;

        //视频
        $tv_num=0;
        $tv_num=C::M('tv')->where("uid={$uid} and status=1")->getCount();
        $data['tv_num']=$tv_num;

        //游记
        $note_num=0;
        $note_num=C::M('travel_note')->where("uid={$uid} and status=1")->getCount();
        $data['note_num']=$note_num;

        //问答，暂时没有，0
        $answer=0;
        $answer=C::M('faq')->where("uid={$uid} and status=1")->getCount();
        $data['faq_num']=$answer;

        return $data;

    }

}