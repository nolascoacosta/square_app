<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class RemotePostService
{
    public function getListOfPosts() : array {

        $response = Http::get( config('external_bloggin_platform.rest_api'));
        if($response->status() === 200){
            return $response->json()['data'];
        }
        return [];
    }

}
