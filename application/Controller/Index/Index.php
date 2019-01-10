<?php
/**
 * vpcvcms
 * 网站首页
 */
class Controller_Index_Index extends Core_Controller_TAction
{
    public function preDispatch() 
    {
        parent::preDispatch();
    }

    public function old_indexAction()
    {
        //达人邦
        $starlist = C::M('travel')->where("status = 1 and istop = 1")->order('toptime desc,id desc')->limit('0,2')->select();
        foreach ($starlist as $key => $value) {
            C::M('travel')->where('id', $value['id'])->setInc('shownum', 1);
            $starlist[$key]['describes'] = Core_fun::cn_substr(strip_tags($value['describes']),320,'...');
            $starlist[$key]['content'] = json_decode($value['content']);
            $starlist[$key]['addtime'] = date('Y-m-d', $value['addtime']);
        }

        //油画
        $scenery = C::M('scenery')->where("istop = 1")->limit("0,3")->order("id desc")->select();
        foreach ($scenery as $key => $value) {
            C::M('scenery')->where('id', $value['id'])->setInc('show_num', 1);
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $scenery[$key]['name'] = $user['name'];
        }

        //旅拍tv
        $tv = C::M('tv')->where("istop = 1 and status = 1")->limit("0,4")->order("id desc")->select();

        //标签,独家旅行
        $label_list=C::M("journey_label")->field("*")->where("status =1")->select();
        if( $label_list ){
            $this->assign("label_list",$label_list);

            $journey_info=array();
            foreach($label_list as $key=>$value){
                $one=array();
                $info=C::M("article_article")->field("id,title,description,tjpic")->where("label_id={$value['id']} and useable =1")->limit("0,2")->select();
                $one['pics']=$value['pics'];
                $one['title']=$value['title'];
                $one['desc']=$value['desc'];
                $one['info']=$info;
                $journey_info[]=$one;
            }
//            var_dump($journey_info);die();
            if( $journey_info ){
                $this->assign("journey_info",$journey_info);
            }
        }

        //达人带你去旅行
        $travel_mdl=new Model_StarTravel();
        $travel_info=$travel_mdl->get_living_sketch(2);
        if( $travel_info ){
            foreach( $travel_info as $key=>$value ){

                if( $value['autograph'] ){
                    $travel_info[$key]['autograph']=Core_fun::cn_substr(strip_tags($value['autograph']),320,'...');
                }

            }
            $this->assign("travel_info",$travel_info);
        }

        //名师带你去写生
        $sketch_mdl=new Model_Sketch();
        $sketch_list=$sketch_mdl->get_living_sketch(2);
        if( $sketch_list ){
            foreach( $sketch_list as $key=>$value ){
                if( $value['label'] ){
                    $label_arr=array();
                    $label_arr=explode(",",$value['label']);
                    $sketch_list[$key]['label']=$label_arr;
                }

                if( $value['introduction'] ){
                    $sketch_list[$key]['introduction']=Core_fun::cn_substr(strip_tags($value['introduction']),320,'...');
                }

            }
            $this->assign("sketch_list",$sketch_list);
        }

        //日月潭
        $y = intval($this->getParam('y')) ? intval($this->getParam('y')) : date('Y');
        $dy = date('Y');
        $dm = date('n');
        if($y > $dy){
            $y = $dy;
        }elseif($y < 2010){
            $y = 2010;
        }
        $list = array();
        if($dy == $y){
            $list = $this->rl_one($y, $dy, $dm);
        }else{
            $list = $this->rl_one($y);
        }

        for($i=1;$i<=$dm;$i++){
            $month_arr[$i]=$i;
        }
        $this->assign("month_arr",$month_arr);


        //流量统计
        $traffic=C::M("traffic_number")->where("id=1")->field('visit_num,customer_num,platform_num')->find();
        if( $traffic ){
            //获取四个随机用户头像
            $customer=C::M("user_member")->field("uid,headpic")->where("uid >= ((SELECT MAX(uid) FROM g_user_member)-(SELECT MIN(uid) FROM g_user_member)) * RAND() + (SELECT MIN(uid) FROM g_user_member)")->limit("0,4")->select();
            $star=C::M("user_member")->field("uid,headpic")->where("startop =1 and uid >= ((SELECT MAX(uid) FROM g_user_member)-(SELECT MIN(uid) FROM g_user_member)) * RAND() + (SELECT MIN(uid) FROM g_user_member)")->limit("0,4")->select();
            $traffic['customer_head']=$customer;
            $traffic['star_head']=$star;
            $this->assign("traffic",$traffic);
        }

        $this->assign('y', $y);
        $this->assign('list', $list);
        $this->assign('year', date('Y'));
        $this->assign('month', date('n'));

        $this->assign('starlist', $starlist);
        $this->assign('scenery', $scenery);
        $this->assign('tv', $tv);
        $this->display('index/index.tpl');
    }

    public function indexAction()
    {
        //达人邦,获取首先是达人，weektop=1 and 推荐图tjpic IS NOT NULL
        $tj_star=C::M('user_member')->field('uid,username,autograph,tjpic')->where("startop = 1 and weektop=1")->order('sort ASC,uid desc')->limit(0,6)->select();
        if( $tj_star ){
            $this->assign("tj_star",$tj_star);
        }

        //达人日志
        $starlist = C::M('travel')->where("status = 1 and istop = 1")->order('toptime desc,id desc')->limit('0,2')->select();
        foreach ($starlist as $key => $value) {
            $starlist[$key]['content'] = json_decode($value['content']);
            $starlist[$key]['addtime'] = date('Y-m-d', $value['addtime']);
            $starlist[$key]['describes']=Core_Fun_Encode::mynl2br($value['describes']);
        }

        //旅拍tv
        $tv = C::M('tv')->where("istop = 1 and status = 1")->limit("0,4")->order("id desc")->select();

        //独家旅行
        $journey_info=array();
        $journey_info=C::M("article_article as a")->field("a.id,a.title,a.tjpic as articlethumb,b.price ")->join('##__base_module_journey as b','a.id=b.aid','left')->where("a.useable =1")->limit("0,7")->select();
        $this->assign('journey_info',$journey_info);

        //日月潭
        $y = intval($this->getParam('y')) ? intval($this->getParam('y')) : date('Y');
        $dy = date('Y');
        $dm = date('n');
        if($y > $dy){
            $y = $dy;
        }elseif($y < 2010){
            $y = 2010;
        }
        $list = array();
        if($dy == $y){
            $list = $this->rl_one($y, $dy, $dm);
        }else{
            $list = $this->rl_one($y);
        }

        for($i=1;$i<=$dm;$i++){
            $month_arr[$i]=$i;
        }
        $this->assign("month_arr",$month_arr);

        //流量统计
        $traffic=C::M("traffic_number")->where("id=1")->field('visit_num,customer_num,platform_num')->find();
        if( $traffic ){
            //获取四个随机用户头像
            $customer=C::M("user_member")->field("uid,headpic")->where("uid >= ((SELECT MAX(uid) FROM g_user_member)-(SELECT MIN(uid) FROM g_user_member)) * RAND() + (SELECT MIN(uid) FROM g_user_member)")->limit("0,4")->select();
            $star=C::M("user_member")->field("uid,headpic")->where("startop =1 and uid >= ((SELECT MAX(uid) FROM g_user_member)-(SELECT MIN(uid) FROM g_user_member)) * RAND() + (SELECT MIN(uid) FROM g_user_member)")->limit("0,4")->select();
            $traffic['customer_head']=$customer;
            $traffic['star_head']=$star;
            $this->assign("traffic",$traffic);
        }

        $this->assign('y', $y);
        $this->assign('list', $list);
        $this->assign('year', date('Y'));
        $this->assign('month', date('n'));

        $this->assign('starlist', $starlist);
        $this->assign('tv', $tv);
        $this->display('index/new_index.tpl');
    }

