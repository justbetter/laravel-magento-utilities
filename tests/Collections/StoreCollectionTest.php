<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Tests\Collections;

use JustBetter\MagentoUtilities\Collections\StoreCollection;
use JustBetter\MagentoUtilities\Data\Store;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class StoreCollectionTest extends TestCase
{
    #[Test]
    public function it_can_filter_active_stores(): void
    {
        $items = [
            Store::make([
                'id' => 0,
                'code' => 'admin',
                'name' => 'Admin',
                'website_id' => 0,
                'store_group_id' => 0,
                'is_active' => 1,
            ]),
            Store::make([
                'id' => 1,
                'code' => 'default',
                'name' => 'Default',
                'website_id' => 1,
                'store_group_id' => 1,
                'is_active' => 0,
            ]),
        ];

        $collection = StoreCollection::make($items);

        $this->assertCount(2, $collection);
        $this->assertCount(1, $collection->active());
    }
}
