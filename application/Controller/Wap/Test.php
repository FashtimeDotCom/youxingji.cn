<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/1
 * Time: 15:52
 */
class Controller_Wap_Test extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction()
    {
        $this->assign('homecontent', Core_Fun::getEditor('homecontent', '', 300, 700, 'bbs'));

        $this->display('wap/test.tpl');
    }

    public function changyanAction()
    {
        $id = intval($this->getParam('id'));
        $article = C::M('ryt')->where('id', $id)->find();
        if(!$article){
            $this->showmsg('', '/', 0);
            exit;
        }
        $article['addtime'] = date('Y-m-d', $article['show_time']);
        C::M('ryt')->where('id', $id)->setInc('shownum', 1);

        //推荐日月潭
        $tjryt = C::M('ryt')->where("istop = 1")->order("rand()")->limit('0,5')->select();
        //日月潭
        $tjlist = C::M('ryt')->where("istop = 1")->order("shownum desc")->limit('0,10')->select();

        //生成畅言的source_id
        $source_id=Core_Fun_Encode::createSourceId("pc",'ryt',$id);
        $this->assign("source_id",$source_id);

        $this->assign('ns', 'ryt');
        $this->assign('tjryt', $tjryt);
        $this->assign('tjlist', $tjlist);
        $this->assign('article', $article);
        $this->display("wap/test2.tpl");
    }



}