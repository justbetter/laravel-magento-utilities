<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Actions;

use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Collections\StoreConfigCollection;
use JustBetter\MagentoUtilities\Contracts\CachesResult;
use JustBetter\MagentoUtilities\Contracts\GetsStoreConfigs;
use JustBetter\MagentoUtilities\Data\StoreConfig;

class GetStoreConfigs implements GetsStoreConfigs
{
    /**
     * @param  CachesResult<StoreConfigCollection>  $cache
     */
    public function __construct(
        protected Magento $magento,
        protected CachesResult $cache
    ) {}

    public function get(): StoreConfigCollection
    {
        $data = $this->cache->remember('store/storeConfigs', function (): array {
            return (array) $this->magento->get('store/storeConfigs')->throw()->json();
        });

        return collect($data)
            ->mapInto(StoreConfig::class)
            ->pipeInto(StoreConfigCollection::class);
    }

    public static function bind(): void
    {
        app()->singleton(GetsStoreConfigs::class, static::class);
    }
}
