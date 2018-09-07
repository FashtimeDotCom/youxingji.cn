<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/16
 * Time: 09:33
 */
class Controller_Index_Travel extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function travel_detailAction()
    {
        $id=$this->getParam("id");
        if( !$id ){
            $this->showmsg('非法操作，跳转中...', '', 2);
        }

        $mdl=new Model_Swimdetail();
        $one=$mdl->get_one_detail($id);

        if( !$one ){
            $this->showmsg('ID不存在，跳转中...', '', 2);
        }
        $info=$one[0];
        $info['content']=json_decode($info['content']);
        $info['headpic']=$info['headpic']??"/resource/images/img-lb2.png";
        $info['describes']=Core_fun::cn_substr(strip_tags($info['describes']),250,'...');
        $info['addtime']=date("Y-m-d H:i:s",$info['addtime']);

        C::M('travel')->where('id', $id)->setInc('shownum', 1);

        //相关动态
        $uid=$info['uid'];
        $ano_info=$mdl->get_batch_detail($uid,$id);
        if( $ano_info ){
            foreach( $ano_info as $key=>$value ){
                $ano_info[$key]['content']=json_decode($value['content']);
                $ano_info[$key]['content']=$ano_info[$key]['content'][0];
                $ano_info[$key]['describes']=Core_fun::cn_substr(strip_tags($ano_info[$key]['describes']),150,'...');
                $ano_info[$key]['addtime']=date("Y-m-d H:i:s",$ano_info[$key]['addtime']);
            }
            $this->assign("ano_info",$ano_info);
        }

        //生成畅言的source_id
        $source_id=Core_Fun_Encode::createSourceId("pc",'drb',$id);
        $this->assign("source_id",$source_id);

        //目的在
        $tourismlist = C::M('tourism')->select();
        $this->assign ('tourismlist', $tourismlist);

        $this->assign("info",$info);
        $this->assign('ns', 'star');
        $this->assign("id",$id);
//        var_dump($info);die();
        $this->display('index/travel_detail.tpl');
    }



}