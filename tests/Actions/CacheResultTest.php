<?php

namespace JustBetter\MagentoUtilities\Tests\Actions;

use JustBetter\MagentoUtilities\Actions\CacheResult;
use JustBetter\MagentoUtilities\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CacheResultTest extends TestCase
{
    #[Test]
    public function it_can_cache_results(): void
    {
        $key = 'cache';

        $this->assertFalse(
            cache()->has('magento-utilities:'.$key)
        );

        $action = app(CacheResult::class);

        $value = $action->remember($key, fn (): bool => true);

        $this->assertTrue($value);

        $this->assertTrue(
            cache()->has('magento-utilities:'.$key)
        );
    }
}
