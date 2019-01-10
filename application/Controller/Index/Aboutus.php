<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/11/20
 * Time: 16:30
 */
class Controller_Index_Aboutus extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        $perpage = 10;
        $Num = C::M('about_us')->getCount();
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $list = C::M('about_us')->field('id,title,thumbfile,addtime,describes')->order('id desc')->limit($perpage * ($curpage - 1), $perpage)->select();
        foreach($list as $key=>$value){
            $list[$key]['addtime']=date("Y-m-d",strtotime($value['addtime']));
        }

        $mpurl = "/index.php?m=index&c=aboutus&v=index";
        $multipage = $this->multipages ($Num, $perpage, $curpage, $mpurl);

        $this->assign("list",$list);
        $this->assign ('multipage', $multipage);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage)));
        $this->display('index/about_us/list.tpl');
    }

    public function detailAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('无ID!', '/index.php?m=index&c=aboutus&v=index', 2);
        }
        $info=C::M('about_us')->where("id={$id}")->find();
        if( !$info ){
            $this->showmsg('数据不存在!', '/index.php?m=index&c=aboutus&v=index', 2);
        }
        $this->assign("info",$info);
        $this->display('index/about_us/detail.tpl');
    }



}