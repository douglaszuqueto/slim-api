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
     * UserController constructor.
     * @param Container $container
     * @param App $app
     * @param UserRepository $repository
     */
    public function __construct(Container $container, App $app, UserRepository $repository)
    {
        parent::__construct($container, $app);
        $this->repository = $repository;
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'users/index.html', [
            'name' => 'Douglas Zuqueto',
            'users' => $this->repository->all()
        ]);
    }

    public function json(Request $request, Response $response, $args)
    {
//        echo '<pre>';
//        var_dump(($this->repository->all()));
//        echo '</pre>';
        $response->withJson($this->repository->all(), 200);
    }

    public function show(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');

//        $user = new User();
//        return $this->view->render($response, 'users/show.html', [
//            'user' => $user->find($id)
//        ]);
        return $this->view->render($response, 'users/show.html', [
            'user' => $this->repository->find($id)
        ]);
    }

    public function create(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'users/create.html');
    }

    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParams();
//        $user = new User();
//        $user->name = $data['name'];
//        $user->email = $data['email'];
//        if ($user->save()) {
//            return $response->withRedirect('/users', 200);
//        }
//        return 'Erro';
        if ($this->repository->create($data)) {
            return $response->withRedirect('/users', 200);
        }
        return 'Erro';
    }

    public function edit(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');
        $user = new User();
//        return $this->view->render($response, 'users/edit.html', [
//            'user' => $user->find($id)
//        ]);
        return $this->view->render($response, 'users/edit.html', [
            'user' => $this->repository->find($id)
        ]);
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

    public function remove(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');
        return $this->view->render($response, 'users/remove.html', [
            'user' => User::find($id)
        ]);
    }

    public function destroy(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');

        if ($this->repository->delete($id)) {
            return $response->withRedirect('/users', 200);
        }
//        $user = User::find($id);
//        if ($user->delete()) {
//            return $response->withRedirect('/users', 200);
//        }
    }

}