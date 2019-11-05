<?php

namespace App\Contracts\Interactions\Listing;

interface CreateHit
{
    /**
     * Store listing hits.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return void
     */
    public function handle($listing, array $data);
}
