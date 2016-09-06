<?php
namespace App\Core\Http\Controllers;

use App\Domains\User\Repositories\UserRepository;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function __construct($container, $app)
    {
        parent::__construct($container, $app);
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home/home.html', [
            'name' => 'Douglas Zuqueto',
        ]);
    }
}