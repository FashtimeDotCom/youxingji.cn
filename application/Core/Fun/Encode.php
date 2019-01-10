<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/7/19
 * Time: 14:35
 */
class Core_Fun_Encode
{
    /*
     * 评论功能的source_id
     * 参数：
     *  1、终端，pc电脑，mobile移动端
     *  2、板块缩写,ryt日月潭,drb达人邦
     *  3、对应的ID
     * */
    public static function createSourceId($terminal,$module,$id)
    {
        $salt="chuan702";
        $str="{$terminal}_{$module}_{$id}".$salt;
        $code=hash("md5",$str);
        return $code;
    }

    /*
     * 将html实体转换
     *
     * */
    public static function mynl2br($text)
    {
        return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    }




}