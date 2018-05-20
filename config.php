<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018/5/20 20:17
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

$config = [

    'host' => 'http://oauth.local',

    'clients' => [
        [
            'client_id' => 'client_1',
            'client_secret' => md5('xxxx'),
            'redirect_uri' => $config['host'].'/client/response_code_handle.php'
        ]
    ],

    'servers' => [
        'client_1' => [
            'client_secret' =>  md5('xxxx'),
            'code' => md5('asssss'),//这里code只是模拟，其实code是一个动态值
        ],
    ]
];

return $config;