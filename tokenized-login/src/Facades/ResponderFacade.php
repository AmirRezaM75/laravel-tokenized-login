<?php


namespace TokenizedLogin\Facades;


use TokenizedLogin\Http\Responses\AndroidResponder;
use TokenizedLogin\Http\Responses\VueResponder;

class ResponderFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return request('client') === 'android' ? AndroidResponder::class : VueResponder::class;
    }
}
