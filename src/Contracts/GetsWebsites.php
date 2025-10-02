<?php

namespace JustBetter\MagentoUtilities\Contracts;

use JustBetter\MagentoUtilities\Collections\WebsiteCollection;

interface GetsWebsites
{
    public function get(): WebsiteCollection;
}
