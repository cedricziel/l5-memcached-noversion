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
        Cache::extend(
            'memcached',
            function ($app) {
                $servers = Config::get('cache.stores.memcached.servers');
                $connectionId = Config::get('cache.stores.memcached.persistent_id');
                $credentials = Config::get('cache.stores.memcached.sasl');
                $options = Config::get('cache.stores.memcached.options');
                $prefix = Config::get('cache.prefix');

                $connector = new Memcached;

                return Cache::repository(
                    new MemcachedStore($connector, $prefix)
                );
            }
        );
    }
}
