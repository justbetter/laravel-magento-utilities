<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Tests\Actions;

use Illuminate\Support\Facades\Http;
use JustBetter\MagentoClient\Client\Magento;
use JustBetter\MagentoUtilities\Actions\GetStoreConfigs;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class GetStoreConfigsTest extends TestCase
{
    #[Test]
    public function it_can_get_store_configs(): void
    {
        Magento::fake();

        $response = [
            [
                'id' => 1,
                'code' => 'default',
                'website_id' => 1,
                'locale' => 'en_US',
                'base_url' => 'https://example.com/',
                'base_link_url' => 'https://example.com/',
                'base_static_url' => 'https://example.com/static/',
                'base_media_url' => 'https://example.com/media/',
                'secure_base_url' => 'https://example.com/',
                'secure_base_link_url' => 'https://example.com/',
                'secure_base_static_url' => 'https://example.com/static/',
                'secure_base_media_url' => 'https://example.com/media/',
                'base_currency_code' => 'EUR',
                'default_display_currency_code' => 'EUR',
                'timezone' => 'Europe/Amsterdam',
                'weight_unit' => 'kgs',
            ],
        ];

        Http::fake([
            'magento/rest/all/V1/store/storeConfigs' => Http::response($response),
        ])->preventStrayRequests();

        $action = app(GetStoreConfigs::class);

        $storeConfigs = $action->get();

        $this->assertEquals($response, $storeConfigs->toArray());
    }
}
