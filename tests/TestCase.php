<?php

namespace JustBetter\MagentoUtilities\Tests;

use JustBetter\MagentoClient\ServiceProvider as MagentoClientServiceProvider;
use JustBetter\MagentoUtilities\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            MagentoClientServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
