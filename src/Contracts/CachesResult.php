<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Contracts;

use Closure;

/**
 * @template TCacheValue
 */
interface CachesResult
{
    /**
     * @param  Closure(): TCacheValue  $callback
     * @return TCacheValue
     */
    public function remember(string $key, Closure $callback): mixed;
}
