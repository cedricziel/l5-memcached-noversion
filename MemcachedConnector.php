<?php

namespace CedricZiel\MemcachedNoVersion;

use Illuminate\Cache\MemcachedConnector as FrameworkMemcachedConnector;
use Memcache;
use RuntimeException;

/**
 * Class MemcachedConnector
 * Simple memcached connector that doesn't determine the version.
 *
 * @package CedricZiel\MemcachedNoVersion
 */
class MemcachedConnector extends FrameworkMemcachedConnector
{
    /**
     * Create a new Memcached connection.
     *
     * @param  array  $servers
     * @return \Memcached
     *
     * @throws \RuntimeException
     */
    public function connect(
        array $servers, $connectionId = null,
        array $options = [], array $credentials = []
    ) {
        $memcached = new Memcache;
        
        $memcached->set('l5-noversion', 1);
        if ($memcached->get('l5-noversion') !== 1) {
            throw new RuntimeException('Could not establish Memcached connection.');
        }

        return $memcached;
    }
}
