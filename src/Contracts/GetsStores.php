<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Contracts;

use JustBetter\MagentoUtilities\Collections\StoreCollection;

interface GetsStores
{
    public function get(): StoreCollection;
}
