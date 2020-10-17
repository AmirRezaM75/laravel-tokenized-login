<?php


namespace TokenizedLogin\Http\Responses;


interface ResponderInterface
{
    public function blockedUser();

    public function tokenIsSent();
}
