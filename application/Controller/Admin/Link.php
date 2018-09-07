<?php
/*
 * 友情链接管理
 * Snake.L
 */
class Controller_Admin_Link extends Core_Controller_Action
{
	//分类Model.
    private $_linkModel = null;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_linkModel = new Model_Link();
    }

    var $status=array(
        0=>"<span style='color: blue;'>未进行</span>",
        1=>"<span style='color: green;'>进行中</span>",
        2=>"<span style='color: green;'>已过期</span>"
    );

    public function indexAction()
    {
        $_orderby = "id DESC";
        $where = "1 = 1";
        $Num = C::M('base_link')->where($where)->getCount();
        $perpage = 15;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
        $mpurl = 'admin/link/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
        $list =  C::M('base_link')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        if( $list ){
            foreach ($list as $key=>$value){
                $list[$key]['status']=$this->status[$value['useable']];
            }
        }

        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->display('admin/link_index.tpl');
    }

    public function addAction()
    {
        $this->editAction();
    }


    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        if( $id) {
            //标签详情
            $detail=C::M("base_link")->field("*")->where(" id= {$id} ")->find();
            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#7_0',3);
            }
        }
        $this->assign("status_list",$this->status);
        $this->assign('picdom', 'imgurl');
        $this->display('admin/link_info.tpl');
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $data=array(
            'name' => $this->getParam('name'),
            "link"=>$this->getParam("link"),
            'linkpic' => $this->getParam('pics'),
            'sort' => $this->getParam('sort'),
            'useable' => $this->getParam('status'),
            "addtime"=>time(),
            "sort"=>$this->getParam("sort")
        );

        if( $id ){
            unset($data['addtime']);
            $res=C::M("base_link")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }else{
            $adid = C::M('base_link')->add($data);
            if( $adid>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }
    }

    public function deletesceneryAction()
    {
        if ($this->getParam ('id'))
        {
            $_ids = $this->getParam ('id');
            foreach($_ids AS $i => $_id)
            {
                C::M('base_link')->where("id = $_id")->delete();
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }


}
?>