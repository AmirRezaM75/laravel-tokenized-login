<?php

Route::post('request', 'TokenController@request')->name('request');

if (app()->environment('local')) {
    Route::get('test/request', 'TokenController@test');
}
