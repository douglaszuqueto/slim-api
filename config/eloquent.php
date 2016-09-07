<?php
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection($app->getContainer()['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->getContainer()['db'] = function ($c) use ($capsule) {
    return $capsule;
};
