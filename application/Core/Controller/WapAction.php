<?php



/** 

 * wap模块控制器基类 => 如果wap

 *

 * @version $Id: Core_Controller_WapAction.php $

 * @package Core

 * @time 2013/01/28

 */

class Core_Controller_WapAction extends Core_Controller_Action

{

    

    //登录用户信息

    protected $userInfo = array();



    /**

     * 分发前执行的操作

     * 如有需要请重载

     * @author Icehu

     */

    public function preDispatch()

    {

        parent::preDispatch();

        

        //Wap是否关闭

        $wapOn = Core_Config::get('wap_on', 'wap', true);

        if(! $wapOn)

        {

            header('HTTP/1.1 404 Not Found');

            header("status: 404 Not Found");

            exit();

        }

        //$cUser = C::M('User_Member')->onGetCurrentUser();
		$uid = $_SESSION['userinfo']['uid'];
        $cUser = C::M('user_member')->where("uid = '$uid'")->find();
		if($cUser){ 
            $cUser['avatar'] = $cUser['headpic']?$cUser['headpic']:'/resource/images/img-lb2.png';
          	$cUser['cover'] = $cUser['cover']?$cUser['cover']:'/resource/m/images/ban3.jpg';
            $weidu = C::M('msg_detail')->where("to_id = $uid and status = 0")->getCount();
            $this->assign('weidu', $weidu);
 
            //获取等级
            $lv = C::M('lv')->where("exp <= ".$cUser['exp'])->order('id desc')->limit(0,1)->select();
            $cUser['lvname'] = $lv[0]['lvname'];
        }
        //验证用户是否已本地登录
        if(empty($cUser['uid']))
        {
            //验证是否有令牌
            if(! $token = $this->getCookie('vpcv_token'))
			{
				$userInfo = array();
			}
            else
			{
				//验证令牌
				$authTokenArr = explode("\t", Core_Comm_Token::authcode($token));
				
				if(! C::M('Base_Token')->getTokenInfoByUidAndSign($authTokenArr[0], $authTokenArr[1]))
				{
					Core_Fun::setcookie('vpcv_token', null);
				}
				//验证用户是否存在
				if(! $localUser = C::M('User_Member')->getUserInfoByUid($authTokenArr[0]))
				{
					Core_Fun::setcookie('vpcv_token', null);
				}
				
				//验证用户是否在屏蔽组
				if($localUser['gid'] == 9)
				{
					Core_Fun::setcookie('vpcv_token', null);
					$this->showmsg('', 'index', 0);
				}
				
				//将登录状态赋给用户
				C::M('User_Member')->onSetCurrentUser($localUser['uid'], $localUser['username'], $localUser['roleid']);
				$userInfo = $localUser;
			}
        }
        else
        {
            //验证用户是否存在
            if(! $localUser = C::M('User_Member')->getUserInfoByUid($cUser['uid']))
            {
                C::M('User_Member')->onLogout();
            }
			else
			{
				$userInfo = $localUser;
				//验证用户是否在屏蔽组
				if($localUser['gid'] == 9)
				{
					C::M('User_Member')->onLogout();
					$this->showmsg('', 'index', 0);
				}
			}
        }
        $front = Core_Controller_Front::getInstance();

        $pathinfo = $front->getPathinfo();

        $userInfo['detail'] = C::M('User_Detail')->getInfoByUid($userInfo['uid']);
        $this->userInfo = $userInfo;

        $this->assign('pathinfo', $pathinfo); //原始的pathinfo

        $this->assign('rawpathinfo', Core_Fun::iurlencode($pathinfo)); //做过安全转义的url，使用需要Core_Fun::iurldecode
		$this->assign('user', $cUser);

    }

	public function getUser()
	{
        $cUser = C::M('User_Member')->onGetCurrentUser();
		return $cUser;
	}

}