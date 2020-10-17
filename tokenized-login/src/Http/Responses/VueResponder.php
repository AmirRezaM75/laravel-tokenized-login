<?php


namespace TokenizedLogin\Http\Responses;



use Illuminate\Http\Response;

class VueResponder implements ResponderInterface
{
    public function blockedUser()
    {
        return response()->json(['error' => 'You are banned'], Response::HTTP_BAD_REQUEST);
    }

    public function tokenIsSent()
    {
        return response()->json(['message' => 'Token was sent'], Response::HTTP_OK);
    }

    public function userNotFound()
    {
        return response()->json(['error' => 'User not found'], Response::HTTP_BAD_REQUEST);
    }
}
