<?php

namespace CedricZiel\MemcachedNoVersion;

use Memcached;
use Illuminate\Cache\MemcachedStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
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
        Cache::extend(
            'memcached',
            function ($app) {

                $connect = new Memcached;

                return Cache::repository(
                    new MemcachedStore($connect)
                );

            }
        );
    }
}
