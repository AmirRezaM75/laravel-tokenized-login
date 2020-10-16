<?php


namespace TokenizedLogin\Repositories;


use App\User;

class UserRepository
{
    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function isBanned($userId)
    {
        return User::find($userId)->is_banned;
    }
}
