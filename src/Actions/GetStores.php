<?php

namespace JustBetter\MagentoUtilities\Actions;

use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Collections\StoreCollection;
use JustBetter\MagentoUtilities\Contracts\CachesResult;
use JustBetter\MagentoUtilities\Contracts\GetsStores;
use JustBetter\MagentoUtilities\Data\Store;

class GetStores implements GetsStores
{
    /**
     * @param  CachesResult<StoreCollection>  $cache
     */
    public function __construct(
        protected Magento $magento,
        protected CachesResult $cache
    ) {}

    public function get(): StoreCollection
    {
        return $this->cache->remember('store/storeViews', function (): StoreCollection {
            return $this->magento->get('store/storeViews')
                ->throw()
                ->collect()
                ->mapInto(Store::class)
                ->pipeInto(StoreCollection::class);
        });
    }

    public static function bind(): void
    {
        app()->singleton(GetsStores::class, static::class);
    }
}
