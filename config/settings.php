<?php

return [
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => '192.168.33.50',
            'database' => 'test',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/storage/logs/app.log'
        ]

    ]

];