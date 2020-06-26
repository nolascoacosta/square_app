<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\User;
use App\Services\RemotePostService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncRemotePostsApiDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @param RemotePostService $remotePostService
     * @return void
     */
    public function handle(RemotePostService $remotePostService)
    {

        $listOfPosts = $remotePostService->getListOfPosts();
        $admin = User::where('is_admin',true)->first();

        if (count($listOfPosts) > 0){

            foreach ($listOfPosts as $post){

                $localPost = Post::firstWhere('title', $post['title']);


                if (is_null($localPost) )
                {
                    Post::create(
                        [
                            'title'             => $post['title'],
                            'slug'              => \Illuminate\Support\Str::slug($post['title']),
                            'description'       => $post['description'],
                            'user_id'           => $admin->id,
                            'publication_date'  => '2020-06-26'
                        ]
                    );
                }
            }
        }
    }
}
