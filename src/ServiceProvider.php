<?php

namespace DeathSatan\TencentMapApi;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config/config.php' => config_path('tencent_map.php')]);
        }
        $this->app->bind('xuanchen.tencent.map', function ($app) {
            return new Application(config('tencent_map.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tencent_map');

    }

}
