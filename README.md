# Laravel 5.1 Memcached Connector

The only difference from the default connector is the removed version command,
which some third parties don't implement (AppEngine Managed VMs).

## Configuration

Add the service provider to your application to replace the memcached connector singleton
in the container:

```php
  CedricZiel\MemcachedNoVersion\MemcachedNoversionServiceProvider::class,
```

## License

MIT
