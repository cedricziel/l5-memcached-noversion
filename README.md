# Laravel 5.3 Memcached Connector

[![Dependency 
Status](https://www.versioneye.com/user/projects/56a780b37e03c700377debf2/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56a780b37e03c700377debf2)

The only difference from the default connector is the removed version command,
which some third parties don't implement (AppEngine Managed VMs).

## Configuration

Add the service provider to your application to replace the memcached connector singleton
in the container:

```php
  CedricZiel\MemcachedNoVersion\MemcachedNoversionServiceProvider::class,
```

### AppEngine Flexible Environment

Google AppEngine Flexible comes with a memcache service, which is easily discoverable through
the following environment variables:

```
MEMCACHE_PORT_11211_TCP_ADDR
MEMCACHE_PORT_11211_TCP_PORT
```

So in order to use this adapter with AppEngine flex, you need to adjust your config (`config/cache.php`) a bit:

```php
        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT  => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHE_PORT_11211_TCP_ADDR', '127.0.0.1'),
                    'port' => env('MEMCACHE_PORT_11211_TCP_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],
```

## License

MIT
