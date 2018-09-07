<?php


class Controller_Admin_Recruiting extends Core_Controller_Action

{
	public function indexAction()
	{
		$_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('recruiting')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/recruiting/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('recruiting')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/recruiting/index.tpl');
	}
  
  	public function enteredAction()
	{
		$_orderby = "id DESC";
      	//查询条件
		$rid = $this->getParam('rid');
		$_orderby = "id DESC";
      	$where = "1 = 1";
      	if($rid){
        	$where = " and rid = $rid";
      		$conditions['rid'] = $rid;
        }
		
		$Num = C::M('entered')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/recruiting/entered' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('entered')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('rid', $rid);
      	$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/recruiting/entered.tpl');
	}
	
  	public function addAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'banner' => $this->getParam('banner'),
				'pc_mb' => $this->getParam('pc_mb'),
				'wap_mb' => $this->getParam('wap_mb'),
              	'url' => $this->getParam('url'),
				'instructions' => $this->getParam('instructions')
			);
			$adid = C::M('recruiting')->add($data);
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
          	$this->assign('instructions', Core_Fun::getEditor('instructions', '', 300, 700, 'bbs'));
			$this->display('admin/recruiting/add.tpl');
		}
	}
  
  	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('recruiting')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
  
  	public function entereddeleteAction()
    {
   	 	if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('entered')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
    }
  
  	public function editAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$writer = C::M('recruiting')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'title' => $this->getParam('title'),
				'banner' => $this->getParam('banner'),
				'pc_mb' => $this->getParam('pc_mb'),
				'wap_mb' => $this->getParam('wap_mb'),
              	'url' => $this->getParam('url'),
				'instructions' => $this->getParam('instructions')
			);
			$adid = C::M('recruiting')->where("id = $Id")->update($data);
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
			$this->assign('article', $writer);
          	$this->assign('instructions', Core_Fun::getEditor('instructions', $writer['instructions'], 300, 700, 'bbs'));
			$this->display('admin/recruiting/edit.tpl');
		}
	}
}