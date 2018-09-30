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
        $sql="SELECT a.*,b.username,b.headpic FROM ##__faq as a LEFT JOIN ##__user_member as b on a.uid=b.uid WHERE a.status=1 and a.is_response=1 ORDER BY a.show_num DESC LIMIT 4";
        $list=Core_Db::fetchAll($sql);
        if( $list ){
            foreach($list as $key=>$value){
                if( $value['label'] ){
                    $list[$key]['label']=explode("/",$value['label']);
                    $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
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
        $star_list=C::M('user_member')->field('uid,headpic,username')->where("is_faq_star=1")->limit(0,6)->select();
        if( $star_list ){
            foreach($star_list as $key=>$value){
                $star_list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
            }
            $this->assign("star_list",$star_list);
        }

        //问答总数.
        $total=array();
        $total['hot']=C::M('faq')->where("status=1 and is_response=1")->getCount();
        $total['new']=$total['hot'];
        $total['waiting']=C::M('faq')->where('status=1 and is_response=0')->getCount();
        $this->assign("total",$total);

        $this->assign("list",$data);
        $this->display('wap/faq/faq_list.tpl');
    }

    //问答详情页
    public function detailAction()
    {
        $id=$this->getParam("id");
        if( $id<=0 ){
            $this->showmsg('缺少参数', 'index.php?m=wap&c=faq&v=index', 2);
        }

        //通过ID查找问题
        $faq_info=C::M('faq as a')->field("a.*,b.username")->join("##__user_member as b","a.uid=b.uid","left")->where("a.id={$id}")->find();
        if( $faq_info ){
            C::M('faq')->where('id', $id)->setInc('show_num', 1);
            $this->assign("faq_info",$faq_info);
        }

        //查找回答总数
        $response_total=C::M('faq_response')->where("faq_id={$id}")->getCount();
        $this->assign("total",$response_total);

        //查找回答，4条
        $list=C::M('faq_response as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b',"a.uid=b.uid","left")->where("a.faq_id={$id}")->order('a.show_num desc')->limit(0,4)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
                //数据处理，只显示前面文字，过滤图片
                $list[$key]['content']=$this->filter_imagAction($value['content']);
            }
        }
        $this->assign("list",$list);
        $this->display('wap/faq/faq_detail.tpl');
    }

    /*
     * 过滤图片，读取文字
     * */
    public function filter_imagAction($content)
    {
        $content=strip_tags($content);//去掉HTML标签
        $content=substr($content,0,255);//只截取一部分
        return $content;
    }

    //发布问题
    public function set_faqAction()
    {

        $this->display('wap/faq/set_faq.tpl');
    }

    //我要回答
    public function response_faqAction()
    {

        $this->display("wap/faq/response_faq.tpl");
    }



}