    public function noneAction()
    {
        $this->display('index/none.tpl');
    }
  
  	//搜索
  	public function searchAction()
    {
    	$keyword = trim(htmlspecialchars($this->getParam('keyword'),ENT_QUOTES));
      	if(!$keyword){
          	$this->showmsg('', '', 0);
        }
      	//总数
      	$num = 0;
      	//查询日阅潭
        $where = "title like '%$keyword%' or content like '%$keyword%'";
        $num = C::M('ryt')->where($where)->getCount() + $num;
        $ryt = C::M('ryt')->field('id,title,content,shownum,show_time,pics')->where($where)->order('id desc')->limit(0,4)->select();
      	foreach ($ryt as $key => $value) {
          	$ryt[$key]['pics'] = $value['pics']?$value['pics']:'/resource/images/default.jpg';
          	$ryt[$key]['title'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', $value['title']);
          	$ryt[$key]['content'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', Core_fun::cn_substr(strip_tags($value['content']),180,'...'));
          	$ryt[$key]['addtime'] = date('Y-m-d', $value['show_time']);
        }
      	//甄选之旅
      	$num = C::M('article')->where("catid = 17 and useable = 1 and title like '%$keyword%'")->getCount() + $num;
      	$journey = C::M('article')->where("catid = 17 and useable = 1 and title like '%$keyword%'")->limit(0,6)->select();
      	foreach ($journey as $key => $value) {
      		$extends = C::M('module')->mtable($value['moduleid'])->queryOne('*', array(array('aid', $value['id'])));
        	$journey[$key]['extend'] = $extends;
        }
      	//达人邦
      	$num = C::M('travel')->where("status = 1 and describes like '%$keyword%'")->getCount() + $num;
      	$star = C::M('travel')->where("status = 1 and describes like '%$keyword%'")->order('id desc')->limit(0,5)->select();
        foreach ($star as $key => $value) {
            $star[$key]['addtime'] = date('Y年m月d日', $value['addtime']);
        }
      	//旅拍TV
      	$num = C::M('tv')->where("status = 1 and describes like '%$keyword%'")->getCount() + $num;
      	$tv = C::M('tv')->where("status = 1 and describes like '%$keyword%'")->order('id desc')->limit(0,5)->select();
        foreach ($tv as $key => $value) {
            $tv[$key]['addtime'] = date('Y年m月d日', $value['addtime']);
        }
      	//名家
      	$num = C::M('writer')->where("name like '%$keyword%'")->getCount() + $num;
      	$writer = C::M('writer')->where("name like '%$keyword%'")->limit("0,4")->order("id desc")->select();
        foreach ($writer as $key => $value) {
            $writer[$key]['introduction'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', Core_fun::cn_substr(strip_tags($value['introduction']),580,'...'));
        }
      	//用户
      	$num = C::M('user_member')->where("username like '%$keyword%'")->getCount() + $num;
      	$userlist = C::M('user_member')->where("username like '%$keyword%'")->limit("0,8")->order("uid desc")->select();
      	foreach ($userlist as $key => $value) {
          	$lv = C::M('lv')->where("exp <= ".$value['exp'])->order('id desc')->limit(0,1)->select();
            $userlist[$key]['lvname'] = $lv[0]['lvname'];
          	$userlist[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
      	$this->assign('ns', 'search');
      	$this->assign('keyword', $keyword);
      	$this->assign('num', $num);
      	$this->assign ('ryt', $ryt);
      	$this->assign ('journey', $journey);
      	$this->assign ('star', $star);
      	$this->assign ('tv', $tv);
      	$this->assign ('writer', $writer);
      	$this->assign ('userlist', $userlist);
        $this->display('index/search.tpl');
    }
  
  	//搜索更多
 	public function searchmoreAction()
    {
      	$type = trim(htmlspecialchars($this->getParam('type'),ENT_QUOTES));
      	$keyword = trim(htmlspecialchars($this->getParam('keyword'),ENT_QUOTES));
      	if(!$keyword || !$type){
          	$this->showmsg('', '', 0);
        }
      	$perpage = 20; 
      	if($type == 'ryt'){
            $where = "title like '%$keyword%' or content like '%$keyword%'";
            $num = C::M('ryt')->where($where)->getCount();
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = "index.php?m=index&c=index&v=searchmore&type=ryt&keyword=$keyword";
            $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
            $list = C::M('ryt')->where($where)->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach ($list as $key => $value) {
              	$list[$key]['pics'] = $value['pics']?$value['pics']:'/resource/images/default.jpg';
              	$list[$key]['title'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', $value['title']);
              	$list[$key]['content'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', Core_fun::cn_substr(strip_tags($value['content']),180,'...'));
              	$list[$key]['addtime'] = date('Y-m-d', $value['show_time']);
          	}
        }
      	if($type == 'star'){
            $where = "status = 1 and describes like '%$keyword%'";
            $num = C::M('travel')->where($where)->getCount();
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = "index.php?m=index&c=index&v=searchmore&type=star&keyword=$keyword";
            $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
            $list = C::M('travel')->where($where)->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach ($list as $key => $value) {
              	$list[$key]['addtime'] = date('Y年m月d日', $value['addtime']);
          	}
        }
      	if($type == 'tv'){
        	$where = "status = 1 and describes like '%$keyword%'";
            $num = C::M('tv')->where($where)->getCount();
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = "index.php?m=index&c=index&v=searchmore&type=tv&keyword=$keyword";
            $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
            $list = C::M('tv')->where($where)->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach ($list as $key => $value) {
              	$list[$key]['addtime'] = date('Y年m月d日', $value['addtime']);
          	}
        }
      	if($type == 'writer'){
        	$where = "name like '%$keyword%'";
            $num = C::M('writer')->where($where)->getCount();
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = "index.php?m=index&c=index&v=searchmore&type=writer&keyword=$keyword";
            $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
            $list = C::M('writer')->where($where)->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach ($list as $key => $value) {
              	$list[$key]['introduction'] = str_replace($keyword, '<font color="red">'.$keyword.'</font>', Core_fun::cn_substr(strip_tags($value['introduction']),580,'...'));
          	}
        }
      	if($type == 'user'){
        	$where = "username like '%$keyword%'";
            $num = C::M('user_member')->where($where)->getCount();
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = "index.php?m=index&c=index&v=searchmore&type=user&keyword=$keyword";
            $multipage = $this->multipages ($num, $perpage, $curpage, $mpurl);
            $list = C::M('user_member')->where($where)->order('uid desc')->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach ($list as $key => $value) {
              	$lv = C::M('lv')->where("exp <= ".$value['exp'])->order('id desc')->limit(0,1)->select();
            	$list[$key]['lvname'] = $lv[0]['lvname'];
          		$list[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
          	}
        }
      	$this->assign('multipage', $multipage);
      	$this->assign('keyword', $keyword);
      	$this->assign ('list', $list);
      	$this->assign ('type', $type);
      	$this->assign('num', $num);
    	$this->display('index/searchmore.tpl');
    }

    //明信片栏目
    public function mxpAction()
    {
        $this->assign('ns', 'mxp');
        $this->display('index/mxp.tpl');
    }

    //甄选之旅栏目
    public function journeyAction()
    {
        $res = C::M('article')->where('catid = 17 and isspecial = 1 and useable = 1')->find();
        if($res){
            $this->showmsg('', 'index.php?m=index&c=index&v=journeydetail&id=' . $res['id'], 0);
        }
    }
    //甄选之旅详情
    public function journeydetailAction()
    {
        $id = intval($this->getParam('id'));
        $journey = C::M('article')->where('catid = 17 and useable = 1 and id = ' . $id)->find();
        if(!$id || !$journey){
            $this->showmsg('', '', 0);
            exit;
        }
        $extends = C::M('module')->mtable($journey['moduleid'])->queryOne('*', array(array('aid', $journey['id'])));
        $journey['extend'] = $extends;
        $journey['seotitle'] = $journey['seotitle'] ? $journey['seotitle'] : $journey['title'];
        $galleries = C::M('gallery')->where('itemid = '.$id)->select();
        $features = C::M('journey_features')->where('aid = '.$id)->select();
        $trip = C::M('journey_trip')->where('aid = '.$id)->order('sort asc')->select();
        foreach ($trip as $key => $value) {
            $trip[$key]['pics'] = C::M('gallery')->where('tid = '.$value['id'])->select();
            $n = explode('||', $value['graphic']);
            foreach ($trip[$key]['pics'] as $k => $val) {
                $trip[$key]['pics'][$k]['title'] = $n[$k];
            }
        }
        $this->assign('galleries', $galleries);
        $this->assign('features', $features);
        $this->assign('trip', $trip);
        $this->assign('ns', 'journey');
        $this->assign('count', count($trip));
        $this->assign('journey', $journey);
      	$this->assign('year', date("Y",time()));
        $this->assign('month', date("m",time()));
        $this->display('index/journey.tpl');
    }

    //达人帮栏目
    public function starAction()
    { 
        $perpage = 6;
      	$keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $where="";
      	if($keyword){
        	$where = " describes like '%$keyword%' or title like '%$keyword%' and status = 1 ";
        }else{
            $where=" status=1 ";
        }

        $Num = C::M('travel')->where($where)->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=star&keyword=$keyword";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $list = C::M('travel')->where($where)->order('addtime desc')->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            C::M('travel')->where('id', $value['id'])->setInc('shownum', 1);
            $list[$key]['content'] = json_decode($value['content']);
          	$list[$key]['picnum'] = count(json_decode($value['content']));
            $list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
        }
        //推荐达人
        $tjstar = C::M('user_member')->where("weektop = 1")->order("rand()")->limit('0,1')->select();
        if($tjstar){
            $tjstar[0]['avatar'] = $tjstar[0]['headpic']?$tjstar[0]['headpic']:'/resource/images/img-lb2.png';
        }
      	//目的在
      	$tourismlist = C::M('tourism')->select();
		
        $this->assign('tjstar', $tjstar);
        $this->assign('list', $list);
        $this->assign('num', $Num);
        $this->assign('ns', 'star'); 
      	$this->assign ('keyword', $keyword);
        $this->assign ('multipage', $multipage);
      	$this->assign ('tourismlist', $tourismlist);
        $this->display('index/star.tpl');
    }

    //tv栏目
    public function old_tvAction()
    {
        $perpage = 12;
        //查询所有标签
        $sql = "Select DISTINCT(tags) from ##__tv where status = 1 and tags <> ''";
        $tagslist = Core_Db::fetchAll($sql, false);
        foreach ($tagslist as $key => $value) {
            $tagslist[$key + 1] = $value;
        }
        unset($tagslist[0]);
        $where = "status = 1";
      	$keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        $type = intval($this->getParam ('type'));
        if($type){
            $tags = $tagslist[$type]['tags'];
            if($tags){
                $where .= " and tags = '$tags'";
            }
        }
      	if($keyword){
       		$where .= " and describes like '%$keyword%' or title like '%$keyword%'";
        }
        $Num = C::M('tv')->where($where)->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=tv&type=$type&keyword=$keyword";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $list = C::M('tv')->where($where)->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            //C::M('tv')->where('id', $value['id'])->setInc('shownum', 1);
            $user = C::M('user_member')->where("uid = " . $value['uid'])->find();
            $list[$key]['addtime'] = date('Y/m/d', $value['addtime']);
            $list[$key]['avatar'] = $user['headpic']?$user['headpic']:'/resource/images/img-lb2.png';
        }
        $tjuser = C::M('user_member')->where("tvtop = 1")->order("rand()")->limit('0,6')->select();
        foreach ($tjuser as $key => $value) {
            $tjuser[$key]['avatar'] = $value['headpic']?$value['headpic']:'/resource/images/img-lb2.png';
        }
        $this->assign('tjuser', $tjuser);
        $this->assign('list', $list);
        $this->assign('type', $type);
        $this->assign('ns', 'tv');
        $this->assign('keyword', $keyword);
      	$this->assign('tagslist', $tagslist);
        $this->assign ('multipage', $multipage);
        $this->display('index/tv.tpl');
    }

    public function tvAction()
    {
        $perpage = 12;
        $where = "status = 1";
        $keyword = htmlspecialchars($this->getParam('keyword'),ENT_QUOTES);
        if($keyword){
            $where .= " and a.tags like '%$keyword%' ";
        }

        $type=htmlspecialchars($this->getParam('type'));
        $type=empty($type)?1:$type;
        if( $type==1 ){//最新，
            $order="a.addtime desc";
        }else{ //热门
            $order="a.shownum desc";
        }

        $Num = C::M('tv as a')->where($where)->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $list = C::M('tv as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b','b.uid=a.uid','left')->where($where)->order($order)->limit($perpage * ($curpage - 1), $perpage)->select();
        if( $list ){
            foreach($list as $key=>$value){
                $list[$key]['headpic']=$value['headpic']??'/resource/images/img-lb2.png';
            }
        }

        $mpurl = "index.php?m=index&c=index&v=tv&keyword=$keyword&type=$type";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);

        //搜索条件
        $key_list=C::M('tv_keyword')->where("status=1")->select();
        $this->assign('key_list',$key_list);

        $this->assign('list', $list);
        $this->assign('ns', 'tv');
        $this->assign('keyword', $keyword);
        $this->assign("type",$type);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage)));
        $this->display('index/new_tv.tpl');
    }

    //招募
    public function recruitingAction()
    {
      	$id = intval($this->getParam('id'));
        $recruiting = C::M('recruiting')->where('id = ' . $id)->find();
        if(!$id || !$recruiting){
            $this->showmsg('', '', 0);
            exit;
        }
        $this->assign('ns', 'recruiting');
      	$this->assign('res', $recruiting);
        $this->display('mb/'.$recruiting['pc_mb']);
    }

    //报名
    public function enteredAction()
    {
      	$id = intval($this->getParam('id'));
        $recruiting = C::M('recruiting')->where('id = ' . $id)->find();
        if(!$id || !$recruiting){
            $this->showmsg('', '', 0);
            exit;
        }
        $this->assign('ns', 'entered');
     	$this->assign('res', $recruiting);
        $this->display('index/entered.tpl');
    }

    //日月潭栏目
    public function rytAction()
    {
        $y = intval($this->getParam('y')) ? intval($this->getParam('y')) : date('Y');
        $dy = date('Y');
        $dm = date('n');
        if($y > $dy){
            $y = $dy;
        }elseif($y < 2010){
            $y = 2010;
        }
        $list = array();
        if($dy == $y){
            $list = $this->rl($y, $dy, $dm);
        }else{
            $list = $this->rl($y);
        }
        $this->assign('y', $y);
        $this->assign('ns', 'ryt');
        $this->assign('list', $list);
        $this->assign('year', date('Y'));
        $this->assign('month', date('n'));
        $this->display('index/ryt.tpl');
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
            $list[$dm]['table'][] = $j;
        }
        //计算每月多少天
        $maxDay = date('t', strtotime("" . date("$y") . "-" . date("$dm") . ""));
        for ($s = 1; $s < $maxDay + 1; $s++) {
            $start_time = strtotime(date("$y-$dm-$s")." 00:00:00");
            $end_time=strtotime(date("$y-$dm-$s")." 23:59:59");
            $res = C::M('ryt')->where("show_time between $start_time and $end_time and status=1 ")->find();
            if($res){
                $list[$dm]['time'][] = array(
                    'status' => 1,
                    'id' => $res['id'],
                    'pics' => $res['pics'],
                    'time' => $y . '-' . $dm . '-' . $s,
                    'days' => $s,
                    'keyword' => $res['keyword']?$res['keyword']:'查看详情'
                );
            }else{
                $list[$dm]['time'][] = array(
                    'status' => 0,
                    'time' => $y . '-' . $dm . '-' . $s,
                    'days' => $s
                );
            }
        }
        //最后的
        $total = $first[$dm]+ count($list[$dm]['time']);
        $other = array();
        for ($x = 0; $x < ceil($maxDay / 7) * 7 - $total ; $x++) {
            $list[$dm]['other'][] = $x;
        }
        return $list;
    }

    //日月潭算法,这里算出每个月了
    public function rl($y, $dy = '', $dm = '12')
    {
        $list = array();
        for ($i=1; $i < 13; $i++) { 
            if($dm >= $i){
                $first[$i] = strtotime(date("$y-$i-01 00:00:00"));
                //计算每月前面的空格
                $first[$i] = date("w", $first[$i]);
                for ($j=0; $j < $first[$i]; $j++) {
                    $list[$i]['table'][] = $j;
                }
                //计算每月多少天
                $maxDay = date('t', strtotime("" . date("$y") . "-" . date("$i") . ""));
                for ($s = 1; $s < $maxDay + 1; $s++) {
                    $start_time = strtotime(date("$y-$i-$s")." 00:00:00");
                    $end_time=strtotime(date("$y-$i-$s")." 23:59:59");
                    $res = C::M('ryt')->where("show_time between $start_time and $end_time and status=1 ")->find();
                    if($res){
                        $list[$i]['time'][] = array(
                            'status' => 1,
                            'id' => $res['id'],
                            'pics' => $res['pics'],
                            'time' => $y . '-' . $i . '-' . $s,
                            'days' => $s,
                          	'keyword' => $res['keyword']?$res['keyword']:'查看详情'
                        );
                    }else{
                        $list[$i]['time'][] = array(
                            'status' => 0,
                            'time' => $y . '-' . $i . '-' . $s,
                            'days' => $s
                        );
                    }
                }
                //最后的
                $total = $first[$i]+ count($list[$i]['time']);
                $other = array();
                for ($x = 0; $x < ceil($maxDay / 7) * 7 - $total ; $x++) {
                    $list[$i]['other'][] = $x;
                }
            }else{
                $list[$i] = $i;
            }
        }
        return $list;
    }

    //日月潭详情
    public function old_rytdetaiAction()
    {
        $id = intval($this->getParam('id'));
        $article = C::M('ryt')->where('id', $id)->find();
        if(!$article){
            $this->showmsg('', '/', 0);
            exit;
        }
        $article['addtime'] = date('Y-m-d', $article['show_time']);
        C::M('ryt')->where('id', $id)->setInc('shownum', 1);

        //推荐日月潭
        $tjryt = C::M('ryt')->where("istop = 1")->order("rand()")->limit('0,5')->select();
        //日月潭
        $tjlist = C::M('ryt')->where("istop = 1")->order("shownum desc")->limit('0,10')->select();

        //评论
        $perpage = 5;
        $Num = C::M('comment')->where("status = 1 and rid = $id")->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=rytdetai&id=$id";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        $comment = C::M('comment')->where("status = 1 and rid = $id")->order('id asc')->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($comment as $key => $value) {
            $comment[$key]['lou'] = $curpage * $perpage + $key - 4;
            $comment[$key]['content'] = Core_Fun::ubbreplace($value['content']);
            $comment[$key]['addtime'] = date('Y-m-d H:i', $value['addtime']);
        }

        $this->assign('ns', 'ryt');
        $this->assign('tjryt', $tjryt);  
        $this->assign('tjlist', $tjlist);  
        $this->assign('article', $article);  
        $this->assign('comment', $comment);  
        $this->assign('multipage', $multipage);  
        $this->display('index/rytdetai.tpl');
    }

