<?php
namespace App\Applications\User\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\User\Entities\User;
use App\Domains\User\Repositories\UserRepository;
use Slim\App;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var User
     */
    private $model;

    /**
     * UserController constructor.
     * @param UserRepository $repository
     * @param User $model
     */
    public function __construct(UserRepository $repository, User $model)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->model = $model;
    }

    public function teste(User $user){
        $user->all();
    }
    public function index(Request $request, Response $response, $args)
    {
        $response->withJson($this->repository->all(), 200);
    }

    public function show(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');
        $response->withJson($this->repository->find($id), 200);
    }

    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParams();

        if (!$this->repository->create($data)) {
            $response->withJson(['error' => true, 'message' => 'User created failed!'], 200);
        }

        $response->withJson(['error' => false, 'message' => 'User is Created!'], 200);
    }

    public function update(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');

        $data = $request->getParams();
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if ($user->save()) {
            return $response->withRedirect('/users', 200);
        }
    }

    public function destroy(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');

        if (!$this->repository->delete($id)) {
            $response->withJson(['error' => true, 'message' => 'User deleted is failed!'], 200);
        }

        $response->withJson(['error' => false, 'message' => 'User is deleted!'], 200);
    }

}