<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

// Added these two namespaces so as to fix the closure issue. 
// 01/28/2021

use Illuminate\Support\Str;
use Illuminate\Queue\SerializableClosure; 

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
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        // Had to force HTTPS to function on Heroku and not have style disparities with HTTP. 
        // 1/24/2021
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }

    }

    // Solution from 
    // https://github.com/spatie/async/issues/52
    protected function registerOpisSecurityKey()
    {
        if (Str::startsWith($key = $this->app['config']->get('app.key'), 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

        SerializableClosure::setSecretKey($key);
    }
}
