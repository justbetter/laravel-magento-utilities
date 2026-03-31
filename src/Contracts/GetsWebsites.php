<?php

declare(strict_types=1);

namespace JustBetter\MagentoUtilities\Contracts;

use JustBetter\MagentoUtilities\Collections\WebsiteCollection;

interface GetsWebsites
{
    public function get(): WebsiteCollection;
}
