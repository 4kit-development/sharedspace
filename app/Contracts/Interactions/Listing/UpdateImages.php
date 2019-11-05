<?php

namespace App\Contracts\Interactions\Listing;

interface UpdateImages
{
    /**
     * Store listing images.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return void
     */
    public function handle($listing, array $data);
}
