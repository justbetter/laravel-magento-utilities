<?php

namespace JustBetter\MagentoUtilities\Tests\Actions;

use Illuminate\Support\Facades\Http;
use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Actions\GetStores;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GetStoresTest extends TestCase
{
    #[Test]
    public function it_can_get_stores(): void
    {
        Magento::fake();

        $response = [
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
        ];

        Http::fake([
            'magento/rest/all/V1/store/storeViews' => Http::response($response),
        ])->preventStrayRequests();

        $action = app(GetStores::class);

        $stores = $action->get();

        $this->assertEquals($response, $stores->toArray());
    }
}
