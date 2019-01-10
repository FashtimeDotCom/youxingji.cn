<?php
/**
 * Created by PhpStorm
 * User: 小天
 * E-mail: 11072162@qq.com
 * Date: 2018/12/25
 * Time: 10:03
 */

use OSS\OssClient;
use Core\Comm\OssFileUpload;

class Controller_Admin_WeChatMenu extends Core_Controller_Action
{

    public $_pagetitle = '微信菜单';

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle", $this->_pagetitle);
    }

    public function indexAction()
    {
        $base64 = 'data:image/jpeg;base64,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';

        var_dump(get_included_files());
        exit;
        $res = OssFileUpload::image_upload($base64);
        var_dump($res);

        exit;
        $oss = config('aliyun.oss');
        $object = "1.jpg";
        $content = "Hi, OSS.";
        $bucket_name = $oss['bucket_name'];
        $bucket_domain = $oss['bucket_domain'];
        $ossClient = new OssClient($oss['access_key_id'], $oss['access_key_secret'], $oss['endpoint']);

        $bucket_domain = $oss['bucket_domain'];
        echo "<img src='https://{$bucket_domain}/image/5.jpg!{$oss['thumb_style']['thumb_200_200']}' />";
        echo "https://{$bucket_domain}/image/5.jpg@!{$oss['thumb_style']['thumb_100_100']}";

        // 防盗链
        $timeout = 360;
        $options = array(
            OssClient::OSS_PROCESS => $oss['anti_theft_chain']['img_200_200']
        );
        $signedUrl = $ossClient->signUrl($bucket_name, $object, $timeout, "GET", $options);
        echo '<br/><br/><br/>',$signedUrl;

        var_dump(get_included_files());
        exit;
        $this->display('admin/we_chat/list.tpl');   
    }

    public function addAction()
    {
        $menu_type = config('we_chat.menu_type');
        $this->assign('menu_type', $menu_type);
        $this->display('admin/we_chat/add.tpl');
    }
}