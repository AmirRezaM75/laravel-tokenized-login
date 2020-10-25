<?php

namespace TokenizedLogin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TokenizedLogin\Facades\TokenRepositoryFacade;
use TokenizedLogin\Facades\UserRepositoryFacade;
use TokenizedLogin\Repositories\TokenRepository;
use TokenizedLogin\Repositories\UserRepository;
use TokenizedLogin\Repositories\Stubs\TokenRepositoryStub;
use TokenizedLogin\Repositories\Stubs\UserRepositoryStub;

class TokenizedLoginServiceProvider extends ServiceProvider {

    public function register()
    {
        UserRepositoryFacade::proxy(UserRepository::class);
        TokenRepositoryFacade::proxy(app()->runningUnitTests() ? TokenRepositoryStub::class : TokenRepository::class);

        Route::prefix('api/tokenized-login')
            ->name('tokenized-login.')
            ->middleware('api')
            ->namespace('TokenizedLogin\Http\Controllers')
            ->group(__DIR__ . '/../routes/api.php');
    }

    public function boot()
    {

    }
}
