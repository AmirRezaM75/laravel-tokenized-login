<?php


namespace TokenizedLogin\Facades;


use Illuminate\Support\Facades\Facade;

class UserRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tokenized-login.user-repository';
    }

    public static function proxy($class)
    {
        app()->singleton(static::getFacadeAccessor(), $class);
    }
}
