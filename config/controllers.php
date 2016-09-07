<?php
$container = $app->getContainer();

$controllers = [
    'UserController' => 'App\Applications\User\Http\Controllers\UserController',
    'HomeController' => 'App\Core\Http\Controllers\HomeController'
];


foreach ($controllers as $key => $value) {
    if(isset($container[$key])){
        return $container[$key];
    }
    $container[$key] = function ($c) use ($container, $app, $value) {

        $controller = null;
        $class = new ReflectionClass($value);
        $params = $class->getConstructor()->getParameters();
        if (array_key_exists(2, $params)) {

            $repository = $params[2]->getClass();

            return new $value($c, $app, $repository->newInstance());
        }
        return new $value($c, $app);
    };
}