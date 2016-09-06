<?php


use App\Domains\User\Entities\User;

require __DIR__.'./../../config/activeRecord.php';

class UserTableSeeder
{
    function run()
    {
        $user = new User();
        if($user->create(['name' => 'teste', 'email' => 'mail@mail.com'])){
            return true;
        }
        return false;
    }
}