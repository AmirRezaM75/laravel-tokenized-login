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

    public function userNotFound()
    {
        return response()->json(['err' => 'User not found'], Response::HTTP_BAD_REQUEST);
    }

    public function emailNotValid()
    {
        return response()->json(['err' => 'This email seems to be incorrect'], Response::HTTP_BAD_REQUEST);
    }
}