    //日月潭详情
    public function rytdetaiAction()
    {
        $id = intval($this->getParam('id'));
        $article = C::M('ryt')->where('id', $id)->find();
        if(!$article){
            $this->showmsg('', '/', 0);
            exit;
        }
        if( !$article['top_pic'] ){
            $article['top_pic']='/uploadfile/image/20180629/153026548528241.jpg';
        }
        $article['addtime'] = date('Y-m-d', $article['show_time']);
        C::M('ryt')->where('id', $id)->setInc('shownum', 1);

        //推荐日月潭
        $tjryt = C::M('ryt')->where("istop = 1")->order("rand()")->limit('0,5')->select();
        //日月潭
        $tjlist = C::M('ryt')->where("istop = 1")->order("shownum desc")->limit('0,10')->select();

        $type=3;//分类
        $url="/index.php?m=index&c=index&v=rytdetai&id={$id}";
        $page=$this->getParam("page")??1;
        $perpage=5;
        $this->pub_commentAction($id,$type,$url,$page,$perpage);

        //跳转链接加密
        $from_url=base64_encode($url);
        $this->assign('from_url',$from_url);

        $this->assign('ns', 'ryt');
        $this->assign('tjryt', $tjryt);
        $this->assign('tjlist', $tjlist);
        $this->assign('article', $article);

        $this->display('index/new_rytdetail.tpl');
    }

