<?php

use Illuminate\Support\Facades\Http;
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


    Route::get('external-posts', function (){


        $listOfPosts = (new \App\Services\RemotePostService())->getListOfPosts();
        $admin = \App\Models\User::where('is_admin',true)->first();


        if (count($listOfPosts)){

            foreach ($listOfPosts as $post){

                $localPost = \App\Models\Post::firstWhere('title', $post['title']);


                if (is_null($localPost) )
                {
                    $newPost = \App\Models\Post::create(
                        [
                            'title' => $post['title'],
                            'slug'  => \Illuminate\Support\Str::slug($post['title']),
                            'description'  => $post['description'],
                            'user_id'  => $admin->id,
                            'publication_date'  => '2020-06-26'
                        ]
                    );
                }
            }
        }

    });
});

