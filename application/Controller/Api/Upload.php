<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/8/2
 * Time: 11:42
 */
class Controller_Api_Upload extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function wechat_uploadAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

//        $user_id = $_SESSION['userinfo']['uid'];
//        //查询是否登陆
//        if(!$user_id){
//            $json = array('status' => 0, 'tips' => '请登录后再试');
//            echo Core_Fun::outputjson($json);
//            exit;
//        }

        //获取一个微信图片的severID数组
        $list=$this->getParam('list');
        if( isset($list) && !empty($list) && is_array($list) ){
            $num=count($list);
            $access_token=$_SERVER['access_token'];
            if(!$access_token  ){
                $access_token=Core_Fun::wx_get_token();
            }

            $count=0;
            $path=HTDOCS_ROOT .'uploadfile/image/'.date('Ymd',time())."/";
            $ress=$this->createFolderAction($path);//生成文件
            if( !$ress ){
                $json = array('status' => 0, 'tips' => '目录不存在');
                echo Core_Fun::outputjson($json);
                exit;
            }
            $path_arr=array();
            foreach($list as $key=>$value){
                $res=$this->getImage_from_wechatAction($value,$access_token,$path);
                if( $res ){
                    $arr=explode("/www/wwwroot/youxingji.cn",$res);
                    $path_arr[]=$arr[1];
                    $count++;
                }else{
                    $json = array('status' => 0, 'tips' => '上传失败');
                    echo Core_Fun::outputjson($json);
                    exit;
                }
            }

            //判断是否全部图片完成
            if( $count==$num ){
                $json = array('status' => 1, 'tips' => '上传成功','path_arr'=>$path_arr);
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '上传失败');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }else{
            $json = array('status' => 0, 'tips' => '上传失败');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    private function getImage_from_wechatAction($severId,$access_token,$path)
    {
        clearstatcache();
        $url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$access_token}&media_id={$severId}";
        $salt=substr($severId,1,6);
        $path=$path.time().$salt.rand(1,1000).".jpg";

        $image_data=$this->downloadWeixinFileAction($url);//从微信服务器中读取数据
        if( $image_data ){
            //把获取到的base64代码，生成图片
            $res=$this->saveWeixinFileAction($path,$image_data['body']);
            if( $res ){
                return $path;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function downloadWeixinFileAction($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);    //只取body头
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
        curl_close($ch);
        $imageAll = array_merge(array('header' => $httpinfo), array('body' => $package));
        return $imageAll;
    }

    public function createFolderAction($path)
    {
        if (!file_exists($path) && !mkdir($path, 0777, true))
        {
            return false;
        }
        return true;
    }

    public function saveWeixinFileAction($path, $filecontent)
    {
        $local_file = fopen($path, 'w');
        if (false !== $local_file){
            if (false !== fwrite($local_file, $filecontent)) {
                fclose($local_file);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }



}