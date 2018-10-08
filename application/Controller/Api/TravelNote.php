<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/23
 * Time: 16:45
 */
class Controller_Api_TravelNote extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 发布长篇游记的接口
     *
     * */
    public function save_travel_noteAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //验证用户是否登录
        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$uid){
            //获取cookie的用户ID，如果有cookie就重新登录一次
            $cookie=$this->getCookie("travel_note");
            if( !$cookie ){//连cookie都没有直接退出
                $json = array('status' => 0, 'tips' => '请登录后再试');
                echo Core_Fun::outputjson($json);
                exit;
            }

            //解密cookie
            $code_str=urldecode(base64_decode($cookie));
            $arr=explode("_",$code_str);
            $uid=$arr[2];
        }

        $title=htmlspecialchars($this->getParam("title"));
        $desc=htmlspecialchars($this->getParam("desc"));
        $content=$this->getParam("content");
        $imgUrl=$this->getParam("imgUrl");
        $address=$this->getParam("address")??'';
        $tag=$this->getParam("tag")??'';
        if( empty($title) || empty($desc) || empty($content) || empty($imgUrl) ){
            $json = array('status' => 0, 'tips' => '请完整填写信息!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //草稿ID
        $did = intval($this->getParam('did'));

        $data=array(
            'uid'=>$uid,
            'title'=>$title,
            'desc'=>$desc,
            'content'=>urlencode($content),
            'status'=>0,
            'addtime'=>date("Y-m-d H:i:s",time()),
            'thumbfile'=>$imgUrl,
            'address'=>$address,
            'tag'=>$tag
        );

        //新增操作还是update操作
        $action=$this->getParam("action");
        if( $action=='edit' ){
            $id=intval($this->getParam("id"));
            $res=C::M('travel_note')->where(" id={$id} and uid={$uid} ")->update($data);
        }else{
            $res=C::M('travel_note')->add($data);
        }

        if( $res ){
            //查询今日是否是第一次发布游记
            $cur_date =date('Y-m-d',time());
            $publishnum = C::M('travel_note')->where("uid = $uid and addtime >= $cur_date")->getCount();
            if($publishnum <= 1){
                //赠送25经验
                C::M('user_member')->where("uid = $uid")->setInc('exp', 25);
            }
            //清除当前游记草稿
            if( $did ){
                C::M('draft')->where("uid = $uid and type = 2 and id = $did")->delete();//2表示游记
            }

            $json = array('status' => 1, 'tips' => '保存成功，等待审核~');
            //删除cookie
            setcookie('travel_note','',time()-1);
        }else{
            $json = array('status' => 0, 'tips' => '发布游记失败!');
        }
        echo Core_Fun::outputjson($json);
        exit;
    }

    /*
     * 删除游记
     * */
    public function del_travel_noteAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $id = intval($this->getParam('id'));
        $uid = $_SESSION['userinfo']['uid'];
        if(!$id){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $info=C::M("travel_note")->where(" id={$id} ")->find();
        if( !$info ){
            $json = array('status' => 0, 'tips' => '文章不存在!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $res=C::M("travel_note")->where(" id={$id} and uid= {$uid} ")->delete();
        if( $res ){
            $json = array('status' => 1, 'tips' => '删除成功!');
        }else{
            $json = array('status' => 0, 'tips' => '删除失败!');
        }
        echo Core_Fun::outputjson($json);
        exit;
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }






}