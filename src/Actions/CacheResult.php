<?php

namespace JustBetter\MagentoUtilities\Actions;

use Closure;
use JustBetter\MagentoUtilities\Contracts\CachesResult;

/**
 * @template TCacheValue
 *
 * @implements CachesResult<TCacheValue>
 */
class CacheResult implements CachesResult
{
    public function remember(string $key, Closure $callback): mixed
    {
        /** @var ?int $ttl */
        $ttl = config('magento-utilities.cache');

        return cache()->remember('magento-utilities:'.$key, $ttl, $callback);
    }

    public static function bind(): void
    {
        app()->singleton(CachesResult::class, static::class);
    }
}
