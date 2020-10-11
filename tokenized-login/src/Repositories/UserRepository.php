<?php


namespace TokenizedLogin\Repositories;


use App\User;

class UserRepository
{
    public static function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
