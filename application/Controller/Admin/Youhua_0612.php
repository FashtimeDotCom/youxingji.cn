<?php
/*
 * vpcv-cms
 * 油画
 * @author snake.L
 */
class Controller_Admin_Youhua extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

	public function writerAction()
	{
		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('writer')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/youhua/writer' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('writer')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/youhua/writer.tpl');
	}
  
  	public function tourismAction()
    {
    	$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('tourism')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/youhua/tourism' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('tourism')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/youhua/tourism.tpl');
    }

	public function morewriterAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
          	$_isshows = $this->getParam ('isshow');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
                  	'isshow' => intval($_isshows[$_id]),
                );

				C::M('writer')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deletewriterAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('writer')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
  
  	public function deletetourismAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('tourism')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function addwriterAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'name' => $this->getParam('name'),
              	'sort' => intval($this->getParam('sort')),
				'sex' => $this->getParam('sex'),
				'skilful' => $this->getParam('skilful'),
				'introduction' => $this->getParam('introduction'),
				'pics' => $this->getParam('pics')
			);
			$adid = C::M('writer')->add($data);
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
			$this->assign('picdom', 'imgurl');
			$this->display('admin/youhua/addwriter.tpl');
		}
	}
  
  	public function addtourismAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'keyword' => $this->getParam('keyword'),
				'pics' => $this->getParam('pics')
			);
			$adid = C::M('tourism')->add($data);
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
			$this->assign('picdom', 'imgurl');
			$this->display('admin/youhua/addtourism.tpl');
		}
	}
  
  	public function addtvAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'uid' => 215, 
				'title' => $this->getParam('title'), 
				'pics' => $this->getParam('pics'), 
				'url' => $this->getParam('url'), 
				'describes' => $this->getParam('describes'),
				'addtime' => time(), 
				'status' => 1
			);
			$adid = C::M('tv')->add($data);
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
			$this->assign('picdom', 'imgurl');
			$this->display('admin/youhua/addtv.tpl');
		}
	}

	public function editwriterAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$writer = C::M('writer')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'name' => $this->getParam('name'),
              	'sort' => intval($this->getParam('sort')),
				'sex' => $this->getParam('sex'),
				'skilful' => $this->getParam('skilful'),
				'introduction' => $this->getParam('introduction'),
				'pics' => $this->getParam('pics')
			);
			$adid = C::M('writer')->where("id = $Id")->update($data);
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
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $writer);
			$this->display('admin/youhua/editwriter.tpl');
		}
	}
  
  	public function edittvAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$writer = C::M('tv')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'title' => $this->getParam('title'), 
				'pics' => $this->getParam('pics'), 
				'url' => $this->getParam('url'), 
				'describes' => $this->getParam('describes'),
			);
			$adid = C::M('tv')->where("id = $Id")->update($data);
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
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $writer);
			$this->display('admin/youhua/edittv.tpl');
		}
	}
  
  	public function edittourismAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$writer = C::M('tourism')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'keyword' => $this->getParam('keyword'),
				'pics' => $this->getParam('pics')
			);
			$adid = C::M('tourism')->where("id = $Id")->update($data);
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
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $writer);
			$this->display('admin/youhua/edittourism.tpl');
		}
	}

	public function sceneryAction()
	{
		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('scenery')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/youhua/scenery' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('scenery')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $list[$key]['name'] = $user['name'];
        }
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/youhua/scenery.tpl');
	}

	public function moresceneryAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
          	$_ishottops = $this->getParam ('ishottop');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
                  	'ishottop' => intval($_ishottops[$_id]),
					'istop' => intval($_istops[$_id]),
                );

				C::M('scenery')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deletesceneryAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('scenery')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function addsceneryAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
              	'thumbpic' => $this->getParam('thumbpic'),
				'size' => $this->getParam('size'),
				'place' => $this->getParam('place'),
				'wid' => $this->getParam('wid')

			);
			$adid = C::M('scenery')->add($data);
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
			$this->assign('picdom', 'imgurl');
          	$this->assign('picdoms', 'thumbpic');
			$this->display('admin/youhua/addscenery.tpl');
		}
	}

	public function editsceneryAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$scenery = C::M('scenery')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
              	'thumbpic' => $this->getParam('thumbpic'),
				'size' => $this->getParam('size'),
				'place' => $this->getParam('place'),
				'wid' => $this->getParam('wid')
			);
			$adid = C::M('scenery')->where("id = $Id")->update($data);
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
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $scenery);
			$this->display('admin/youhua/editscenery.tpl');
		}
	}


	//达人邦
	public function starAction()
	{
        $_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('travel')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/youhua/star' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('travel')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
            C::M('travel')->where('id', $value['id'])->setInc('shownum', 1);
            $list[$key]['content'] = json_decode($value['content']);
            $list[$key]['addtime'] = date('Y-m-d', $value['addtime']);
        }
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/youhua/star.tpl');
	}

	public function morestarAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
			$_status = $this->getParam ('status');
            $_shownum=$this->getParam("shownum");
            $_topnum=$this->getParam("topnum");
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
					'status' => intval($_status[$_id]),
                   	"shownum"=>intval($_shownum[$_id]),
                    "topnum"=>intval($_topnum[$_id])
                );

				C::M('travel')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deletestarAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('travel')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}


	//TV
	public function tvAction()
	{
        $_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('tv')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/youhua/tv' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('tv')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/youhua/tv.tpl');
	}

	public function moretvAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
			$_status = $this->getParam ('status');
			$_tags = $this->getParam ('tags');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
					'status' => intval($_status[$_id]),
					'tags' => $_tags[$_id],
                );

				C::M('tv')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deletetvAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('tv')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
}