<?php

namespace App\Providers;

use App\Score\ScoreService;
use Illuminate\Support\ServiceProvider;

class ScoreProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ScoreService::class, function ($app) {
            return new ScoreService($app['App\Score']);
        });
    }
}
