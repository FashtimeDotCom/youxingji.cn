<?php

/**
 * 自定义函数库
 *
 * @author Snake.L
 */
class Core_Helper
{
    /*public static function getShow($id){
        $shownum = C::M('article')->where('id', $id)->getField('shownum');
        return $shownum;
    }*/

    public static function follownum($uid)
    {
    	$num = C::M('follow')->where("uid = $uid")->getCount();
    	return $num;
    }

    public static function fansnum($uid)
    { 
		$num = C::M('follow')->where("bid = $uid")->getCount();
    	return $num;
    }

    public static function visitor($uid)
    {
        $num = C::M('visitor')->where("bid = $uid")->getCount();
        return $num;
    }

    public static function isfollow($bid)
    {
        $uid = $_SESSION['userinfo']['uid'];
        $res = C::M('follow')->where("uid = $uid and bid = $bid")->find();
        if($res){
            return '已关注';
        }else{
            return '<span>关注</span>';
        }
    }

    public static function isfollows($bid)
    {
        $uid = $_SESSION['userinfo']['uid'];
        $res = C::M('follow')->where("uid = $uid and bid = $bid")->find();
        if($res){
            return '已关注';
        }else{
            return '<b>+</b>  关注';
        }
    }

    public static function avatar($uid)
    {
        $userinfo = C::M('user_member')->where("uid = $uid")->find();
        if(!$userinfo['headpic']){
            $userinfo['headpic'] = '/resource/images/img-lb2.png';
        }
        return $userinfo['headpic'];
    }

    public static function username($uid)
    {
        $userinfo = C::M('user_member')->where("uid = $uid")->find();
        return $userinfo['username'];
    }

    public static function autograph($uid)
    {
        $userinfo = C::M('user_member')->where("uid = $uid")->find();
        //var_dump($userinfo);
        return $userinfo['autograph'];
    }

    public static function href($uid)
    {
        return '/index.php?m=index&c=muser&v=index&id=' . $uid;
    }

    public static function mhref($uid)
    {
        return '/index.php?m=wap&c=muser&v=index&id=' . $uid;
    }

    public static function lv($uid)
    {
        $cUser = C::M('user_member')->where("uid = '$uid'")->find();
        //获取等级
        $lv = C::M('lv')->where("exp <= ".$cUser['exp'])->order('id desc')->limit(0,1)->select();
        return $lv[0]['lvname'];
    }
}