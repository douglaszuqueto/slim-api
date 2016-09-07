<?php
$container = $app->getContainer();

$controllers = [
    'UserController' => 'App\Applications\User\Http\Controllers\UserController',
    'HomeController' => 'App\Core\Http\Controllers\HomeController'
];


foreach ($controllers as $key => $value) {

    if (isset($container[$key])) {
        return $container[$key];
    }

    $container[$key] = function ($c) use ($container, $app, $value) {

        $controller = null;
        $class = new ReflectionClass($value);
        $dependencies = $class->getConstructor()->getParameters();

        if (!empty($dependencies)) {

            $dependency = $dependencies[0]->getClass();

            return new $value($dependency->newInstance());
        }

        return new $value($c, $app);
    };
}