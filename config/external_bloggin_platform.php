<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Plogging Platform Rest Api
    |--------------------------------------------------------------------------
    | Also, the customer is using another blogging platform and she wants us
    | to auto import the posts created there and
    | add them to our new blogging platform, for that reason,
    | she provided us the following REST api endpoint that returns the new posts
    | https://sq1-api-test.herokuapp.com/posts
    |
    */

    'rest_api' => env('API_ENDPOINT', 'https://sq1-api-test.herokuapp.com/posts'),



];
