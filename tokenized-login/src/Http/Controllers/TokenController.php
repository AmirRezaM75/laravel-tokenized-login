<?php


namespace TokenizedLogin\Http\Controllers;


use Illuminate\Http\Request;
use TokenizedLogin\Repositories\TokenRepository;
use TokenizedLogin\Repositories\UserRepository;

class TokenController
{
    public function request(Request $request)
    {
        $user = UserRepository::getUserByEmail($request->get('email'));

        $token = TokenRepository::generate();

        TokenRepository::save($token, $user);
    }
}
