<?php

namespace TokenizedLogin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TokenizedLoginServiceProvider extends ServiceProvider {

    public function register()
    {
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
