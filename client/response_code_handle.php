<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018/5/20 20:37
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */


function handle($client, $code, $host)
{
    $params = [
        'grant_type' => 'authorization_code',//授权类型,固定值 authorization_code
        'redirect_uri' => $client['redirect_uri'],
        'client_id' => $client['client_id'],
        'code' => $code
    ];

    $url = $host.'/server/access_token.php?'.http_build_query($params);

    echo $url,'<br>';

    $cl = curl_init($url);

    curl_setopt($cl,CURLOPT_RETURNTRANSFER,1);

    $result = curl_exec($cl);


    curl_close($cl);

    //
    var_dump($result);

}

$config = require '../config.php';

$client = $config['clients'][0];

handle($client, $_GET['code'],$config['host']);