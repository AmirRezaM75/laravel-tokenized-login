<?php


namespace TokenizedLogin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TokenizedLogin\Facades\ResponderFacade;
use TokenizedLogin\Facades\TokenRepositoryFacade;
use TokenizedLogin\Facades\UserRepositoryFacade;

class TokenController
{
    public function request(Request $request)
    {
        $this->validateEmail($request);

        $user = UserRepositoryFacade::getUserByEmail($request->get('email'));

        if (! $user)
            return ResponderFacade::userNotFound();

        if (UserRepositoryFacade::isBanned($user->id))
            return ResponderFacade::blockedUser();

        $token = TokenRepositoryFacade::generate();

        TokenRepositoryFacade::save($token, $user->id);

        TokenRepositoryFacade::send($token, $user->id);

        return ResponderFacade::tokenIsSent();
    }

    private function validateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails())
            ResponderFacade::emailNotValid()->throwResponse();
    }
}
