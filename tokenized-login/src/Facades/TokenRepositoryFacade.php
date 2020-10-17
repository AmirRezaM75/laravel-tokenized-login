<?php


namespace TokenizedLogin\Facades;

class TokenRepositoryFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'tokenized-login.token-repository';
    }
}
