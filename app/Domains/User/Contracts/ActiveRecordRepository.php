<?php

namespace App\Domains\User\Contracts;

interface ActiveRecordRepository
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}