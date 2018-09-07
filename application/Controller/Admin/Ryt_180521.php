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
		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('ryt')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/ryt/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('ryt')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
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
			$time = $this->getParam('addtime');
			$start_time = strtotime("$time 00:00:00");
	        $end_time=strtotime("$time 23:59:59");
	        $res = C::M('ryt')->where("addtime between $start_time and $end_time")->find();
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
				'addtime' => strtotime("$time 00:00:00")
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
		{
			$time = $this->getParam('addtime');
			$start_time = strtotime("$time 00:00:00");
	        $end_time=strtotime("$time 23:59:59");
	        $res = C::M('ryt')->where("addtime between $start_time and $end_time and id <> $Id")->find();
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
				'addtime' => strtotime("$time 00:00:00")
			);
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
		{
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
		$start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('ryt')->where("addtime between $start_time and $end_time")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}

	public function editgettimeAction()
	{
		$id = $this->getParam('id');
		$time = $this->getParam('time');
		$start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('ryt')->where("addtime between $start_time and $end_time and id <> $id")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}
}