<?php


namespace TokenizedLogin\Repositories;


use Illuminate\Support\Facades\Notification;
use TokenizedLogin\Notifications\SendTokenNotification;

class TokenRepository
{
    public function generate()
    {
        return random_int(100000, 1000000 - 1);
    }

    public function save(int $token, $userId)
    {
        cache()->set($token . '_tokenized-login', $userId, config('tokenized-login.token_ttl'));
    }

    public function send($token, $user)
    {
        Notification::send($user, new SendTokenNotification($token));
    }
}
