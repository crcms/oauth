<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018/5/20 20:52
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

header("Content-Type:text/html;charset=utf-8");

function handle($data,$client)
{


    return [
        'access_token' => md5(uniqid()),
        'token_type' => 'bearer',//token类型 bearer或者mac类型
        'expires_in' => time()+3600,//过期时间

        'refresh_token' => '',//用于下一次获取的令牌，可选值
        'scope' => '',//权限范围，如果和客户端一致可以不返回
    ];

}

$config = require '../config.php';

/**
 * $_POST包含
 *
 * request_uri
 * client_id
 * code
 * grant_type:authorization_code（授权类型,固定值authorization_code）
 */
$result = handle($_POST,$config['servers'][$_POST['client_id']]);

echo json_encode($result);


