<?php

return [
  'settings' => [
      'displayErrorsDetails' => true,
      'db' => [
          'driver' => 'mysql',
          'host' => '192.168.33.20',
          'database' => 'test',
          'username' => 'root',
          'password' => 'root',
          'charset'   => 'utf8',
          'collation' => 'utf8_unicode_ci',
          'prefix'    => '',
      ]
  ],
    'logger' => [
        'name' => 'slim-app',
        'path' => __DIR__.'/../storage/logs/app.log'
    ]
];