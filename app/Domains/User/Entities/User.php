<?php
namespace App\Domains\User\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'name',
        'email'
    ];

}