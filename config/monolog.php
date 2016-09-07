<?php

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('API');
    $file_handler = new \Monolog\Handler\StreamHandler(__DIR__ . "/../storage/logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};