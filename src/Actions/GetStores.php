<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Actions;

use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Collections\StoreCollection;
use JustBetter\MagentoUtilities\Contracts\CachesResult;
use JustBetter\MagentoUtilities\Contracts\GetsStores;
use JustBetter\MagentoUtilities\Data\Store;

class GetStores implements GetsStores
{
    /**
     * @param  CachesResult<array>  $cache
     */
    public function __construct(
        protected Magento $magento,
        protected CachesResult $cache
    ) {}

    public function get(): StoreCollection
    {
        $data = $this->cache->remember('store/storeViews', function (): array {
            return (array) $this->magento->get('store/storeViews')->throw()->json();
        });

        return collect($data)
            ->mapInto(Store::class)
            ->pipeInto(StoreCollection::class);
    }

    public static function bind(): void
    {
        app()->singleton(GetsStores::class, static::class);
    }
}
