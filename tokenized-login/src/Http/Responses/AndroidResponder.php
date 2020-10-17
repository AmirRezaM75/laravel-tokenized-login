<?php


namespace TokenizedLogin\Http\Responses;



use Illuminate\Http\Response;

class AndroidResponder implements ResponderInterface
{
    public function blockedUser()
    {
        return response()->json(['err' => 'Your account is banned'], Response::HTTP_BAD_REQUEST);
    }

    public function tokenIsSent()
    {
        return response()->json(['content' => 'Token was sent to your email'], Response::HTTP_OK);
    }
}
