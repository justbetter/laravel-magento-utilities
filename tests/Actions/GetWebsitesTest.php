<?php

namespace JustBetter\MagentoUtilities\Tests\Actions;

use Illuminate\Support\Facades\Http;
use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Actions\GetWebsites;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GetWebsitesTest extends TestCase
{
    #[Test]
    public function it_can_get_websites(): void
    {
        Magento::fake();

        $response = [
            [
                'id' => 0,
                'code' => 'admin',
                'name' => 'Admin',
                'default_group_id' => 0,
            ],
            [
                'id' => 1,
                'code' => 'default',
                'name' => 'Default',
                'default_group_id' => 1,
            ],
        ];

        Http::fake([
            'magento/rest/all/V1/store/websites' => Http::response($response),
        ])->preventStrayRequests();

        $action = app(GetWebsites::class);

        $websites = $action->get();

        $this->assertEquals($response, $websites->toArray());
    }
}
