<?php

namespace JustBetter\MagentoUtilities\Collections;

use Illuminate\Support\Collection;
use JustBetter\MagentoUtilities\Data\Store;

/**
 * @extends Collection<int, Store>
 */
class StoreCollection extends Collection
{
    public function active(): static
    {
        return $this->filter(fn (Store $store): bool => $store->is_active === 1);
    }
}
