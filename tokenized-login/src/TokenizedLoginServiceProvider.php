<?php

namespace TokenizedLogin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TokenizedLogin\Facades\AuthRepositoryFacade;
use TokenizedLogin\Facades\TokenRepositoryFacade;
use TokenizedLogin\Facades\UserRepositoryFacade;
use TokenizedLogin\Repositories\AuthRepository;
use TokenizedLogin\Repositories\TokenRepository;
use TokenizedLogin\Repositories\UserRepository;
use TokenizedLogin\Repositories\Stubs\TokenRepositoryStub;

class TokenizedLoginServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tokenized-login.php', 'tokenized-login');

        AuthRepositoryFacade::proxy(AuthRepository::class);
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
