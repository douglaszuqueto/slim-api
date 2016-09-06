<?php
namespace App\Applications\User\Providers;

class UserServiceProvider
{
    public function __construct()
    {
        $this->registerRoutes();
    }

    public function registerRoutes()
    {
        require __DIR__ . '/../Http/routes.php';
    }
}