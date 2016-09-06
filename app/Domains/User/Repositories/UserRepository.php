<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Entities\User;

class UserRepository extends AbstractRepository
{

    public function model()
    {
        return User::class;
    }

    /**
     * UserRepository constructor.
     */
 
}