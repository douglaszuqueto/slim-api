<?php
$container = $app->getContainer();

$controllers = [
    'UserController' => 'App\Applications\User\Http\Controllers\UserController',
    'HomeController' => 'App\Core\Http\Controllers\HomeController'
];


foreach ($controllers as $key => $value) {

    $container[$key] = function ($c) use ($container, $app, $value) {

        $class = new ReflectionClass($value);
        $dependencies = $class->getConstructor()->getParameters();


        $methods = $class->getMethods();
        foreach ($methods as $me) {
            $parameters = $me->getParameters();
            foreach ($parameters as $parameter) {
                if ($parameter->name != 'request' AND $parameter->name != 'response' AND $parameter->name != 'args') {
                    if (class_exists($parameter->getClass()->name)) {
                        var_dump($parameter->getClass()->name);
                    }
                }
            }


        }

        if (!empty($dependencies)) {

            $dependency = [];

            foreach ($dependencies as $dep) {
                $className = $dep->getClass()->name;
                $dependency[] = makeInstance($className);
            }
//            $dependency = $dependencies[0]->getClass();
            return $class->newInstanceArgs($dependency);
//            return new $value($dependency->newInstance());
        }

//        return new $value($c, $app);
        return new $value();
    };
}

function makeInstance($className)
{
    // class reflection
    $reflection = new \ReflectionClass($className);
    // get the class constructor
    $constructor = $reflection->getConstructor();


    // if there is no constructor, just create and
    // return a new instance
    if (!$constructor) {
        return $reflection->newInstance();
    }
    // if there is parameters, get them!
    $constructorParameters = $constructor->getParameters();
    // resolved array of parameters
    $parametersToPass = [];
    // for each expected parameter,
    // go through the container and resolve it
    foreach ($constructorParameters as $parameter) {
        // get the expected class
        $parameterClassName = $parameter->getClass()->name;
        // if there is a class
        if ($parameterClassName) {
            // ask the container to resolve it
            $parametersToPass[] = makeInstance($parameterClassName);
        }
    }
    // created and returns the new instance passing the
    // resolved parameters
    return $reflection->newInstanceArgs($parametersToPass ? $parametersToPass : []);
}

//$user = ($container['UserController']);

//var_dump($user);