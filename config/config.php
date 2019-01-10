<?php
/**
 * Created by PhpStorm
 * User: 小天
 * E-mail: 11072162@qq.com
 * Date: 2018/12/27
 * Time: 16:50
 */

return [
    'aliyun' => [
        'oss' => [
            'access_key_id' => 'LTAI99KCrCrriyHL',
            'access_key_secret' => 'MgBwhttdSGD5dFzQMBXiHRd9CADhCf',
            'bucket_name' => 'youxingji-test',
            'endpoint' => 'oss-cn-qingdao.aliyuncs.com',
            'bucket_domain' => 'youxingji-test.oss-cn-qingdao.aliyuncs.com',
            'thumb_style' => [
                'thumb_100_100' => 'thumb_100_100',
                'thumb_200_200' => 'thumb_200_200',
                'thumb_400_400' => 'thumb_400_400',
            ],
            'anti_theft_chain' => [
                'img_100_100' => 'image/resize,m_lfit,h_100,w_100',
                'img_200_200' => 'image/resize,m_lfit,h_200,w_200',
                'img_400_400' => 'image/resize,m_lfit,h_400,w_400',
            ]
        ]
    ],
    'unionpay' => [
        'merId' => '802440072770536',    // 商户号
        'signCertPath' => '802440072770536',    // 签名证书路径
        'signCertPwd' => 'youxingji.!',    // 签名证书密码
        'verifyCertPath' => 'youxingji.!',    // 验签证书路径
        'frontTransUrl' => 'https://gateway.test.95516.com/gateway/api/frontTransReq.do',   // 前台交易
        'singleQueryUrl' => 'https://gateway.test.95516.com/gateway/api/frontTransReq.do',   // 单笔查询
    ],//'wx_pay',   'wx_pay' => '微信',
    'PAY_TYPE' => ['union_pay'],
    'PAY_TYPE_NAME' => [
        'union_pay' => '银联',
    ],
];