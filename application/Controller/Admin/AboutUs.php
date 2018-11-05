<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/16
 * Time: 10:21
 * Desc:关于我们
 */
class Controller_Admin_AboutUs extends Core_Controller_Action
{
    var $_pagetitle="关于我们";
    var $_showfield=array(
        "id"=>"ID",
        "title"=>"标题",
        "addtime"=>"添加时间",
        "sort"=>"排序",
        'is_top'=>'推荐首页'
    );

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle",$this->_pagetitle);
    }

    public function indexAction()
    {
        $select_field=array_keys($this->_showfield);
        $field_list=array_values($this->_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;
        $perpage=10;
        $mapurl="admin/aboutUs/index/";
        $limit = $perpage * ($curpage - 1) . "," . $perpage;
        $list=C::M('about_us')->order('id desc')->limit($limit)->select();
        $this->assign("list",$list);

        $total=C::M('about_us')->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/about_us/list.tpl");
    }

    public function addAction(){
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;

        if( $id ){
            $detail=C::M('about_us')->where("id={$id}")->find();
            if( $detail['sort']==1 ){
                $detail['message']="250X373";
            }else if( $detail['sort']==2 || $detail['sort']==3 ){
                $detail['message']="330X180";
            }
            if( $detail ){
                $this->assign('content', Core_Fun::getEditor('content', $detail['content'], 300, 700, 'bbs'));
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,信息类型不存在!', 'admin/index/index#14_0',3);
            }
        }else{
            $this->assign('content', Core_Fun::getEditor('content', '', 300, 700, 'bbs'));
        }
        $this->assign('picdom', 'imgurl');
        $this->assign('picdoms', 'small_img');
        $this->display("admin/about_us/edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id")??0;

        $title=$this->getParam("title");
        $thumbfile=$this->getParam("thumbfile");
        $top_picture=$this->getParam("top_picture");
        $desc=$this->getParam("desc");
        $content=Core_Util_Tutil::contentKeywords($this->getParam('content'));
        $sort=(int)$this->getParam("sort")??4;

        $data=array(
            "title"=>$title,
            "desc"=>$desc,
            "content"=>$content,
            "thumbfile"=>$thumbfile,
            "top_picture"=>$top_picture,
            "sort"=>(int)$sort,
        );

        //先将其他的地方对应的排序数字改为4,因为排序只能有一个
        if( $sort !=4 ){
            C::M('about_us')->where("sort={$sort}")->update(array('sort'=>4));
        }

        if( $id>0 ){//update
            $res=C::M("about_us")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add
            $data['addtime']=date("Y-m-d H:i:s",time());
            $res=C::M("about_us")->add($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }

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
                    'is_top' => intval($_istops[$_id]),
                );

                C::M('about_us')->update ($_data);
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
                C::M('about_us')->where("id = $_id")->delete();
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }


}