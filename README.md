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

## License

MIT
