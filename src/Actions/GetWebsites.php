<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Actions;

use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Collections\WebsiteCollection;
use JustBetter\MagentoUtilities\Contracts\CachesResult;
use JustBetter\MagentoUtilities\Contracts\GetsWebsites;
use JustBetter\MagentoUtilities\Data\Website;

class GetWebsites implements GetsWebsites
{
    /**
     * @param  CachesResult<array>  $cache
     */
    public function __construct(
        protected Magento $magento,
        protected CachesResult $cache
    ) {}

    public function get(): WebsiteCollection
    {
        $data = $this->cache->remember('store/websites', function (): array {
            return (array) $this->magento->get('store/websites')->throw()->json();
        });

        return collect($data)
            ->mapInto(Website::class)
            ->pipeInto(WebsiteCollection::class);
    }

    public static function bind(): void
    {
        app()->singleton(GetsWebsites::class, static::class);
    }
}
