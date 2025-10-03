<?php

namespace JustBetter\MagentoUtilities\Data;

use JustBetter\MagentoUtilities\Contracts\GetsWebsites;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $website_id
 * @property int $store_group_id
 * @property int $is_active
 *
 * @extends Data<string, mixed>
 */
class Store extends Data
{
    public function website(): Website
    {
        /** @var GetsWebsites $contract */
        $contract = app(GetsWebsites::class);

        $websites = $contract->get();

        return $websites
            ->where('id', '=', $this->website_id)
            ->firstOrFail();
    }
}
