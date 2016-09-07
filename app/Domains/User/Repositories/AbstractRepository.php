<?php

namespace App\Domains\User\Repositories;

use ActiveRecord\Model;
use App\Domains\User\Contracts\ActiveRecordRepository;

abstract class AbstractRepository implements ActiveRecordRepository
{
    /**
     * @var Model
     */
    private $model;

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel()
    {
        $model = $this->model();

//        if ($model instanceof Model) {
//            throw new Exception('Fatal Error');
//        }
        return $this->model = new $model;
    }

    /**
     * Functions
     */

    public function all()
    {
        $all = $this->model->all();

        return $this->ArraySerializer($all);
    }

    public function find($id)
    {
        $user = $this->model->find($id);

        return $this->ArraySerializer($user, false);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {

    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    protected function ArraySerializer($dados, $multiple = true)
    {
        $keys = (array_keys($this->model->attributes()));
        $data = [];
        $i = 0;

        if (!$multiple) {
            foreach ($keys as $key) {
                $data[$i][$key] = $dados->$key;
            }
            return $data;
        }

        foreach ($dados as $row) {
            foreach ($keys as $key) {
                $data[$i][$key] = $row->$key;
            }
            $i++;
        }
        return $data;
    }
}