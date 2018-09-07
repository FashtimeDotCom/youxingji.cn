<?php
/*
 * 心情管理
 * @author Snake.L
 */
class Controller_Admin_Mind extends Core_Controller_Action
{
	private $_mindModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_mindModel = new Model_User_Mind();
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_userModel = new Model_User_Member();
		//搜索
		$_search = array(
			array('mind', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = $this->_mindModel->getMindCountByWhere($_searchArr['where']);
		
		$perpage = Core_Config::get ('page_size', 'basic', 100);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/mind/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$minds = $this->_mindModel->getMindList($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($minds AS $idx => $mind)
		{
			$minds[$idx]['realname'] = $_userModel->getInfoByUid('realname', $mind['uid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('minds', $minds);
		$this->display('admin/mind_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            $this->_mindModel->delMind ($ids);
        }
		
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'useable' => intval ($_useables[$i])
                );
                $this->_mindModel->editMind ($_data);
            }
            $this->showmsg ('操作成功，正在返回...');
        }
	}
}