<?php
namespace App\Core\Http\Controllers;

use Slim\App;
use Slim\Container;

abstract class Controller
{
    protected $container;
    /**
     * @var App
     */
    public $app;

    public function __construct(Container $container, App $app)
    {
        $this->container = $container;
        $this->app = $app;
    }

    public function __get($name)
    {
        if ($this->container->{$name}) {
            return $this->container{$name};
        }
    }
}