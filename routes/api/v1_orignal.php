<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
Route::prefix('v1')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\RegisterController@register');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('posts', 'Api\PostController');
        Route::get('external-posts', function (){

            $client = new Client();

            $response = $client->request('GET', 'https://sq1-api-test.herokuapp.com/posts');
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            $admin = \App\Models\User::where('is_admin',true)->first();


            $dataDecode = json_decode($body);
            if (count($dataDecode->data)){

                foreach ($dataDecode->data as $post){
                   $localPost = \App\Models\Post::firstWhere('title', $post->title);
                   if (is_null($localPost) )
                   {
                       $newPost = \App\Models\Post::create(
                           [
                               'title' => $post->title,
                               'slug'  => \Illuminate\Support\Str::slug($post->title),
                               'description'  => $post->description,
                               'user_id'  => $admin->id,
                               'publication_date'  => $post->publication_date
                           ]
                       );
                   }
                }
            }

            return response()->json(json_decode($body));

        });

        Route::post('logout', 'Api\AuthController@logout');


    });

});
