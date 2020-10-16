<?php


namespace TokenizedLogin\Http\Controllers;


use Illuminate\Http\Request;
use TokenizedLogin\Facades\TokenRepositoryFacade;
use TokenizedLogin\Facades\UserRepositoryFacade;

class TokenController
{
    public function request(Request $request)
    {
        $user = UserRepositoryFacade::getUserByEmail($request->get('email'));

        if (UserRepositoryFacade::isBanned($user->id))
            return response()->json(['error' => 'You are banned']);

        $token = TokenRepositoryFacade::generate();

        TokenRepositoryFacade::save($token, $user->id);
    }
}
