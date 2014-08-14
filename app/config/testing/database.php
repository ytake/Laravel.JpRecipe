<?php

return [
    'connections' => [
        'master' => [
            'driver' => 'sqlite',
            'database' => app_path().'/tests/Database/testing.sqlite',
            'prefix' => '',
        ],
        'slave' => [
            'driver' => 'sqlite',
            'database' => app_path().'/tests/Database/testing.sqlite',
            'prefix' => '',
        ],
    ],

    'redis' => [
        'cluster' => false,
        'default' => [
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => 15,
        ],
    ],
];