<?php

namespace App\Domains\Core;

use App\Domains\Core\Contracts\Repository;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements Repository
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

        if ($model instanceof Model) {
            throw new Exception('Fatal Error');
        }
        return $this->model = new $model;
    }

    /**
     * Functions
     */

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
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
        return $this->model->find($id)->delete();
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