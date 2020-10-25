<?php


namespace TokenizedLogin\Http\Responses;


interface ResponderInterface
{
    public function blockedUser();

    public function tokenIsSent();

    public function userNotFound();

    public function emailNotValid();

    public function userIsLogged();
}
