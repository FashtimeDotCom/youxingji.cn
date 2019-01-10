<?php
/**
 * Created by PhpStorm
 * User: 小天
 * E-mail: 11072162@qq.com
 * Date: 2018/12/28
 * Time: 14:42
 */

namespace Core\Comm;

use OSS\Core\OssException;
use OSS\OssClient;

class OssFileUpload
{
    /**
     * 阿里云oss图片上传
     * @param $base64_data
     * @param string $ossUploadPath
     * @return array|null
     */
    public static function image_upload($base64_data, $ossUploadPath = 'image')
    {
        $oss_config = config('aliyun.oss');
        //实例化对象 将配置传入
        if (APP_STATUS == 'develop') {
            $ossClient = new OssClient($oss_config['access_key_id'], $oss_config['access_key_secret'], $oss_config['endpoint']);
        } else {
            $ossClient = new OssClient($oss_config['access_key_id'], $oss_config['access_key_secret'], $oss_config['endpoint']);
        }

        if ($_FILES['file']) {  // 表单上传
            if ($_FILES['file']['error'] === 0) {
                $name = $_FILES['file']['name'];
                $format = strrchr($name, '.');//截取文件后缀名如 (.jpg)
                /*判断图片格式*/
                $allow_type = ['.jpg', '.jpeg', '.gif', '.bmp', '.png'];
                if (!in_array($format, $allow_type)) {
                    return ['code' => 400, 'msg' => '文件格式不在允许范围内哦'];
                }
                // 尝试执行
                try {
                    //这里是有sha1加密 生成文件名 之后连接上后缀
                    $fileName = $ossUploadPath . '/' . date("Ymd") . '/' . sha1(date('YmdHis', time()) . uniqid()) . $format;
                    //执行阿里云上传
                    if (APP_STATUS == 'dev') {
                        $result = $ossClient->uploadFile($oss_config['bucket_name'], $fileName, $_FILES['file']['tmp_name']);
                    } else {
                        $result = $ossClient->uploadFile($oss_config['bucket_name'], $fileName, $_FILES['file']['tmp_name']);
                    }
                    /*组合返回数据*/
                    $arr = [
                        'oss_url' => $result['info']['url'],  //上传资源地址
                        'relative_path' => $fileName     //数据库保存名称(相对路径)
                    ];
                } catch (OssException $e) {
                    return ['code' => 400, 'msg' => $e->getMessage()];
                }
                //将结果返回
                return ['code' => 200, 'file_url' => $arr['oss_url']];
            }
            return ['code'=>400,'msg'=>'文件不存在'];
        } else {
            $result = self::base64_image_upload($base64_data);
            if ($result['code'] === 200) {
                $filePath = $result['path'] . $result['name'];
                $ossFileName = implode('/', [$ossUploadPath, date('Ymd'), $result['name']]);
                try {
                    if (APP_STATUS == 'develop') {
                        $result = $ossClient->uploadFile($oss_config['bucket_name'], $ossFileName, $filePath);
                    } else {
                        $result = $ossClient->uploadFile($oss_config['bucket_name'], $ossFileName, $filePath);
                    }
                    $arr = [
                        'oss_url' => $result['info']['url'],  //上传资源地址
                        'relative_path' => $ossFileName     //数据库保存名称(相对路径)
                    ];
                } catch (OssException $e) {
                    return ['code' => 400, 'msg' => $e->getMessage()];
                } finally {
                    unlink($filePath);
                }
                return ['code' => 200, 'file_url' => $arr['oss_url']];
            }
            return $result;
        }
    }

    /**
     * 将Base64数据转换成二进制并存储到指定路径
     * @param $base64
     * @param string $local_path 服务器临时路径
     * @return array
     */
    private static function base64_image_upload($base64, $local_path = './uploadfile/temp/')
    {
        $data = explode(',', $base64);
        unset($base64);
        if (count($data) !== 2) {
            return ['code' => 400, 'msg' => '文件格式错误'];
        }
        if (preg_match('/^(data:\s*image\/(\w+);base64)/', $data[0], $result)) {
            /*判断图片格式*/
            $allow_type = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
            if (!in_array($result[2], $allow_type)) {
                return ['code' => 400, 'msg' => '文件格式不在允许范围内哦'];
            }
            $image_name = md5(date('YmdHis', time()) . uniqid()) . '.'.$result[2];
            $image_path = $local_path;
            $image_file = $image_path . $image_name;
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }
            //服务器文件存储路径
            try {
                if (file_put_contents($image_file, base64_decode($data[1]))) {
                    return ['code' => 200, 'name' => $image_name, 'path' => $image_path];
                } else {
                    return ['code' => 400, 'msg' => '文件保存失败'];
                }
            } catch (\Exception $e) {
                return ['code' => 400, 'msg' => $e->getMessage()];
            }
        }
        return ['code' => 400, 'msg' => '文件格式错误'];
    }
}