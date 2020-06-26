<?php

use Illuminate\Support\Facades\Route;
Route::prefix('v1')->group(function () {

    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\RegisterController@register');
    Route::get('all-post','Api\PostController@getAllPost');


    Route::group([
        'middleware' => 'jwt.verify'
    ], function ($router) {

        Route::apiResource('posts', 'Api\PostController')->except([
            'show'
        ]);;
        Route::post('logout', 'Api\AuthController@logout');
    });
    Route::get('show/{post}','Api\PostController@show');
});

