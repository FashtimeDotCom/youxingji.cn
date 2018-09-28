<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/25
 * Time: 09:30
 */
class Controller_Wap_Faq extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    //达人问答二级页面
    public function indexAction()
    {
        //最热回答
        $sql="SELECT a.*,b.username FROM ##__faq as a LEFT JOIN ##__user_member as b on a.uid=b.uid WHERE a.status=1 ORDER BY a.show_num DESC LIMIT 4";
        $list=Core_Db::fetchAll($sql);
        if( $list ){
            foreach($list as $key=>$value){
                if( $value['label'] ){
                    $list[$key]['label']=explode("/",$value['label']);
                }
            }

            if( count($list)==4 ){
                $data=array_chunk($list,2,true);
            }else{
                $data[]=$list;
            }
        }

        //广告图
       $ad=C::M('base_ad')->field('imgurl,linkurl')->where("tagname='wap_faq'")->find();
       if($ad){
           $this->assign("ad",$ad);
       }

       //问达人
        $star_list=C::M('user_member')->field('uid,headpic,username')->where("is_faq_star=1")->limit(6)->select();
        if( $star_list ){
            foreach($star_list as $key=>$value){
                $star_list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
            }
            $this->assign("star_list",$star_list);
        }

        //问答总数.
        $total=C::M('faq')->where("status=1")->getCount();
        $this->assign("total",$total);

        $this->assign("list",$data);
        $this->display('wap/faq/faq_list.tpl');
    }

    //问答详情页
    public function detailAction()
    {


        $this->display('wap/faq/faq_detail.tpl');
    }





}