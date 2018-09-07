<?php
/*
 * vpcv-cms
 * 日月潭
 * @author snake.L
 */
class Controller_Admin_Ryt extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

	public function indexAction()
	{
		$_orderby = "show_time DESC";
		$where = "1 = 1";
		$Num = C::M('ryt')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/ryt/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('ryt')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list  as $key=>$val ){
            if($val['show_time']>0){
                if( $val['show_time']<=time() ){//大于当前时间，已发布
                    $show_time=date("Y-m-d H:i:s",$val['show_time']);
                    if( isset($val['status']) && $val['status']==1 ){
                        $show_time="<span style='color: green;'>{$show_time} 已发布</span>";
                    }else if( isset($val['status']) && $val['status']==2 ){
                        $show_time="<span style='color: red;'>{$show_time} 未发布(异常)</span>";
                    }else{
                        $show_time="<span style='color: blue;'>{$show_time} 禁止</span>";
                    }
                }else{//未发布
                    $show_time=date("Y-m-d H:i:s",$val['show_time'])."<span style='color:blue;'>未发布</span";
                }
            }else{//旧的数据是有保留时间的
                $temp_time=$val['addtime'];
                $temp_time=date("Y-m-d H:i:s",$temp_time);
                $show_time="<span style='color: green;'>{$temp_time}已发布</span>";
            }
            $list[$key]['show_time']=$show_time;
        }
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/ryt_index.tpl');
	}
  
  	public function commentAction()
	{
		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('comment')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/ryt/comment' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('comment')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
      	foreach ($list as $key => $value) {
          	$article = C::M('ryt')->where('id', $value['rid'])->find();
          	$list[$key]['rid'] = $article['title'];
            $list[$key]['content'] = Core_Fun::ubbreplace($value['content']);
        }
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/ryt_comment.tpl');
	}

	public function moreAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
                );

				C::M('ryt')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
  
  	public function morecommentAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_status = $this->getParam ('status');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'status' => intval($_status[$_id]),
                );

				C::M('comment')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('ryt')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
  
  	public function deletecommentAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('comment')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function addAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
            $time = $this->getParam('show_time');
            if( empty($time) ){//立即发布，但要查询今天是否已经发布过了
                $show_time=time();
                $time=date("Y-m-d",time());//当前日期
                $status=1;
            }else{
                $show_time=strtotime($time);
                $time=date("Y-m-d",strtotime($time));//选择的日期
                $status=2;//草稿箱
            }
            $start_time = strtotime("$time 00:00:00");
            $end_time=strtotime("$time 23:59:59");
            $res = C::M('ryt')->where("show_time between $start_time and $end_time")->find();
            if($res){
                echo $this->returnJson(0, $time . '已经发布过日阅潭');
                exit;
            }
			$data = array(
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
              	'keyword' => $this->getParam('keyword'),
				'username' => $this->getParam('username'),
				'content' => Core_Util_Tutil::contentKeywords($this->getParam('content')),
				'homecontent' => Core_Util_Tutil::contentKeywords($this->getParam('homecontent')),
                'addtime' => time(),//创建时间
                "show_time"=>$show_time,
                "status"=>$status,

                //阅读数、点赞数
                "shownum"=>$this->getParam("shownum"),
                "zannum"=>$this->getParam("zannum")

			);
			$adid = C::M('ryt')->add($data);
			if($adid > 0)
			{
				echo $this->returnJson(1, '添加成功');
			}
			else
			{
				echo $this->returnJson(0, '添加失败');
			}
		}
		else
		{
			$autosave = $this->getautosave();
			$this->assign('content', Core_Fun::getEditor('content', $autosave['content']));
			$this->assign('homecontent', Core_Fun::getEditor('homecontent', '', 300, 700, 'bbs'));
			$this->assign('picdom', 'imgurl');
			$this->display('admin/ryt_add.tpl');
		}
	}

	public function editAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$ryt = C::M('ryt')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{//save
			$time = $this->getParam('show_time');
            $status_old=$this->getParam("status");
            if( $status_old !=1 ){//除去已发布
                if( empty($time) ){//立即发布，但要查询今天是否已经发布过了
                    $show_time=time();
                    $time=date("Y-m-d",time());//当前日期
                    $status=1;
                }else{
                    $show_time=strtotime($time);
                    $time=date("Y-m-d",strtotime($time));//选择的日期
                    $status=2;//草稿箱
                }
                $start_time = strtotime("$time 00:00:00");
                $end_time=strtotime("$time 23:59:59");
                $res = C::M('ryt')->where("show_time between $start_time and $end_time and id <> $Id")->find();
                if($res){
                    echo $this->returnJson(0, $time . '已经发布过日阅潭');
                    exit;
                }
            }
			$data = array(
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
              	'keyword' => $this->getParam('keyword'),
				'username' => $this->getParam('username'),
				'content' => Core_Util_Tutil::contentKeywords($this->getParam('content')),
				'homecontent' => Core_Util_Tutil::contentKeywords($this->getParam('homecontent')),

                //阅读数、点赞数
                "shownum"=>$this->getParam("shownum"),
                "zannum"=>$this->getParam("zannum")
			);

            if( $status_old !=1 ){
                $data['show_time']=$show_time;
                $data['status']=$status;
            }

			$adid = C::M('ryt')->where("id = $Id")->update($data);
			if($adid > 0)
			{
				echo $this->returnJson(1, '编辑成功');
			}
			else
			{
				echo $this->returnJson(0, '编辑失败');
			}
		}
		else
		{//edit
            if( $ryt['show_time'] ){
                $ryt['show_time']=date("Y-m-d H:i:s",$ryt['show_time']);
            }
			$this->assign('content', Core_Fun::getEditor('content', $ryt['content']));
			$this->assign('homecontent', Core_Fun::getEditor('homecontent', $ryt['homecontent'], 300, 700, 'bbs'));
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $ryt);
			$this->display('admin/ryt_edit.tpl');
		}
	}

	private function getautosave()
	{
		$data = Core_Cache::read('_autosave/_article.php');
		parse_str($data, $arr);
		
		return $arr;
	}

    public function gettimeAction()
    {
        $time = $this->getParam('time');
        $time=date("Y-m-d",strtotime($time));
        $start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('ryt')->where("show_time between $start_time and $end_time")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function editgettimeAction()
    {
        $id = $this->getParam('id');
        $time = $this->getParam('time');
        $time=date("Y-m-d",strtotime($time));
        $start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('ryt')->where("show_time between $start_time and $end_time and id <> $id")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }
}