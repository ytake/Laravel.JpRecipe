<?php

return [
    'connections' => [
        'master' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'jp_recipes',
            'username'  => 'homestead',
            'password'  => 'secret',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'slave' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'jp_recipes',
            'username'  => 'homestead',
            'password'  => 'secret',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],

];
