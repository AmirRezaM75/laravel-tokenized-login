<?php


namespace TokenizedLogin\Facades;


use Illuminate\Support\Facades\Facade;

class BaseFacade extends Facade
{
    public static function proxy($class)
    {
        app()->singleton(static::getFacadeAccessor(), $class);
    }
}
