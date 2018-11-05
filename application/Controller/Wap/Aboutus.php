<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/10/15
 * Time: 14:00
 */
class Controller_Wap_AboutUs extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        //广告
        $ad=C::M('base_ad')->field('imgurl,linkurl')->where("tagname='wap_about_us'")->find();
        $this->assign('ad',$ad);

        //关于我们列表
        $list=C::M('about_us')->order('sort asc,id desc')->limit(0,4)->select();
        $this->assign("list",$list);

        $total=C::M('about_us')->getCount();
        $this->assign("total",$total);

        $this->display('wap/about_us/about_us_list.tpl');
    }

    public function detailAction()
    {
        //
        $id=$this->getParam('id');
        if( !$id ){
            $this->showmsg('缺少参数', 'index.php?m=wap&c=aboutus&v=index', 2);
        }

        $detail=C::M('about_us')->where("id={$id}")->find();
        if( !$detail ){
            $this->showmsg('参数错误', 'index.php?m=wap&c=aboutus&v=index', 2);
        }
        $this->assign('detail',$detail);

        $this->display('wap/about_us/about_us_detail.tpl');
    }



}