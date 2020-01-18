<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * 通信プロトコルをHTTPSに変更する
     */
    public function boot()
    {
        //
        if(\App::environment('production')){
            \URL::forceScheme('https');
        }
    }
}
