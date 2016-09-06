<?php

$cfg = ActiveRecord\Config::instance();
//$cfg->set_model_directory(__DIR__.'/../app/Domains/User/Entities/User.php');
$cfg->set_connections(
    array(
        'development' => 'mysql://root@127.0.0.1/test',
        'test' => 'mysql://username:password@localhost/test_database_name',
        'production' => 'mysql://username:password@localhost/production_database_name'
    )
);
ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_default_connection('development');
});
