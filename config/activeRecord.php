<?php

$cfg = ActiveRecord\Config::instance();
$cfg->set_connections(
    array(
        'development' => 'mysql://root:root@192.168.33.20/test',
        'test' => 'mysql://root:root@192.168.33.20/test',
        'production' => 'mysql://root:root@192.168.33.20/test'
    )
);

ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_default_connection('development');
});
