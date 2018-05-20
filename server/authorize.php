<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018/5/20 20:14
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

/*
 *
 * 服务器authorize认证，需要的参数为为
 *
 * client_id : 客户端ID
 * response_type : 授权类型 固定值 code
 * redirect_uri : 重定向客户端的URI
 * scope : 申请的权限范围，可选项
 * state : 客户端的当前状态，可以指定任意值，认证服务器会原封不动地返回这个值
 *
 */

$config = require '../config.php';

function handle(array $data,array $config) {

    $clientId = $data['client_id'];
    $client = $config['servers'][$clientId];
    $client['client_id'] = $clientId;

    /* 简化版本，模拟而已 */
    if (!in_array($clientId,$client,true)) {
        throw new Exception('Not Client');
    }

    //然后就是一系列的认证了


    //返回最后的授权码，这应该是个具有有效期的code
    $code = $client['code'];

    $state = $data['state'] ?? '';
    header("Location: {$data['redirect_uri']}?code={$code}&state={$state}");
}


handle($_GET,$config);