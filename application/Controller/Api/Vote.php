<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/23
 * Time: 17:21
 */
class Controller_Api_Vote extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function indexAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $code=$this->getParam("code");
        $vote_id=$this->getParam("vote_id");
        $uid=$this->getParam("uid");
        if( !$code || !$vote_id || !$uid ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $start=date("Y-m-d 00:00:00",time());
        $end_time=date("Y-m-d 23:59:59",time());

        //查找活动是否存在或者过期
        $res=C::M('activity_vote')->field('id')->where("id={$vote_id} and status=1 and NOW() <= end_time")->find();
        if( !$res ){
            $json = array('status' => 0, 'tips' => '投票活动不存在或者已过期!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //解压opened
        $openid=$this->decode_openidAction($code);

        //查找每个用户一天只能投一次
        $sql="SELECT COUNT(a.id) as total FROM ##__vote_log as a WHERE a.addtime > '{$start}' AND a.addtime < '{$end_time}' AND a.openid='{$openid}' GROUP BY a.vote_id HAVING a.vote_id={$vote_id}";
        $total=Core_Db::fetchOne($sql);
        $total=$total['total'];
        if( $total>=3 ){
            $json = array('status' => 0, 'tips' => '您今天已经投票3次，期待明天!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $data=array(
            'vote_id'=>intval($vote_id),
            'openid'=>$openid,
            'uid'=>$uid,
            'addtime'=>date("Y-m-d H:i:s",time())
        );
        $res=C::M('vote_log')->add($data);//写进log
        if( $res ){
            //个人数+1
            C::M("activity_vote_result")->where("vote_id={$vote_id} and uid={$uid}")->setInc("vote_num",1);
            //总数加1
            $add=C::M('activity_vote')->where("id={$vote_id}")->setInc('vote_total',1);
            if( $add ){
                $json = array('status' => 1, 'tips' => '投票成功！');
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '投票失败！2');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }else{
            $json = array('status' => 0, 'tips' => '投票失败！');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }


    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

    /*
   * 解密openid
   * */
    private function decode_openidAction($code){
        $salt="kael";
        $source=base64_decode($code);
        $openid=ltrim($source,$salt);
        return $openid;
    }

}