<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/27
 * Time: 15:32
 */
class Controller_Api_Faq extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
 * 问题列表，查看更多
 * */
    public function get_moreAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        if( !$page || $page <=0 ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //分类,1-热门回答，2-最新回答，3-等待回答
        $type=$this->getParam("type")??1;
        if( !in_array($type,array(1,2,3)) ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        switch($type){
            case 1:
                $order="a.show_num desc";
                break;
            case 2:
                $order="a.addtime desc";
                break;
            case 3:
                $order="a.addtime desc";
                break;
            default:
                $order="a.show_num desc";
                break;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        if( $type==3 ){
            $list=C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b',"a.uid=b.uid","left")->where("a.status=1 and a.is_response=0")->order($order)->limit($limit)->select();
        }else{
            $list=C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b',"a.uid=b.uid","left")->where("a.status=1 and a.is_response=1")->order($order)->limit($limit)->select();
        }

        if( $list ){
            foreach($list as $key=>$value){
                $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
            }

            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }


    /*
     * 回答列表查看更多--详情页
     *
     * */
    public function response_moreAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        $faq_id=$this->getParam('faq_id');
        if( !$page || $page <=0 || !$faq_id ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //分类,1-按热度，2-按时间
        $type=$this->getParam("type")??1;
        if( !in_array($type,array(1,2)) ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        switch($type){
            case 1:
                $order="a.show_num desc";
                break;
            case 2:
                $order="a.addtime desc";
                break;
            default:
                $order="a.show_num desc";
                break;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list=C::M('faq_response as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b',"a.uid=b.uid","left")->where("a.faq_id={$faq_id}")->order($order)->limit($limit)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['headpic']=empty($value['headpic'])?'/resource/images/img-lb2.png':$value['headpic'];
                //数据处理，只显示前面文字，过滤图片
                $list[$key]['content']=$this->filter_imagAction($value['content']);
            }
        }

        if( $list ){
            $json = array('status' => 1, 'tips' =>$list,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }

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

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}