<?php

namespace CedricZiel\MemcachedNoVersion;

use Illuminate\Support\ServiceProvider;

class MemcachedNoversionServiceProvider extends ServiceProvider
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
        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });
    }

    public function provides()
    {
        return [
            'memcached.connector'
        ];
    }
}
