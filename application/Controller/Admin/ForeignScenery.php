<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/12
 * Time: 10:19
 */
class Controller_Admin_ForeignScenery extends Core_Controller_Action
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function indexAction()
    {
        $_orderby = "id DESC";
        $where = "1 = 1";
        $Num = C::M('foreign_scenery')->where($where)->getCount();
        $perpage = 15;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = Core_Comm_Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
        $mpurl = 'admin/ForeignScenery/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
        $list =  C::M('foreign_scenery')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach ($list as $key => $value) {
            $user = C::M('writer')->where("id = $value[wid]")->find();
            $list[$key]['name'] = $user['name'];
        }
        $this->assign('list', $list);
        $this->assign ('multipage', $multipage);
        $this->display('admin/youhua/foregin_scenery.tpl');
    }

    public function addAction()
    {
        $this->editAction();
    }


    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        if( $id) {
            //油画详情
            $detail=C::M("foreign_scenery")->field("*")->where(" id= {$id} ")->find();
            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#5_2',3);
            }
        }

        //画家列表
        $writer_list=C::M("writer")->field("id,name")->select();
        if( $writer_list ){
            $writer_list=array_column($writer_list,"name",'id');
            $this->assign("writer_list",$writer_list);
        }

        $this->assign('picdom', 'imgurl');
        $this->display('admin/youhua/foregin_scenery_edit.tpl');
    }

    public function saveAction()
    {
        $id=$this->getParam("id");
        $data=array(
            'title' => $this->getParam('title'),
            'pics' => $this->getParam('pics'),
            'thumbpic' => $this->getParam('thumbpic'),
            'size' => $this->getParam('size'),
            'place' => $this->getParam('place'),
            'wid' => $this->getParam('wid'),
            'price'=>$this->getParam("price"),
            "show_num"=>$this->getParam("show_num"),
            "top_num"=>$this->getParam("top_num"),
            "from"=>$this->getParam("from")
        );


        if( $id ){
            $res=C::M("foreign_scenery")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }
        }else{
            $adid = C::M('foreign_scenery')->add($data);
            if( $adid>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }



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

                C::M('foreign_scenery')->update ($_data);
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
                C::M('foreign_scenery')->where("id = $_id")->delete();
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }






}