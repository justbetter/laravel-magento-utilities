<?php

namespace JustBetter\MagentoUtilities\Actions;

use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Collections\WebsiteCollection;
use JustBetter\MagentoUtilities\Contracts\CachesResult;
use JustBetter\MagentoUtilities\Contracts\GetsWebsites;
use JustBetter\MagentoUtilities\Data\Website;

class GetWebsites implements GetsWebsites
{
    /**
     * @param  CachesResult<WebsiteCollection>  $cache
     */
    public function __construct(
        protected Magento $magento,
        protected CachesResult $cache
    ) {}

    public function get(): WebsiteCollection
    {
        return $this->cache->remember('store/websites', function (): WebsiteCollection {
            return $this->magento->get('store/websites')
                ->throw()
                ->collect()
                ->mapInto(Website::class)
                ->pipeInto(WebsiteCollection::class);
        });
    }

    public static function bind(): void
    {
        app()->singleton(GetsWebsites::class, static::class);
    }
}
