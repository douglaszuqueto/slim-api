<?php
namespace App\Core\Http\Controllers;

use App\Domains\User\Repositories\UserRepository;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response, $args)
    {
        return 'Home';
    }
}