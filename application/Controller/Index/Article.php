<?php
/**
 * vpcvcms
 * 页面
 */
class Controller_Index_Article extends Core_Controller_TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();

        $this->crumb = array();
	}
    public function indexAction()
    { 
		$this->display('article/index.tpl');
    }

    public function showAction()
    {
    	$id = $this->getParam('id');
        $article = C::M('article')->where('id', $id)->find();
        if(!$article['id'])
            $this->showmsg('', 'index/index/none', 0);
        if($article['isview'] == 1)
            $this->showmsg('注册访问', 'u/login');
        C::M('article')->where('id', $id)->setInc('shownum', 1);

        $extends = C::M('module')->mtable($article['moduleid'])->queryOne('*', array(array('aid', $article['id'])));
        $article['extend'] = $extends;
        $article['seotitle'] = $article['seotitle'] ? $article['seotitle'] : $article['title'];
        $nav = C::M('nav')->where('id', $article['catid'])->find();
        $template = !empty($nav['temparticle']) ? $nav['temparticle'] : 'show_' . $nav['moduleid'] . '.tpl';
        $this->assign('crumb', $this->getCrumb($article['catid'], $article['title']));
        $this->assign('prevnext', $this->getPrevNext($id));
        $this->assign('galleries', C::M('gallery')->getGalleryList($id, BELONG_ARTICLE));
        $this->assign('article', $article);
        $this->assign('nav', $nav);
        $this->display('article/' . $template);
    }

    public function listAction()
    {
    	$pinyin = $this->getParam('pinyin');
        $nav = C::M('nav')->getNavByPinyin($pinyin);
    	if(!$nav['id'])
    		$this->showmsg('', 'index/index/none', 0);
        if($nav['isview'] == 1)
            $this->showmsg('注册访问', 'u/login');

        $nav['style'] = $nav['style'] ? $nav['style'] : 1;
        $nav['seotitle'] = $nav['seotitle'] ? $nav['seotitle'] : $nav['name'];
        $son = C::M('nav')->getNavList(0, $nav['id']);
        if($son || $nav['parentid'] == 2)
        {
            $nav['pid'] = $nav['id'];
        }
        else
        {
            $nav['pid'] = $nav['parentid'];
        }
        $this->assign('nav', $nav);
        $this->assign('crumb', $this->getCrumb($nav['id']));
    	if($nav['style'] == 1)
        {
            $wapOn = Core_Config::get('wap_on', 'wap', true);
            $where = "useable = '1'";
            if($nav['id']){
                $where .= " and FIND_IN_SET('$nav[id]', catarr)";
            }

            $_orderby = "addtime DESC,sort ASC";
            
            $Num = C::M('article')->where($where)->getCount();
            
            $perpage = 20;
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = 'article/' . $pinyin . '/';
            $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
            $articles = C::M('article')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach($articles AS $idx => $article)
            {
                $pinyin = C::M('nav')->where('id', $article['catid'])->getField('pinyin');
                $pic = $article['articlethumb'] ? $article['articlethumb'] : Core_Fun::getPathroot() . 'resource/images/default.jpg';
                $origin = $article['articlepic'] ? $article['articlepic'] : Core_Fun::getPathroot() . 'resource/images/default.jpg';
                $articles[$idx]['articlethumb'] = $articles[$idx]['image'] = $pic;
                $articles[$idx]['origin'] = $origin;
                $articles[$idx]['catname'] = C::M('nav')->where('id', $article['catid'])->getField('name');
                if(Core_Comm_Validator::isMobile() && $wapOn)
                {
                    $articles[$idx]['url'] = Core_Fun::getPathroot() . 'wap/article/' . $pinyin . '/' . $article['id'] . '.html';
                    $articles[$idx]['caturl'] = Core_Fun::getPathroot() . 'wap/article/' . $pinyin;
                }
                else
                {
                    $articles[$idx]['url'] = Core_Fun::getPathroot() . 'article/' . $pinyin . '/' . $article['id'] . '.html';
                    $articles[$idx]['caturl'] = Core_Fun::getPathroot() . 'article/' . $pinyin;
                }
                
                $extends = C::M('module')->mtable($article['moduleid'])->queryOne('*', array(array('aid', $article['id'])));
                $articles[$idx]['extend'] = $extends;
            }

            $template = !empty($nav['templist']) ? $nav['templist'] : 'list_' . $nav['moduleid'] . '.tpl';

            $this->assign ('multipage', $multipage);
            $this->assign('articles', $articles);
            $this->display('article/' . $template);
        }
    	else if($nav['style'] == 2)
        {
            $template = !empty($nav['tempindex']) ? $nav['tempindex'] : 'index_' . $nav['moduleid'] . '.tpl';
            $this->display('article/' . $template);
        }
        else
        {
            $this->showmsg('', 'index/index/none', 0);
        }
    }

    public function getCrumb($navid, $title = '')
    {
        $nav = C::M('nav')->where('id', $navid)->find();
        $childs = C::M('nav')->where('parentid', $navid)->getCount();
        $pathroot = Core_Fun::getPathroot();
        if($nav['parentid'] == 0)
        {
            return '<span> &raquo; </span><span><a href="' . $pathroot . 'article/' . $nav['pinyin'] . '">' . $nav['name'] . '</a></span>' . ($title ? '<span> &raquo; </span><span>' . $title . '</span>' : '');
        }
        else
        {
            $crumb = implode('', $this->getCrumbTree($navid));
            return $crumb . '<span> &raquo; </span><span><a href="' . $pathroot . 'article/' . $nav['pinyin'] . '">' . $nav['name'] . '</a></span>' . ($title ? '<span> &raquo; </span><span>' . $title . '</span>' : '');
        }
    }

    private function getCrumbTree($navid)
    {
        $nav = C::M('nav')->where('id', $navid)->find();
        $pathroot = Core_Fun::getPathroot();
        if($nav['parentid'] != 0)
        {
            $parent = C::M('nav')->where('id', $nav['parentid'])->find();
            array_push($this->crumb, '<span> &raquo; </span><span><a href="' . $pathroot . 'article/' . $parent['pinyin'] . '">' . $parent['name'] . '</a></span>');
            $this->getCrumbTree($nav['parentid']);
        }

        return array_reverse($this->crumb);
    }

    private function getPrevNext($aid)
    {
        $moduleid = C::M('article')->where('id', $aid)->getField('moduleid');
        $moduleid = $moduleid ? $moduleid : 'article';
        $mobile = '';
        if(Core_Comm_Validator::isMobile() && $wapOn){
            $mobile = 'wap/';
        }
        $prev = C::M('article')->queryOne('id,catid,title', array(array('id', $aid, '<'), array('moduleid', $moduleid)), 'id DESC');
        $pinyin = C::M('nav')->where("id = '$prev[catid]'")->getField('pinyin');
        $prev['url'] = SITEURL . $mobile . 'article/' . $pinyin . '/' . $prev['id'] . '.html';
        $next = C::M('article')->queryOne('id,catid,title', array(array('id', $aid, '>'), array('moduleid', $moduleid)), 'id ASC');
        $pinyin = C::M('nav')->where("id = '$next[catid]'")->getField('pinyin');
        $next['url'] = SITEURL . $mobile . 'article/' . $pinyin . '/' . $next['id'] . '.html';

        return array('prev' => $prev, 'next' => $next);
    }
}