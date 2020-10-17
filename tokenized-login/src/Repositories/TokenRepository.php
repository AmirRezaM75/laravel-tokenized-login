<?php


namespace TokenizedLogin\Repositories;


class TokenRepository
{
    public function generate()
    {
        return random_int(100000, 1000000 - 1);
    }

    public function save(int $token, $userId)
    {
        cache()->set($token . '_tokenized-login', $userId, 120);
    }

    public function send($token, $userId)
    {
        //
    }
}
