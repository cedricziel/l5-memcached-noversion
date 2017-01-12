<?php

namespace CedricZiel\MemcachedNoVersion;

use Illuminate\Cache\MemcachedConnector as FrameworkMemcachedConnector;
use Memcached;
use RuntimeException;

/**
 * Simple memcached connector that doesn't determine the version.
 */
class MemcachedConnector extends FrameworkMemcachedConnector
{
    /**
     * {@inheritdoc}
     */
    protected function validateConnection($memcached)
    {
        $memcached->set('l5-noversion', 1);
        if ($memcached->get('l5-noversion') !== 1) {
            throw new RuntimeException('Could not establish Memcached connection.');
        }

        return $memcached;
    }
}
