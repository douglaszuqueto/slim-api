<?php

require './vendor/autoload.php';


/**
 * Dotenv
 */
require __DIR__ . '/../config/dotenv.php';

/**
 * Register Helpers;
 */
require __DIR__ . '/../helpers/helper.php';
/**
 * App
 */

$settings = require __DIR__ . '/../config/settings.php';

$app = new Slim\App($settings);

/**
 * Middlewares
 */
//require __DIR__ . '/../app/Core/Http/Middlewares/jwt.php';



/**
 * Register Configs
 */
require __DIR__ . '/../config/activeRecord.php';
require __DIR__ . '/../config/monolog.php';
require __DIR__ . '/../config/controllers.php';

/**
 * Register Routes
 */
require __DIR__ . './../app/Core/Http/routes.php';
require __DIR__ . './../app/Applications/User/Http/routes.php';

/**
 * Return $app
 */
return $app;