<?php

namespace App\Contracts\Interactions\Listing;

interface RemoveImage
{
    /**
     * Redeem a image for the given listing.
     *
     * @param  array  $data
     * @return void
     */
    public function handle($data);
}
