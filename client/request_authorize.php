<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018/5/20 20:26
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

$config = require '../config.php';

$client = $config['clients'][0];

//获取授权
//file_get_contents()
$params = [
    'client_id' =>$client['client_id'],
    'response_type' => 'code',//响应类型，固定值type
    'redirect_uri' => $client['redirect_uri'],//回调的处理URI
    'scope' => ['name'],//非必须，请求的权限范围
    'state' => 'append',//客户端状态，非必须，带上后服务端会原样返回
];

$url = $config['host'].'/server/authorize.php?'.http_build_query($params);

header("Location: {$url}");