<?php


namespace TokenizedLogin\Repositories;


class TokenRepository
{
    public static function generate()
    {
        return random_int(100000, 1000000 - 1);
    }

    public static function save(int $token, $user)
    {
        cache()->set($token . '_tokenized-login', $user->id, 120);
    }
}
