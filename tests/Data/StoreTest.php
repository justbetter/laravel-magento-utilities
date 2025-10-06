<?php

namespace JustBetter\MagentoUtilities\Tests\Data;

use Illuminate\Support\Facades\Http;
use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Data\Store;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class StoreTest extends TestCase
{
    #[Test]
    public function it_can_get_website(): void
    {
        Magento::fake();

        Http::fake([
            'magento/rest/all/V1/store/websites' => Http::response([
                [
                    'id' => 0,
                    'code' => 'admin',
                    'name' => 'Admin',
                    'default_group_id' => 0,
                ],
                [
                    'id' => 1,
                    'code' => 'base',
                    'name' => 'Base',
                    'default_group_id' => 1,
                ],
            ]),
        ])->preventStrayRequests();

        $store = Store::make([
            'id' => 1,
            'code' => 'default',
            'name' => 'Default',
            'website_id' => 1,
            'store_group_id' => 1,
            'is_active' => 1,
        ]);

        $website = $store->website();

        $this->assertEquals(1, $website->id);
        $this->assertEquals('base', $website->code);
    }
}
