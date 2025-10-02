<?php

namespace JustBetter\MagentoUtilities;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JustBetter\MagentoUtilities\Actions\CacheResult;
use JustBetter\MagentoUtilities\Actions\GetStores;
use JustBetter\MagentoUtilities\Actions\GetWebsites;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this
            ->registerActions()
            ->registerConfig();
    }

    protected function registerActions(): static
    {
        CacheResult::bind();
        GetStores::bind();
        GetWebsites::bind();

        return $this;
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__.'/../config/magento-utilities.php', 'magento-utilities');

        return $this;
    }

    public function boot(): void
    {
        $this->bootConfig();
    }

    protected function bootConfig(): static
    {
        $this->publishes([
            __DIR__.'/../config/magento-utilities.php' => config_path('magento-utilities.php'),
        ], 'config');

        return $this;
    }
}