    //游画栏目
    public function sceneryAction()
    {
        $writer = C::M('writer')->where("istop = 1")->limit("0,4")->order("sort desc,id DESC")->select();
        foreach ($writer as $key => $value) {
            $writer[$key]['list'] = C::M('scenery')->where("wid = $value[id]")->limit("0,4")->order("id desc")->select();
        }
        $scenery = C::M('scenery')->where("ishottop = 1")->limit("0,6")->order("id desc")->select();
        foreach ($scenery as $key => $value) {
            C::M('scenery')->where('id', $value['id'])->setInc('show_num', 1);
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $scenery[$key]['name'] = $user['name'];
        }

        //海外专区
        $f_scenery = C::M('foreign_scenery')->where("ishottop = 1")->limit("0,6")->order("id desc")->select();
        foreach ($f_scenery as $key => $value) {
            C::M('foreign_scenery')->where('id', $value['id'])->setInc('show_num', 1);
            $f_user = C::M('writer')->where("id = $value[wid]")->find();
            $f_scenery[$key]['name'] = $f_user['name'];
        }

        //名师带你去写生
        $sketch_mdl=new Model_Sketch();
        $sketch_list=$sketch_mdl->get_living_sketch();
        if( $sketch_list ){
            foreach( $sketch_list as $key=>$value ){
                if( $value['label'] ){
                    $label_arr=array();
                    $label_arr=explode(",",$value['label']);
                    $sketch_list[$key]['label']=$label_arr;
                }

                if( $value['introduction'] ){
                    $sketch_list[$key]['introduction']=Core_fun::cn_substr(strip_tags($value['introduction']),320,'...');
                }

            }
        }
//        var_dump($sketch_list);die();

        $this->assign('ns', 'scenery');
        $this->assign('writer', $writer);
        $this->assign('scenery', $scenery);
        $this->assign("f_scenery",$f_scenery);
        $this->assign("sketch_list",$sketch_list);
        $this->display('index/scenery.tpl');
    }


