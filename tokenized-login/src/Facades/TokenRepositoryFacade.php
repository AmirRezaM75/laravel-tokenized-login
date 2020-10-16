<?php


namespace TokenizedLogin\Facades;


use Illuminate\Support\Facades\Facade;

class TokenRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tokenized-login.token-repository';
    }

    public static function proxy($class)
    {
        app()->singleton(static::getFacadeAccessor(), $class);
    }
}
