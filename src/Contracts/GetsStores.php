<?php

namespace JustBetter\MagentoUtilities\Contracts;

use JustBetter\MagentoUtilities\Collections\StoreCollection;

interface GetsStores
{
    public function get(): StoreCollection;
}
