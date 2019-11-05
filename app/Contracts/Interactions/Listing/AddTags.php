<?php

namespace App\Contracts\Interactions\Listing;

interface AddTags
{
    /**
     * Add a tag to the given listing.
     *
     * @param  \App\Listing  $listing
     * @param  \App\Tag  $tags
     * @return \App\Listing
     */
    public function handle($listing, $tags);
}
