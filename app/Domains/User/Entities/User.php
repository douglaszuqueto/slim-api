<?php
namespace App\Domains\User\Entities;

use ActiveRecord\Model;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class User extends Model
{

    static $attr_accessible = array('name','email');

}