<?php

namespace CedricZiel\MemcachedNoVersion;

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
        Cache::extend('memcached', function($app) {
            $servers = Config::get('cache.stores.memcached.servers');
            $prefix = Config::get('cache.prefix');

            $connector = new MemcachedConnector;
            return Cache::repository(new MemcachedStore($connector->connect($servers), $prefix));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
