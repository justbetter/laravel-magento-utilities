<?php

namespace JustBetter\MagentoUtilities\Data;

use JustBetter\MagentoUtilities\Collections\StoreCollection;
use JustBetter\MagentoUtilities\Contracts\GetsStores;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $default_group_id
 *
 * @extends Data<string, mixed>
 */
class Website extends Data
{
    public function stores(): StoreCollection
    {
        /** @var GetsStores $contract */
        $contract = app(GetsStores::class);

        $stores = $contract->get();

        return $stores
            ->filter(fn (Store $store): bool => $store->website_id === $this->id)
            ->values();
    }
}
