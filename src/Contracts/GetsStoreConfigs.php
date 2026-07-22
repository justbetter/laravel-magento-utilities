<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Contracts;

use JustBetter\MagentoUtilities\Collections\StoreConfigCollection;

interface GetsStoreConfigs
{
    public function get(): StoreConfigCollection;
}
