<?php

namespace JustBetter\MagentoUtilities\Tests\Data;

use Illuminate\Support\Facades\Http;
use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Data\Website;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class WebsiteTest extends TestCase
{
    #[Test]
    public function it_can_get_stores(): void
    {
        Magento::fake();

        Http::fake([
            'magento/rest/all/V1/store/storeViews' => Http::response([
                [
                    'id' => 0,
                    'code' => 'admin',
                    'name' => 'Admin',
                    'website_id' => 0,
                    'store_group_id' => 0,
                    'is_active' => 1,
                ],
                [
                    'id' => 1,
                    'code' => 'default',
                    'name' => 'Default',
                    'website_id' => 1,
                    'store_group_id' => 1,
                    'is_active' => 1,
                ],
            ]),
        ])->preventStrayRequests();

        $website = Website::make([
            'id' => 0,
            'code' => 'admin',
            'name' => 'Admin',
            'default_group_id' => 0,
        ]);

        $stores = $website->stores();

        $this->assertEquals(1, $stores->count());
    }
}