    //大师写生详情页
    public function sketch_detailAction()
    {
        $id=$this->getParam("id");
        if( $id<=0 ){
            $this->showmsg('非法操作', 'index.php?m=index&c=index&v=scenery', 2);
        }

        $sketch_mdl=new Model_Sketch();
        $detail=$sketch_mdl->get_detail($id);
        if( $detail ){
            $detail['depature_time']=date("Y-m-d",strtotime($detail['depature_time']));
            $days_detail=C::M("sketch_everyday")->where(" sketch_id=$id ")->select();
            if( $days_detail ){
                $num=array_column($days_detail,"sort");
                $day_arr=array(1=>"一",2=>"二",3=>"三",4=>"四",5=>"五",6=>"六",7=>"七",8=>"八",9=>"九",10=>"十");
                foreach ($num as $key=>$value)
                {
                    $num[$key]=$day_arr[$value];
                }
                $detail['nums']=$num;
            }
            $detail['every_day']=$days_detail;
        }
        $this->assign("detail",$detail);
//        var_dump($detail);die();

        $this->display("index/new_sketch_detail.tpl");
    }

    //达人
    public function travel_detailAction()
    {
        $id=$this->getParam("id");
        if( $id<=0 ){
            $this->showmsg('非法操作', 'index.php?m=index&c=index&v=scenery', 2);
        }

        $sketch_mdl=new Model_StarTravel();
        $detail=$sketch_mdl->get_detail($id);
        if( $detail ){
            $detail['depature_time']=date("Y-m-d",strtotime($detail['depature_time']));
            $days_detail=C::M("star_travel_everyday")->where(" star_travel_id=$id ")->select();
            if( $days_detail ){
                $num=array_column($days_detail,"sort");
                $day_arr=array(1=>"一",2=>"二",3=>"三",4=>"四",5=>"五",6=>"六",7=>"七",8=>"八",9=>"九",10=>"十");
                foreach ($num as $key=>$value)
                {
                    $num[$key]=$day_arr[$value];
                }
                $detail['nums']=$num;
            }
            $detail['every_day']=$days_detail;
        }
        $this->assign("detail",$detail);

        $this->display("index/new_star_travel_detail.tpl");
    }

