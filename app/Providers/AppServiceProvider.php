<?php

namespace App\Providers;

use App\Jobs\SyncRemotePostsApiDataJob;
use App\Services\RemotePostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindMethod(SyncRemotePostsApiDataJob::class.'@handle', function ($job, $app) {
            return $job->handle($app->make(RemotePostService::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
