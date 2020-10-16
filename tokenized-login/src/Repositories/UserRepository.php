<?php


namespace TokenizedLogin\Repositories;


use App\User;

class UserRepository
{
    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
