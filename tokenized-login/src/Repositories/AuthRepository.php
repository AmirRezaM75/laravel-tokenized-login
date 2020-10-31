<?php


namespace TokenizedLogin\Repositories;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function check()
    {
        return Auth::check();
    }
}
