<?php
/*
 * ST
 * 广告管理
 * @author Snake.L
 */
class Controller_Admin_Ad extends Core_Controller_Action
{
	private $_adModel = null;
	private $_categoryModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_adModel = new Model_Ad();
	}
	
    public function indexAction()
    {
		//查询条件
		$adname = $this->getParam('adname');
		$_orderby = "addtime DESC";
		$where = "adname like '%$adname%'";
		
		$Num = $this->_adModel->where($where)->getCount();
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/ad/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$ads = $this->_adModel->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach($ads AS $idx => $ad)
		{
			$ads[$idx]['kname'] = C::M('adtype')->getAdTypeOne('name', $ad['tagname']);
		}
		$this->assign('ads', $ads);
		$this->assign ('multipage', $multipage);
		$this->display('admin/ad_index.tpl');
    }
	
	public function moreAction()
	{
		if($this->getParam('id'))
		{
			$_ids = $this->getParam('id');
			$_sorts = $this->getParam('sort');
			foreach($_ids AS $i => $_id)
			{
				$data = array(
					'id' => $_id,
					'sort' => $_sorts[$_id]
				);
				$this->_adModel->update ($data);
			}
		}
		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deleteAction()
	{
		//删除
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
            $this->_adModel->remove ($ids);
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function addAction()
	{
		$_adModel = new Model_Ad();
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$tagname = $this->getParam('tagname');
			$isslide = C::M('adtype')->getAdTypeOne('isslide', $tagname);
			if($this->_adModel->checkAd($tagname) && !$isslide)
			{
				$id = $this->_adModel->getAdIdByTagName($tagname);
				$ad = $this->_adModel->find($id);
				$data = array(
					'id' => $id,
					'tagname' => $tagname,
					'adname' => $this->getParam('adname'),
					'typeid' => $this->getParam('typeid'),
					//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
					//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
					'linkurl' => $this->getParam('linkurl'),
					'outurl' => $this->getParam('outurl'),
					'addtime' => Core_Fun::time()
				);
				if('' != $this->getParam('imgurl') && $this->getParam('imgurl') != $ad['imgurl'])
				{
					$data['imgurl'] = $this->getParam('imgurl');
					Core_Fun_File::delete(BASEROOT . $ad['imgurl']);
				}
				$update = $this->_adModel->update($data);
				if($update)
				{
					echo $this->returnJson(1, '广告添加成功');
				}
				else
				{
					echo $this->returnJson(0, '广告添加失败');
				}
			}
			else
			{
				$data = array(
					'tagname' => $tagname,
					'adname' => $this->getParam('adname'),
					'typeid' => $this->getParam('typeid'),
					//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
					//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
					'linkurl' => $this->getParam('linkurl'),
					'outurl' => $this->getParam('outurl'),
					'addtime' => Core_Fun::time()
				);
				if('' != $this->getParam('imgurl'))
				{
					$data['imgurl'] = $this->getParam('imgurl');
				}
				$adid = $this->_adModel->add($data);
				if($adid > 0)
				{
					echo $this->returnJson(1, '广告添加成功');
				}
				else
				{
					echo $this->returnJson(0, '广告添加失败');
				}
			}
		}
		else
		{
			$this->assign('picdom', 'imgurl');
			$this->assign('_postName', 'add');
			$this->assign('adposition', C::M('adtype')->getAdTypeOption());
			$this->display('admin/ad_info.tpl');
		}
	}
	
	public function editAction()
	{
		$_adModel = new Model_Ad();
		$action = $this->getParam('action');
		$id = $this->getParam('id');
		$ad = $this->_adModel->where('id', $id)->find();
		if($action && $action == 'edit')
		{
			$data = array(
				'id' => $id,
				'tagname' => $this->getParam('tagname'),
				'adname' => $this->getParam('adname'),
				'typeid' => $this->getParam('typeid'),
				//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
				//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
				'linkurl' => $this->getParam('linkurl'),
				'outurl' => $this->getParam('outurl'),
				'addtime' => Core_Fun::time()
			);
			if('' != $this->getParam('imgurl') && $this->getParam('imgurl') != $ad['imgurl'])
			{
				$data['imgurl'] = $this->getParam('imgurl');
				Core_Fun_File::delete(BASEROOT . $ad['imgurl']);
			}
			$update = $this->_adModel->update($data);
			if($update)
			{
				echo $this->returnJson(1, '广告修改成功');
			}
			else
			{
				echo $this->returnJson(0, '广告修改失败');
			}
		}
		else
		{
			$this->assign('ad', $ad);
			$this->assign('picdom', 'imgurl');
			$this->assign('_postName', 'edit');
			$this->assign('adposition', C::M('adtype')->getAdTypeOption());
			$this->display('admin/ad_info.tpl');
		}
	}

	public function typeAction()
	{
        $types = C::M('adtype')->select();

        $this->assign('types', $types);
		
		$this->display('admin/ad_type.tpl');
	}

	public function tmoreAction()
	{
		if($this->getParam('id'))
		{
			$_ids = $this->getParam('id');
			$_names = $this->getParam('name');
			$_tags = $this->getParam('tag');
			$_isslides = $this->getParam('isslide');
			$_useables = $this->getParam('useable');
			foreach($_ids AS $i => $_id)
			{
				$data = array(
					'id' => $_id,
					'name' => $_names[$_id],
					'tag' => $_tags[$_id],
					'isslide' => $_isslides[$_id],
					'useable' => $_useables[$_id]
				);
				C::M('adtype')->update ($data);
			}
		}

		if($this->getParam('newname'))
		{
			$_newnames = $this->getParam('newname');
			$_newtags = $this->getParam('newtag');
			$_newisslides = $this->getParam('newisslide');
			foreach($_newnames AS $i => $name)
			{
				if(C::M('adtype')->isCheck($_newtags[$_id]))
				{
					$data = array(
						'name' => $name,
						'tag' => $_newtags[$i],
						'isslide' => $_newisslides[$i],
						'useable' => 1
					);
					C::M('adtype')->add ($data);
				}
			}
		}
		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function tdeleteAction()
	{
		//删除
        $ids = (array)$this->getParam ('id');
        $r = C::M('adtype')->deleteById ($ids);

        if($r)
        {
        	echo $this->returnJson(1, '操作成功，正在返回...');
        }
		else
		{
			echo $this->returnJson(0, '操作失败...');
		}
	}
}