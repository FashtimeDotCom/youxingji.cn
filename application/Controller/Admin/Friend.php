<?php
/*
 * vpcvcms
 * @author Snake.L
 */
class Controller_Admin_Friend extends Core_Controller_Action
{
	
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
    public function indexAction()
    {
		//查询条件
		$_search = array(
			array('content', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = C::M('findfriend')->getCount($_searchArr['where']);
		$perpage = Core_Config::get ('page_size', 'basic', 10);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/friend/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$friends = C::M('findfriend')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($friends AS $idx => $friend)
		{
			$friends[$idx]['username'] = C::M('User_Member')->getInfoByUid('username', $friend['uid']);
			$friends[$idx]['realname'] = C::M('User_Member')->getInfoByUid('realname', $friend['uid']);
		}
		$this->assign('friends', $friends);
		$this->assign ('multipage', $multipage);
		$this->display('admin/friend_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            C::M('findfriend')->remove ($ids);
        }
		$this->showmsg('操作成功，正在返回...');
	}
	
	public function addAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$catid = $this->getSafeParam('catid');
			$catarr = C::M('category')->getParendIds($catid);
			$content = Core_Util_Tutil::contentKeywords($this->getParam('content'));
			$cutstr = Core_Comm_Util::utfSubstr(Core_Comm_Util::Html2text($content), 100);
			$data = array(
				'goodsname' => $this->getParam('goodsname'),
				'catid' => $catid,
				'catarr' => $catarr,
				'cutstr' => $cutstr,
				'content' => $content,
				'tips' => $this->getParam('tips'),
				'isspecial' => $this->getParam('isspecial'),
				'ishot' => $this->getParam('ishot'),
				'useable' => $this->getParam('useable'),
				'sort' => $this->getParam('sort'),
				'addtime' => Core_Fun::time()
			);
			if('' != $_FILES['goodspic']['tmp_name'])
			{
				$fileUrl = Core_Util_Upload::upload('goodspic', '/goods', 'jpg,png,gif', false, false, false);
				$data['goodspic'] = $fileUrl['link'];
			}
			$id = C::M('goods')->add($data);
			if($id > 0)
			{
				if($this->getParam('attrname'))
				{
					$attrname = $this->getParam('attrname');
					$price = $this->getParam('price');
					$unit = $this->getParam('unit');
					$score = $this->getParam('score');
					foreach($attrname AS $i => $attr)
					{
						if(!empty($attr))
						{
							$specdata = array(
								'goodsid' => $id,
								'attrname' => $attr,
								'price' => $price[$i],
								'unit' => $unit[$i],
								'score' => $score[$i]
							);
							C::M('goodspec')->addSpec($specdata);
						}
					}
				}
				$this->showmsg('商品添加成功，正在返回', 'admin/goods/index');
			}
			else
			{
				$this->showmsg('商品添加失败，请检查是否名称重复', 'admin/goods/add');
			}
		}
		else
		{
			$good['useable'] = 1;
			$_catList = C::M('category')->getCategoryTree(0, 2, '', '--', false);
			$this->assign('catList', $_catList);
			$this->assign('content', Core_Fun::getEditor('content', ''));
			$this->assign('tips', Core_Fun::getEditor('tips', ''));
			$this->assign('_postName', 'add');
			$this->assign('good', $good);
			$this->display('admin/goods_info.tpl');
		}
	}
	
	public function editAction()
	{
		$id = (int) $this->getParam('id');
        if ($id <= 0)
        {
            $this->showmsg('请正确操作', 'admin/friend/index', 0);
        }
		$friend = C::M('findfriend')->find($id);
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'id' => $id,
				'content' => $this->getParam('content'),
				'msg' => $this->getParam('msg'),
				'useable' => $this->getParam('useable')
			);
			
			if(C::M('findfriend')->update($data))
			{
				$this->showmsg('操作成功,正在返回...', 'admin/friend/index');
			}
			else
			{
				$this->showmsg('修改失败', 'admin/friend/edit/id/' . $id);
			}
		}
		else
		{
			if (!$friend)
			{
				$this->showmsg('您查看的信息不存在。', 'admin/friend/index');
			}
			$friend['username'] = C::M('User_Member')->getInfoByUid('username', $friend['uid']);
			$friend['realname'] = C::M('User_Member')->getInfoByUid('realname', $friend['uid']);
			$this->assign('_postName', 'edit');
			$this->assign('friend', $friend);
			$this->display('admin/friend_info.tpl');
		}
	}
}