<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require __DIR__ . '/../vendor/autoload.php';


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

require __DIR__ . '/../config/monolog.php';
require __DIR__ . '/../config/eloquent.php';
require __DIR__ . '/../config/controllers.php';


/**
 * Register Routes
 */
require __DIR__ . '/../app/Core/Http/routes.php';
require __DIR__ . '/../app/Applications/User/Http/routes.php';

/**
 * Return $app
 */
return $app;