    //海外专区列表
    public function foreign_listAction()
    {
        $_orderby = "id DESC";
        $where = "ishottop = 1";
        $Num = C::M('foreign_scenery')->where($where)->getCount();
        $perpage = 12;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=foreign_list";
        $multipage = $this->multipages($Num, $perpage, $curpage, $mpurl);
        $list =  C::M('foreign_scenery')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            C::M('foreign_scenery')->where('id', $value['id'])->setInc('show_num', 1);
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $list[$key]['name'] = $user['name'];
        }
        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->assign('ns', 'scenery');
        $this->display('index/foreign_list.tpl');
    }




    //油画作家
    public function writerAction()
    {
        $id = intval($this->getParam('id'));
        $writer = C::M('writer')->where("id = $id")->find();
        if(!$writer){
            $this->showmsg('', '', 0);
        }
        $scenery = C::M('scenery')->where("wid = $id")->order("id desc")->select();
        if( $scenery ){
            foreach($scenery as $key=>$value){
                C::M('scenery')->where('id', $value['id'])->setInc('show_num', 1);
            }
        }
        $this->assign('writer', $writer);
        $this->assign('scenery', $scenery);
        $this->assign('ns', 'scenery');
        $this->display('index/writer.tpl');
    }

    //油画作家列表
    public function writerlistAction()
    {
        $_orderby = "sort desc,id DESC";
        $where = "isshow = 1";
        $Num = C::M('writer')->where($where)->getCount();
        $perpage = 10;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=writerlist";
        $multipage = $this->multipages($Num, $perpage, $curpage, $mpurl);
        $list =  C::M('writer')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            $list[$key]['introduction'] = Core_Fun::cn_substr($value['introduction'], 400, '...');
            if($value['sex'] == 1){
                $list[$key]['sex'] = '男';
            }else{
                $list[$key]['sex'] = '女';
            }
        }
        $scenery = C::M('scenery')->where("ishottop = 1")->limit("0,6")->order("id desc")->select();
        foreach ($scenery as $key => $value) {
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $scenery[$key]['name'] = $user['name'];
        }
        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->assign('scenery', $scenery);
        $this->assign('ns', 'scenery');
        $this->display('index/writerlist.tpl');
    }
  
  	//热门作品列表
  	public function hotsceneryAction()
    {
        $_orderby = "id DESC";
        $where = "ishottop = 1";
        $Num = C::M('scenery')->where($where)->getCount();
        $perpage = 12;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = "index.php?m=index&c=index&v=hotscenery";
        $multipage = $this->multipages($Num, $perpage, $curpage, $mpurl);
        $list =  C::M('scenery')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            C::M('scenery')->where('id', $value['id'])->setInc('show_num', 1);
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $list[$key]['name'] = $user['name'];
        }
        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->assign('ns', 'scenery');
        $this->display('index/hotscenery.tpl');
    }

    //登录
    public function loginAction()
    {
        if($_SESSION['userinfo']){
            $this->showmsg('', 'index.php?m=index&c=user&v=index', 0);
            exit;
        }

        $from_url=$this->getParam('from');
        if( $from_url && !empty($from_url) ){
            $from_url=base64_decode($from_url);
            $this->assign("from_url",$from_url);
        }

        $this->assign('ns', 'login');
        $this->display('index/login.tpl');
    }

    //注册
    public function regAction()
    {
        if($_SESSION['userinfo']){
            $this->showmsg('', 'index.php?m=index&c=user&v=index', 0);
            exit;
        }
        $this->assign('ns', 'reg');
        $this->display('index/reg.tpl');
    }
  
  	//找回密码
    public function forgetAction()
    {
        if($_SESSION['userinfo']){
            $this->showmsg('', 'index.php?m=index&c=user&v=index', 0);
            exit;
        }
        $this->assign('ns', 'forget');
        $this->display('index/forget.tpl');
    }
    
    //微博登录
    public function weibologinAction()
    {
        define( "WB_AKEY" , '2155157593' );
        define( "WB_SKEY" , '9e1b2d860d853951b0345fd72683b02d' );
        define( "WB_CALLBACK_URL" , 'http://'.$_SERVER['HTTP_HOST'].'/index.php?m=index&c=index&v=weibocallback' );
        include_once( ROOT . "vendor/weibo"."/saetv2.ex.class.php");
        $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        header("location: $code_url");
    }

    //微博回调处理
    public function weibocallbackAction()
    {
        define( "WB_AKEY" , '2155157593' );
        define( "WB_SKEY" , '9e1b2d860d853951b0345fd72683b02d' );
        define( "WB_CALLBACK_URL" , 'http://'.$_SERVER['HTTP_HOST'].'/index.php?m=index&c=index&v=weibocallback' );
        include_once( ROOT . "vendor/weibo"."/saetv2.ex.class.php");
        $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
        if (isset($_REQUEST['code'])) {
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = WB_CALLBACK_URL;
            try {
                $token = $o->getAccessToken( 'code', $keys ) ;
            } catch (OAuthException $e) {
              
            }
        } 
        if($token){
            $c = new saetclientv2(WB_AKEY,WB_SKEY,$token['access_token']);  
            $ms = $c->home_timeline();  
            $uid_get = $c->get_uid();  
            $uid = $uid_get['uid'];
            $token['userinfo'] = $c->show_user_by_id($uid); //微博sdk方法获取用户的信息  
            $userinfo = C::M('user_member')->where("wb_openid = '$token[uid]'")->find();
            if($userinfo){
                $_SESSION['userinfo'] = $userinfo;
                $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
            }else{
                $userdata = array(
                    'username' => $token['userinfo']['name'],
                    'realname' => $token['userinfo']['name'],
                    'wb_openid' => $token['uid'],
                    'password' => md5($token['uid']),
                    'regip' => Core_Comm_Util::getClientIp(),
                    'regtime' => Core_Fun::time()
                );
                if(C::M('user_member')->add($userdata)){
                    $_SESSION['userinfo'] = C::M('user_member')->where("wb_openid = '$token[uid]'")->find();
                    $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
                }else{
                    $this->showmsg('登陆失败，跳转中...', '/index.php?m=index&c=index&v=wblogin', 2);
                }
            }
        }
    }

    //QQ登录
    public function qqloginAction()
    {
        $appid = '101459157';
        $appsecret = '95f4d1ff7094d37474d36b30b456fb17';
        /*  指定回调地址  */
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?m=index&c=index&v=qqlogin';
        $redirect_uri = urlencode($url);
        if(isset($_GET['from']))
        {
            $_SESSION['callbackurl'] = $_GET['from'];
        }
        if(!isset($_GET['code'])){
            $_SESSION['state'] = md5(uniqid(rand(), TRUE));
            $url= 'https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id='.$appid.'&redirect_uri='.$redirect_uri.'&scope=get_user_info&state='.$_SESSION['state'];
            header('Location:'.$url);
            exit;
        }
        if (isset($_GET['code']) &&  ($_GET['state'] == $_SESSION['state']) && !isset($userarr['token']))
        {
            $userarr['state']=$_SESSION['state'];
            $userarr['code'] = $_GET['code'];
            $url="https://graph.qq.com/oauth2.0/token?client_id=".$appid."&client_secret=".$appsecret."&code=".$_GET['code']."&grant_type=authorization_code&redirect_uri=".$redirect_uri;
            $res = $this->https_request($url);
            $arr = $this->tokenstring_array($res);
            $userarr['token'] = $arr;
        }else{
            $this->showmsg('授权失败，跳转中...', '/index.php?m=index&c=index&v=qqlogin', 2);
            exit;
        }
        if(isset($userarr['token']['access_token']) && $userarr['token']['refresh_token'])
        {
            $date['access_token'] = $userarr['token']['access_token'];
            $date['refresh_token'] = $userarr['token']['refresh_token'];
            $url='https://graph.qq.com/oauth2.0/me?access_token='.$userarr['token']['access_token'];
            $res = $this->https_request($url);
            if(preg_match('/callback\(([\s\S]*)\);/',$res,$matchs)){
                $arr= json_decode($matchs[1],true);
            }
            $userarr['openid']=$arr['openid'];
        }else{
            $this->showmsg('授权失败，跳转中...', '/index.php?m=index&c=index&v=qqlogin', 2);
            exit;
        }
        if (isset($userarr['openid']))
        {
            $date['openid']=$userarr['openid'];//用户@openid
            $url = 'https://graph.qq.com/user/get_user_info?access_token='.$userarr['token']['access_token'].'&oauth_consumer_key='.$appid.'&openid='.$userarr['openid'];
            $res = $this->https_request($url);
            $res = json_decode($res, true);//最终得到的用户信息
            $userarr['userinfo'] = $res;
            $date['nickname']=$userarr['userinfo']['nickname'];//用户@昵称
            if(isset($userarr['userinfo']['figureurl_qq_2']) or isset($userarr['userinfo']['figureurl_qq_1']))
            {
                $date['figureurl']=$userarr['userinfo']['figureurl_qq_2']?$userarr['userinfo']['figureurl_qq_2']:$userarr['userinfo']['figureurl_qq_1'];//用户头像
            }
            $date['userinfo']=$userarr['userinfo'];
        }else{
            $this->showmsg('授权失败，跳转中...', '/index.php?m=index&c=index&v=qqlogin', 2);
            exit;
        }
        unset($_SESSION['state']);
        if($date['openid']){
            $userinfo = C::M('user_member')->where("qq_openid = '$date[openid]'")->find();
            if($userinfo){
                $_SESSION['userinfo'] = $userinfo;
                $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
            }else{
                $userdata = array(
                    'username' => $date['nickname'],
                    'realname' => $date['nickname'],
                    'qq_openid' => $date['openid'],
                    'password' => md5($date['openid']),
                    'regip' => Core_Comm_Util::getClientIp(),
                    'regtime' => Core_Fun::time()
                );
                if(C::M('user_member')->add($userdata)){
                    $_SESSION['userinfo'] = C::M('user_member')->where("qq_openid = '$date[openid]'")->find();
                    $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
                }else{
                    $this->showmsg('登陆失败，跳转中...', '/index.php?m=index&c=index&v=qqlogin', 2);
                }
            }
            
        }
    }

    public function weixinloginAction(){
        //-------配置
        $AppID = 'wx38a6b42245eae69d';
        $AppSecret = 'd7fef39a6ce15d4fb923059bb05f5722';
        $callback = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?m=index&c=index&v=weixincallback'; //回调地址
        //微信登录
        session_start();
        //-------生成唯一随机串防CSRF攻击
        $state  = md5(uniqid(rand(), TRUE));
        $_SESSION["wx_state"]    =   $state;//存到SESSION
        $callback = urlencode($callback);
        $wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$AppID."&redirect_uri=".$callback."&response_type=code&scope=snsapi_login&state=".$state."#wechat_redirect";
      	//$wxurl = "https://open.weixin.qq.com/sns/explorer_broker?appid=".$AppID."&redirect_uri=".$callback."&response_type=code&scope=snsapi_login&state=".$state."&connect_redirect=1#wechat_redirect";
        header("Location: $wxurl");
    }
  
    public function weixincallbackAction(){
        if($_GET['state']!=$_SESSION["wx_state"]){
              exit("5001");
        }
        $AppID = 'wx38a6b42245eae69d';
        $AppSecret = 'd7fef39a6ce15d4fb923059bb05f5722';
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$AppID.'&secret='.$AppSecret.'&code='.$_GET['code'].'&grant_type=authorization_code';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr=json_decode($json,1);
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'].'&lang=zh_CN';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr=json_decode($json,1);
        //逻辑处理
      	unset($_SESSION['wx_state']);
        if($arr['openid']){
            $userinfo = C::M('user_member')->where("wx_openid = '$arr[openid]'")->find();
            if($userinfo){
                $_SESSION['userinfo'] = $userinfo;
                $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
            }else{
                $userdata = array(
                    'username' => $arr['nickname'],
                    'realname' => $arr['nickname'],
                    'wx_openid' => $arr['openid'],
                    'password' => md5($arr['openid']),
                    'regip' => Core_Comm_Util::getClientIp(),
                    'regtime' => Core_Fun::time()
                );
                if(C::M('user_member')->add($userdata)){
                    $_SESSION['userinfo'] = C::M('user_member')->where("wx_openid = '$arr[openid]'")->find();
                    $this->showmsg('登录成功，跳转中...', '/index.php?m=index&c=user&v=index', 2);
                }else{
                    $this->showmsg('登陆失败，跳转中...', '/index.php?m=index&c=index&v=qqlogin', 2);
                }
            }
            
        }
    }

    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
  
    public function tokenstring_array($res)
    {
        if(strpos($res, 'expires_in'))
        {
            if(preg_match('/access_token=(\w+)\&/',$res,$matchs1))
            {
                $arr['access_token']=$matchs1[1];
            }
            if(preg_match('/expires_in=(\w+)\&/',$res,$matchs2))
            {
                $arr['expires_in']=$matchs2[1];
            }
            if(preg_match('/refresh_token=(\w+)/',$res,$matchs3))
            {
                $arr['refresh_token']=$matchs3[1];
            }
            return $arr;
        }
    }


    //游记详情
    public function traveldetaiAction()
    {
        $id = intval($this->getParam('id'));
        $type_model=new Model_TravelNote();
        $article=$type_model->get_one($id);
        if( $article ){
            $article['content']=urldecode($article['content']);
        }

        if(!$article){
            $this->showmsg('', '/', 0);
            exit;
        }
        C::M('travel_note')->where('id', $id)->setInc('show_num', 1);

        //推荐日月潭
        $tjryt = C::M('ryt')->where("istop = 1")->order("rand()")->limit('0,5')->select();
        //日月潭
        $tjlist = C::M('ryt')->where("istop = 1")->order("shownum desc")->limit('0,10')->select();

        $type=3;//分类
        $url="/index.php?m=index&c=index&v=traveldetai&id={$id}";
        $page=$this->getParam("page")??1;
        $perpage=5;
        $this->pub_commentAction($id,$type,$url,$page,$perpage);

        //跳转链接加密
        $from_url=base64_encode($url);
        $this->assign('from_url',$from_url);

        $this->assign('ns', 'ryt');
        $this->assign('tjryt', $tjryt);
        $this->assign('tjlist', $tjlist);
        $this->assign('article', $article);

        $this->display('index/travel_note_detail.tpl');
    }

    //新版-达人列表（达人帮）
    public function new_starAction()
    {
        //达人聚集地
        $looking_list=C::M('looking_star')->order('sort ASC,id desc')->select();
        if( $looking_list ){
            $this->assign("looking_list",$looking_list);
        }

        //达人列表
        $perpage = 8;
        $Num = C::M('user_member')->where("startop=1 or trainee=1 ")->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $list = C::M('user_member')->field('uid,username,headpic,autograph')->where('startop=1 or trainee=1')->order('sort asc,uid desc')->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach($list as $key=>$value){
            $list[$key]['headpic']=empty($value['headpic'])?'resource/images/img-lb2.png':$value['headpic'];
        }

        $mpurl = "/index.php?m=index&c=index&v=new_star";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        if( $multipage ){
//            unset($multipage[0]);//first
            unset($multipage[count($multipage)-1]);
        }
//        var_dump($multipage);die();

        $this->assign ('multipage', $multipage);
        $this->assign("list",$list);
        $this->assign('ns', 'new_star');
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->display('index/new_star.tpl');
    }

    //新版-达人视频详情页
    public function tv_detailAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('无视频ID!', '/index.php?m=index&c=index&v=tv', 2);
        }
        $info=C::M('tv as a')->field('a.*,b.username,b.headpic,b.autograph')->join("##__user_member as b",'a.uid=b.uid','left')->where("id={$id} and status=1")->find();
        if( !$info ){
            $this->showmsg('视频不存在!', '/index.php?m=index&c=index&v=tv', 2);
        }
        C::M('tv')->where('id', $id)->setInc('shownum', 1);
        $tag=$info['tags'];
        //获取用户相关的视频
        if( $tag ){//查找相关视频
            $tv_list=C::M("tv")->field('id,title,pics,url,addtime')->where("status=1 and id <> {$id} and tags like '%{$tag}%'")->order("id desc")->limit(0,6)->select();
        }else{//没有则按照推荐来查找
            $tv_list=C::M("tv")->field('id,title,pics,url,addtime')->where("status=1 and id <> {$id} and istop=1")->order("id desc")->limit(0,6)->select();
        }
        $type=2;//分类
        $url="/index.php?m=index&c=index&v=tv_detail&id={$id}";
        $page=$this->getParam("page")??1;
        $perpage=5;
        $this->pub_commentAction($id,$type,$url,$page,$perpage);

        //跳转链接加密
        $from_url=base64_encode($url);
        $this->assign('from_url',$from_url);

        $this->assign("info",$info);
        $this->assign('ns', 'tv');
        $this->assign("tv_list",$tv_list);
        $this->display('index/tv_detail.tpl');
    }

    /*
 * 评论公共方法
 * 参数：
 *  id:对应ID
 *  type:分类//1-日志 2-视频 3-游记 4-达人问答
 *  url:跳转链接
 *  curpage:当前页
 *  perpage:每页页数
 * */
    public function pub_commentAction($id,$type,$url,$curpage=1,$perpage=5)
    {
        //评论
        //获取总数
        $Num = C::M('comment')->where("rid={$id} and type={$type} and pid=0")->getCount();
        $limit = $perpage * ($curpage - 1) . "," . $perpage;
        $mpurl = $url;
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);
        if( $multipage ){
//            unset($multipage[0]);//first
            unset($multipage[count($multipage)-1]);
        }
        $comment=C::M("comment as a ")->field('a.*,b.headpic,b.username')->join("##__user_member as b","a.uid=b.uid","left")->where("rid={$id} and type={$type} and pid=0")->order("addtime DESC")->limit($limit)->select();
        $joins=array(
            array('##__user_member as b','a.uid=b.uid','left'),
            array('##__user_member as c','a.touid=c.uid','left')
        );
        foreach ($comment as $key => $value) {
            $comment[$key]['headpic']=empty($value['headpic'])?'resource/images/img-lb2.png':$value['headpic'];
            $comment[$key]['lou'] = $curpage * $perpage + $key - 4;
            $comment[$key]['content'] = Core_Fun::ubbreplace($value['content']);
            $comment[$key]['addtime'] = date('Y-m-d H:i', $value['addtime']);
            //查找对应一级节点的子评论，子子评论。一般只有三级结构,二级三级显示都是同一级显示
            $son=array();
            $son=C::M('comment as a')->field("a.*,b.username,c.username as to_username")->joins($joins)->where("rid={$id} and type={$type} and pid={$value['id']}")->order('id ASC')->select();
            if( $son ){
                foreach( $son as $k=>$val ){
                    $son[$k]['content']=Core_Fun::ubbreplace($val['content']);
                }
                $comment[$key]['sub']=$son;
                unset($son);
            }
            $comment[$key]['count']=count($comment[$key]['sub']);
        }
        $this->assign('comment', $comment);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage),'cur_page'=>$curpage));
        $this->assign('multipage', $multipage);
    }




}