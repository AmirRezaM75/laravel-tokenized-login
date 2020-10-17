<?php


namespace TokenizedLogin\Facades;

class UserRepositoryFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'tokenized-login.user-repository';
    }
}
