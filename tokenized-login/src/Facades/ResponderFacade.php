<?php


namespace TokenizedLogin\Facades;


class ResponderFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-tokenized.responder';
    }
}
