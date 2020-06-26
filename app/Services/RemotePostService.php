<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class RemotePostService
{
    public function getListOfPosts() : array {

        $response = Http::get( config('external_bloggin_platform.rest_api'));

        //dd($response->status());
        dd($response->json()['data']);

//            new Client(['base_uri' => config('external_bloggin_platform.rest_api')]);
//        $response = $client->request('GET','posts');
//
//        if ($response->getStatusCode() !== 200 ) return [];
//
//        $body = $response->getBody()->getContents();
//        $postsDecoded = json_decode($body);
//
//        if (count($postsDecoded->data) > 0)  return  $postsDecoded->data;
//
//        return [];
    }

}
