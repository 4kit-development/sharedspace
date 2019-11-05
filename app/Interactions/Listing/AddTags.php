<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\AddTags as Contract;

class AddTags implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, $tags)
    {
        return $listing->tags()->sync($tags);
    }
}

