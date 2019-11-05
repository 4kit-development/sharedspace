<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\AddAddons as Contract;

class AddAddons implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, $addons)
    {
        return $listing->addons()->sync($addons);
    }
}

