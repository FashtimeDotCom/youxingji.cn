<?php
/*
 * vpcv-cms
 * 文章管理
 * @author snake.L
 */
class Controller_Admin_Article extends Core_Controller_Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
    	$title = $this->getParam('title');
    	$catid = $this->getParam('catid');
    	$moduleid = $this->getParam('moduleid');
    	$conditions = array();
    	$where = "1=1";
    	if($title)
    	{
    		$where .= " and title like '%$title%'";
    		$conditions['title'] = $title;
    	}
    	if($catid)
    	{
    		$where .= " and FIND_IN_SET('$catid', catarr)";
    		$conditions['catid'] = $catid;
    	}
    	if($moduleid)
    	{
    		$where .= " and moduleid = '$moduleid'";
    		$conditions['moduleid'] = $moduleid;
    	}
		$_orderby = "addtime DESC,sort ASC";
		
		$Num = C::M('article')->where($where)->getCount();
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/article/index' . $_c . '/';
        	$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$articles = C::M('article')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach($articles AS $idx => $article)
		{
			$articles[$idx]['catname'] = C::M('nav')->where('id', $article['catid'])->getField('name');
		}
		
        $this->assign ('multipage', $multipage);
		$this->assign('articles', $articles);
		$this->assign('conditions', $conditions);
		$this->display('admin/article_index.tpl');
    }

    public function featuresAction()
    {
        $_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('journey_features')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/article/features' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('journey_features')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
			$article = C::M('article')->where('id = '.$value['aid'])->find();
			$list[$key]['lstitle'] = $article['title'];
		}
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/journey/features.tpl');
    }

    public function tripAction()
    {
        $_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('journey_trip')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/article/trip' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('journey_trip')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
			$article = C::M('article')->where('id = '.$value['aid'])->find();
			$list[$key]['lstitle'] = $article['title'];
		}
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/journey/trip.tpl');
    }
  
  	public function baojiaAction()
    {
        $_orderby = "id DESC";
		$where = "1 = 1";
		$Num = C::M('journey_price')->where($where)->getCount();
		$perpage = 20;
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/article/baojia' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$list =  C::M('journey_price')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach ($list as $key => $value) {
			$article = C::M('article')->where('id = '.$value['jid'])->find();
			$list[$key]['lstitle'] = $article['title'];
          	$list[$key]['addtime'] = date('Y年m月d日', $value['addtime']);
		}
		$this->assign('list', $list);
		$this->assign ('multipage', $multipage);
		$this->display('admin/journey/baojia.tpl');
    }

    public function addfeaturesAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$data = array(
				'aid' => $this->getParam('aid'),
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
				'introduction' => $this->getParam('introduction')
			);
			$adid = C::M('journey_features')->add($data);
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
         	$this->assign('introduction', Core_Fun::getEditor('introduction', $article['introduction'], 300, 700, 'bbs'));
			$this->display('admin/journey/addfeatures.tpl');
		}
	}

	public function addtripAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$pictitle = $this->getParam('pictitle');
			$data = array(
				'aid' => intval($this->getParam('aid')),
				'sort' => intval($this->getParam('sort')),
              	'days' => intval($this->getParam('days')),
				'title' => $this->getParam('title'),
				'introduction' => $this->getParam('introduction'),
				'graphic' => $pictitle,
			);
			$adid = C::M('journey_trip')->add($data);
			if($adid > 0)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'tid' => $adid);
						C::M('gallery')->editGallery($galleryData);
					}
				}
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
			$this->assign('swfupload', Core_Fun_Swfupload::_build_upload($_swfParams)); //构建swfupload
			$this->assign('introduction', Core_Fun::getEditor('introduction', '', 300, 700, 'bbs'));
			$this->display('admin/journey/addtrip.tpl');
		}
	}
  
  	public function addbaojiaAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
          	$time = $this->getParam('addtime');
          	$start_time = strtotime("$time 00:00:00");
	        $end_time=strtotime("$time 23:59:59");
	        $res = C::M('journey_price')->where("addtime between $start_time and $end_time")->find();
	        if($res){
	        	echo $this->returnJson(0, $time . '已经添加过');
	        	exit;
	        }
			$data = array(
				'jid' => $this->getParam('aid'),
				'minperson' => $this->getParam('minperson'),
				'price' => $this->getParam('price'),
              	'text' => $this->getParam('text'),
				'addtime' => strtotime("$time 00:00:00")
			);
			$adid = C::M('journey_price')->add($data);
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
			$this->display('admin/journey/addbaojia.tpl');
		}
	}
  
  	public function gettimeAction()
	{
		$time = $this->getParam('time');
		$start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('journey_price')->where("addtime between $start_time and $end_time")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}
  
  	public function editgettimeAction()
	{
		$id = $this->getParam('id');
		$time = $this->getParam('time');
		$start_time = strtotime("$time 00:00:00");
        $end_time=strtotime("$time 23:59:59");
        $res = C::M('journey_price')->where("addtime between $start_time and $end_time and id <> $id")->find();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}

	public function editfeaturesAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$article = C::M('journey_features')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'aid' => $this->getParam('aid'),
				'title' => $this->getParam('title'),
				'pics' => $this->getParam('pics'),
				'introduction' => $this->getParam('introduction')
			);
			$adid = C::M('journey_features')->where("id = $Id")->update($data);
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
			$this->assign('article', $article);
          	$this->assign('introduction', Core_Fun::getEditor('introduction', $article['introduction'], 300, 700, 'bbs'));
			$this->display('admin/journey/editfeatures.tpl');
		}
	}

	public function edittripAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$article = C::M('journey_trip')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$pictitle = $this->getParam('pictitle');
			$data = array(
				'aid' => intval($this->getParam('aid')),
				'sort' => intval($this->getParam('sort')),
              	'days' => intval($this->getParam('days')),
				'title' => $this->getParam('title'),
				'introduction' => $this->getParam('introduction'),
				'graphic' => $pictitle,
			);
			$adid = C::M('journey_trip')->where("id = $Id")->update($data);
			if($adid > 0)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'tid' => $Id);
						C::M('gallery')->editGallery($galleryData);
					}
				}
				echo $this->returnJson(1, '编辑成功');
			}
			else
			{
				echo $this->returnJson(0, '编辑失败');
			}
		}
		else
		{
			$galleries = C::M('gallery')->where('tid = '.$Id)->select();
			$this->assign('gallerylist', $galleries);
			$this->assign('picdom', 'imgurl');
			$this->assign('article', $article);
			$this->assign('swfupload', Core_Fun_Swfupload::_build_upload($_swfParams)); //构建swfupload
			$this->assign('introduction', Core_Fun::getEditor('introduction', $article['introduction'], 300, 700, 'bbs'));
			$this->display('admin/journey/edittrip.tpl');
		}
	}
  
  	public function editbaojiaAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$article = C::M('journey_price')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
          	$time = $this->getParam('addtime');
			$start_time = strtotime("$time 00:00:00");
	        $end_time=strtotime("$time 23:59:59");
	        $res = C::M('journey_price')->where("addtime between $start_time and $end_time and id <> $Id")->find();
	        if($res){
	        	echo $this->returnJson(0, $time . '已经添加过');
	        	exit;
	        }
			$data = array(
				'jid' => $this->getParam('aid'),
				'minperson' => $this->getParam('minperson'),
              	'text' => $this->getParam('text'),
				'price' => $this->getParam('price'),
				'addtime' => strtotime("$time 00:00:00")
			);
			$adid = C::M('journey_price')->where("id = $Id")->update($data);
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
			$this->assign('article', $article);
			$this->display('admin/journey/editbaojia.tpl');
		}
	}

    public function deletefeaturesAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('journey_features')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deletetripAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('journey_trip')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
  
  	public function deletebaojiaAction()
	{
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
			{
				C::M('journey_price')->where("id = $_id")->delete();
			}
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function moreAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
			$_isspecials = $this->getParam ('isspecial');
			$_isindexs = $this->getParam ('isindex');
			$_sorts = $this->getParam ('sort');
			$_useables = $this->getParam ('useable');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
					'isspecial' => intval($_isspecials[$_id]),
					'isindex' => intval($_isindexs[$_id]),
					'sort' => intval($_sorts[$_id]),
					'useable' => intval($_useables[$_id])
                );

				C::M('article')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');

            C::M('article')->deleteByIds($ids);
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function addAction()
	{
		$action = $this->getParam('action');
		if($action && 'add' == $action)
		{
			$shownum = $this->getParam('shownum');
			$shownum = $shownum ? $shownum : 1;
			$isview = $this->getParam('isview');
			$isview = $isview ? $isview : 0;
			$content = Core_Util_Tutil::contentKeywords($this->getParam('content'));
            $desc = $this->getParam("description");
			$cutstr = Core_Comm_Util::utfSubstr(Core_Comm_Util::Html2text($content), 100);
			$attachlist = Core_Comm_Util::getAttchList($content);
			$catid = $this->getParam('catid');
			$catarr = C::M('nav')->getParendIds($catid);
			$moduleid = $this->getParam('moduleid');
			$classid = array_filter($this->getParam('classid'));
			$_Data = array(
				'title' => $this->getParam('title'),
				'catid' => $catid,
				'catarr' => $catarr,
				'classid' => implode(',', $classid),
				'shownum' => $shownum,
				'feednum' => intval($this->getParam('feednum')),
				'bestnum' => intval($this->getParam('bestnum')),
				'tagword' => $this->getParam('tagword'),
				'seotitle' => $this->getParam('seotitle'),
				'keywords' => $this->getParam('keywords'),
				'description' => $desc,
				'fileurl' => $this->getParam('fileurl'),
				'useable' => $this->getParam('useable'),
				'isview' => intval($isview),
				'content' => $content,
				'cutstr' => $cutstr,
				'moduleid' => $moduleid,
				'attachlist' => implode(',', $attachlist),
				'uid' => $_SESSION['isadmin'],
				'realname' => $_SESSION['adminrealname'],
				'sort' => intval($this->getParam('sort')),
				'updatetime' => Core_Fun::time(),
				'comefrom' => Core_Config::get ('site_name', 'basic', 'vpcvcms'),
				'addtime' => Core_Fun::time(),
                "label_id"=>intval($this->getParam("label_id")),
                "tjpic"=>$this->getParam("tjpic")
			);
			if('' != $this->getParam('articlepic'))
			{
				$_Data['articlepic'] = $this->getParam('articlepic');
				$_Data['articlethumb'] = $this->getParam('articlethumb');
			}
			/*else
			{
				$attach = Core_Comm_Util::getAttch($content);
				$_Data['articlepic'] = $attach;
				$_Data['articlethumb'] = $attach;
			}*/
			$Id = C::M('article')->add($_Data);
			
			if($Id > 0)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						C::M('gallery')->editGallery($galleryData);
					}
				}

				$columns = C::M('module')->mtable($moduleid)->getColumnList();
				$set = "`aid` = '$Id'";
				foreach($columns AS $column)
				{
					if($column['field'] != 'id' && $column['field'] != 'aid')
					{
						$value = $this->getParam($column['field']);
						$set .= ", `" . $column['field'] . "` = '$value'";
					}
				}

				Core_Db::execute("INSERT INTO ##__base_module_" . $moduleid . " SET " . $set);

				Core_Cache::del('_autosave/_article.php');
				echo $this->returnJson(1, '内容添加成功');
			}
			else
			{
				echo $this->returnJson(0, '内容添加失败');
			}
		}
		else
		{
			$_swfParams = array(
				'item_id' => 0, 
				'belong' => BELONG_ARTICLE,
				'm' => 'article'
			);
			$this->assign('swfupload', Core_Fun_Swfupload::_build_upload($_swfParams)); //构建swfupload
			$galleries = C::M('gallery')->getGalleryList(0, BELONG_ARTICLE);
			$this->assign('gallerylist', $galleries);

			//获取联动信息
			$this->assign('classid', $this->getCategoryKind());

            //标签列表
            $label_list=C::M("journey_label")->field("id,name")->where("status = 1 ")->order("sort DESC")->select();
            if( $label_list ){
                $label_list=array_column($label_list,"name","id");
                $this->assign("label_list",$label_list);
            }

			$autosave = $this->getautosave();
			if(!empty($autosave))
			{
				$this->assign('content', Core_Fun::getEditor('content', $autosave['content']));
				$article = $autosave;
			}
			else
			{
				$this->assign('content', Core_Fun::getEditor('content', $autosave['content']));
				$article['useable'] = 1;
				$article['moduleid'] = 'article';
			}
			
			$this->assign('picdom', 'articlepic');
			$this->assign('thumbdom', 'articlethumb');
			$this->assign('article', $article);
			$this->assign('_postName', 'add');
			$this->display('admin/article_info.tpl');
		}
	}
	
	public function editAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$article = C::M('article')->where('id', $Id)->find();
       
		$action = $this->getParam('action');
		if($action && 'edit' == $action)
		{
			$shownum = $this->getSafeParam('shownum');
			$shownum = $shownum ? $shownum : 1;
			$isview = $this->getParam('isview');
			$isview = $isview ? $isview : 0;
			$content = Core_Util_Tutil::contentKeywords($this->getParam('content'));
            $desc = $this->getParam("description");
			$cutstr = Core_Comm_Util::utfSubstr(Core_Comm_Util::Html2text($content), 100);
			$attachlist = Core_Comm_Util::getAttchList($content);
			C::M('article')->where('id', $Id)->setField('attachlist', '');
			$catid = $this->getParam('catid');
			$catarr = C::M('nav')->getParendIds($catid);
			$moduleid = $this->getParam('moduleid');
			$classid = array_filter($this->getParam('classid'));
			$_Data = array(
				'id' =>$Id,
				'title' => $this->getParam('title'),
				'catid' => $catid,
				'catarr' => $catarr,
				'classid' => implode(',', $classid),
				'shownum' => $shownum,
				'feednum' => intval($this->getParam('feednum')),
				'bestnum' => intval($this->getParam('bestnum')),
				'tagword' => $this->getParam('tagword'),
				'seotitle' => $this->getParam('seotitle'),
				'keywords' => $this->getParam('keywords'),
				'description' => $desc,
				'fileurl' => $this->getParam('fileurl'),
				'useable' => $this->getParam('useable'),
				'isview' => intval($isview),
				'content' => $content,
				'cutstr' => $cutstr,
				'moduleid' => $moduleid,
				'attachlist' => implode(',', $attachlist),
				'sort' => intval($this->getParam('sort')),
				'updatetime' => Core_Fun::time(),
                "label_id"=>$this->getParam("label_id"),
                "tjpic"=>$this->getParam("tjpic")
			);

			if('' != $this->getParam('articlepic') && $this->getParam('articlepic') != $article['articlepic'])
			{
				Core_Fun_File::delete(BASEROOT . $article['articlepic']);
				Core_Fun_File::delete(BASEROOT . $article['articlethumb']);
				$_Data['articlepic'] = $this->getParam('articlepic');
				$_Data['articlethumb'] = $this->getParam('articlethumb');
			}
			/*else
			{
				$attach = Core_Comm_Util::getAttch($content);
				$attach && $_Data['articlepic'] = $attach;
				$attach && $_Data['articlethumb'] = $attach;
				$attach && Core_Fun_File::delete(BASEROOT . $article['articlepic']);
				$attach && Core_Fun_File::delete(BASEROOT . $article['articlethumb']);
			}*/
			$update = C::M('article')->update($_Data);
			
			if($update)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						C::M('gallery')->editGallery($galleryData);
					}
				}
				if ($this->getParam('file_id'))
				{
					$_file_ids = $this->getParam('file_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						C::M('gallery')->editGallery($galleryData);
					}
				}

				$columns = C::M('module')->mtable($moduleid)->getColumnList();

				$set = "`aid` = '$Id'";

				foreach($columns AS $column)

				{

					if($column['field'] != 'id' && $column['field'] != 'aid')

					{

						$value = $this->getParam($column['field']);

						$set .= ", `" . $column['field'] . "` = '$value'";

					}

				}
				$modulevalue = Core_Db::fetchOne("SELECT id FROM ##__base_module_" . $moduleid . " WHERE aid = '$Id'");
				if($modulevalue['id'])
				{
					Core_Db::execute("UPDATE ##__base_module_" . $moduleid . " SET " . $set . " WHERE aid = '$Id'");
				}
				else
				{
					Core_Db::execute("INSERT INTO ##__base_module_" . $moduleid . " SET " . $set);
				}

				Core_Cache::del('_autosave/_article.php');
				echo $this->returnJson(1, '内容修改成功');
			}
			else
			{
				echo $this->returnJson(0, '内容修改失败');
			}
		}
		else
		{
			$_swfParams = array(
				'item_id' => $Id, 
				'belong' => BELONG_ARTICLE,
				'm' => 'article'
			);
			$this->assign('swfupload', Core_Fun_Swfupload::_build_upload($_swfParams)); //构建swfupload
			$galleries = C::M('gallery')->getGalleryList($Id, BELONG_ARTICLE);
			$this->assign('gallerylist', $galleries);

			//获取联动信息 
			$this->assign('classid', $this->getCategoryKind($article['classid'], 'edit'));

            //标签列表
            $label_list=C::M("journey_label")->field("id,name")->where("status = 1 ")->order("sort DESC")->select();
            if( $label_list ){
                $label_list=array_column($label_list,"name","id");
                $this->assign("label_list",$label_list);
            }

			if($article['moduleid'])
			{
				$extends = C::M('module')->mtable($article['moduleid'])->getExetendList($Id);
				foreach ($extends as $k => $v) {
					if($v['type'] == 'text'){
						$extends[$k]['value'] = Core_Fun::getEditor($v['field'], $v['value'], 100, 700, 'bbs');
					}
				}

				$this->assign('extends', $extends);
			}

			$this->assign('content', Core_Fun::getEditor('content', $article['content']));
			$this->assign('picdom', 'articlepic');
			$this->assign('thumbdom', 'articlethumb');
			$this->assign('article', $article);
			$this->assign('_postName', 'edit');
			$this->display('admin/article_info.tpl');
		}
	}

	public function autosaveAction()
	{
		$data = $this->getParam('data');
		Core_Cache::write('_autosave/_article.php', $data);
	}

	private function getautosave()
	{
		$data = Core_Cache::read('_autosave/_article.php');
		parse_str($data, $arr);
		
		return $arr;
	}

	public function moduleAction()
	{
		$id = $this->getParam('id');
		$aid = $this->getParam('aid');
		$aid = $aid ? $aid : 0;
		$nav = C::M('nav')->where('id', $id)->find();

		$modelname = 'module' . $nav['moduleid'];
		$extends = C::M('module')->mtable($nav['moduleid'])->getExetendList($aid);
		$html = '';
		foreach($extends AS $extend)
		{
			$html .= '<tr><td colspan="2" class="td27">' . $extend['comment'] . '</td></tr><tr class="noborder"><td class="vtop rowform" colspan="2">' . $this->setModuleType($extend) . '</td></tr>';
		}

		echo Core_Fun::array2json(array('moduleid' => $nav['moduleid'], 'html' => $html));
	}

	public function softuploadAction()
	{
		$config = array(
            "pathFormat" => 'soft/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 2048000000,
            "allowFiles" => array(".doc", ".docx", ".pdf", ".ppt"),
			"ext" => ''
        );
        $fieldName = 'file';
		
        $ret = array(); // 返回到客户端的信息
		
		$file_path = Core_Util_Upload::webuploader($fieldName, $config, false, false);
		$json = array(
			"file_id" => $file_id,
            "state" => $file_path['state'],
            "url" => $file_path['link'],
			"thumb" => $file_path['thumb'],
            "title" => $file_path['title'],
            "original" => $file_path['original'],
            "type" => $file_path['type'],
            "size" => $file_path['size']
        );
        echo json_encode($json);
	}
  
  	public function mbAction()
	{
		$config = array(
            "pathFormat" => '../view/show/default/mb/{yyyy}{mm}{dd}{time}{rand}',
            "maxSize" => 2048000000,
            "allowFiles" => array(".tpl"),
			"ext" => ''
        );
        $fieldName = 'file';
		
        $ret = array(); // 返回到客户端的信息
		
		$file_path = Core_Util_Upload::webuploader($fieldName, $config, false, false);
		$json = array(
			"file_id" => $file_id,
            "state" => $file_path['state'],
            "url" => $file_path['title'],
			"thumb" => $file_path['thumb'],
            "title" => $file_path['title'],
            "original" => $file_path['original'],
            "type" => $file_path['type'],
            "size" => $file_path['size']
        );
        echo json_encode($json);
	}

	public function categoryAction(){
		$pid = $this->getParam('pid');
		$categories = C::M('category')->where('pid', $pid)->where('useable', 1)->select();

		echo Core_Fun::array2json($categories);
	}

	private function getCategoryKind($classid = '', $action = 'add'){
		$categories = C::M('base_category')->where("pid = '0' and useable = '1'")->select();
		$html = '';
		foreach ($categories as $key => $value) {
			$childs = C::M('base_category')->where("pid = '$value[id]' and useable = '1'")->select();
			$childhtml = '';
			foreach($childs as $child){
				if(strpos($classid, $child['id']) !== false){
					$selected = ' selected';
				}else{
					$selected = '';
				}
				$childhtml .= '<option value="' . $child['id'] . '"' . $selected . '>' . $child['catname'] . '</option>';

				$childrens = C::M('base_category')->where("pid = '$child[id]' and useable = '1'")->select();
				$childrenhtml = '';
				if($childrens && $action == 'edit'){
					$childrenhtml .= '<select name="classid[]"><option value="">请选择</option>';
					foreach($childrens as $children){
						if(strpos($classid, $children['id']) !== false){
							$selected = ' selected';
						}else{
							$selected = '';
						}
						$childrenhtml .= '<option value="' . $children['id'] . '"' . $selected . '>' . $children['catname'] . '</option>';
					}
					$childrenhtml .= '</select>';
				}
			}
			$html .= '<tr class="noborder">' .
			            '<td class="vtop rowform" colspan="2">' .
			                '<span>' . $value['catname'] . '：</span>' .
			                '<span>' .
			                    '<select name="classid[]" onchange="getSonClass(this, ' . $value['id'] . ')">' .
			                        '<option value="">请选择</option>' . $childhtml .
			                    '</select>' .
			                '</span>' .
			                '<span id="sonclass' . $value['id'] . '">' . $childrenhtml . '</span>' .
			            '</td>' .
			        '</tr>';
		}

		return $html;
	}

	private function setModuleType($extend)
	{
		if($extend['type'] == 'int' || $extend['type'] == 'tinyint' || $extend['type'] == 'char')
		{
			return '<input name="' . $extend['field'] . '" value="' . $extend['value'] . '" type="text" class="txt"  />';
		}
		elseif($extend['type'] == 'varchar')
		{
			return '<textarea rows="20" cols="80" name="' . $extend['field'] . '">' . $extend['value'] . '</textarea>';
		}
		elseif($extend['type'] == 'text')
		{
			return Core_Fun::getEditor($extend['field'], $extend['value'], 100, 700, 'bbs');
		}
		elseif($extend['type'] == 'picture')
		{
			return '<div id="uploader-single">' .
	                    '<div id="fileList' . $extend['field'] . '" class="uploader-list">' .
	                        '<img width="120" height="90" src="' . $extend['value'] . '" />' .
	                    '</div>' .
	                    '<div id="filePicker' . $extend['field'] . '">选择图片</div>' .
	                '</div>' . 
	                '<input type="hidden" id="' . $extend['field'] . '" name="' . $extend['field'] . '" value="' . $extend['value'] . '">' . 
	                "<script type=\"text/javascript\">" . 
						"var picdom" . $extend['field'] . " = '" . $extend['field'] . "';" . 
						"\$list" . $extend['field'] . " = $('#fileList" . $extend['field'] . "');" . 
						"var singleuploader" . $extend['field'] . " = WebUploader.create({" . 
						    "auto: true," . 
						    "swf: SITE_URL + 'resource/webuploader/Uploader.swf'," . 
						    "server: SITE_URL + 'admin/ajax/pic'," . 
						    "pick: '#filePicker" . $extend['field'] . "'," . 
						    "accept: {" . 
						        "title: 'Images'," . 
						        "extensions: 'gif,jpg,jpeg,bmp,png'," . 
						        "mimeTypes: 'image/*'" . 
						    "}," . 
						    "fileNumLimit: 1," . 
						    "compress: false" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'fileQueued', function( file ) {" . 
						    "var \$li" . $extend['field'] . " = \$(" . 
						            "'<div id=\"' + file.id + '\" class=\"file-item thumbnail\">' +" . 
						                "'<img>' +" . 
						                "'<div class=\"info\">' + file.name + '</div>' +" . 
						            "'</div>'" . 
						            ")," . 
						        "\$img" . $extend['field'] . " = \$li" . $extend['field'] . ".find('img');" . 
						    "\$list" . $extend['field'] . ".html( \$li" . $extend['field'] . " );" . 
						    "singleuploader" . $extend['field'] . ".makeThumb( file, function( error, src ) {" . 
						        "if ( error ) {" . 
						            "\$img" . $extend['field'] . ".replaceWith('<span>不能预览</span>');" . 
						            "return;" . 
						        "}" . 

						        "\$img" . $extend['field'] . ".attr( 'src', src );" . 
						    "}, 120, 90 );" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadProgress', function( file, percentage ) {" . 
						    "var \$li" . $extend['field'] . " = \$( '#'+file.id )," . 
						        "\$percent" . $extend['field'] . " = \$li" . $extend['field'] . ".find('.progress span');" . 
						    "if ( !\$percent" . $extend['field'] . ".length ) {" . 
						        "\$percent" . $extend['field'] . " = $('<p class=\"progress\"><span></span></p>')" . 
						                ".appendTo( \$li" . $extend['field'] . " )" . 
						                ".find('span');" . 
						    "}" . 
						    "\$percent" . $extend['field'] . ".css( 'width', percentage * 100 + '%' );" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadSuccess', function( file, ret ) {" . 
						    "\$('#' + picdom" . $extend['field'] . ").val(ret.url);" . 
						    "\$( '#'+file.id ).addClass('upload-state-done');" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadError', function( file ) {" . 
						    "var \$li" . $extend['field'] . " = $( '#'+file.id )," . 
						        "\$error" . $extend['field'] . " = \$li" . $extend['field'] . ".find('div.error');" . 
						    "if ( !\$error" . $extend['field'] . ".length ) {" . 
						        "\$error" . $extend['field'] . " = $('<div class=\"error\"></div>').appendTo( $li" . $extend['field'] . " );" . 
						    "}" . 

						    "\$error" . $extend['field'] . ".text('上传失败');" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadComplete', function( file ) {" . 
						    "\$( '#'+file.id ).find('.progress').remove();" . 
						"});" . 
						"<\/script>";
		}
		else
		{
			return '';
		}
	}
}