<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/10
 * 独家之旅二级页面
 * Time: 09:34
 */
class Controller_Wap_Journey extends Core_Controller_WapAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction(){
        //广告
        $ad_list=C::M('base_ad')->field("*")->where("tagname='wap_journey_1' or tagname='wap_journey_2'")->select();
        if( $ad_list ){
            $this->assign("ad_list",$ad_list);
        }

        //达人带你去旅行
        $star_travel=C::M("star_travel")->field('id,title,thumbfile,price,user_id,days,citys')->where('status=1')->order('id desc')->limit(0,2)->select();
        if( $star_travel ){
            $this->assign("star_travel",$star_travel);
        }

        //大师带你去写生
        $sketch=C::M("sketch")->field('id,thumbfile,title,price,days,citys')->where(' status=1 ')->order('id desc')->limit(0,2)->select();
        if( $sketch ){
            $this->assign("sketch_list",$sketch);
        }

        //标签对应下的旅游路线
        $label_list=C::M('journey_label')->field('id,name')->where("status=1")->order("id desc")->limit(0,2)->select();
        if( $label_list ){
            foreach($label_list as $key=>$value){
                $sql1="select a.id,a.title,a.tjpic as articlethumb,b.price,b.lxts from ##__article_article as a left join ##__base_module_journey as b on a.id=b.aid where a.useable=1 and a.label_id={$value['id']} order by a.id desc LIMIT 3";
                $label_list[$key]['info']=Core_Db::fetchAll($sql1);
            }
            $this->assign("label_list",$label_list);
        }

        $this->display("wap/journey/journey_list.tpl");
    }

    public function new_indexAction()
    {
        $this->display("wap/journey/new_index.tpl");
    }



}
