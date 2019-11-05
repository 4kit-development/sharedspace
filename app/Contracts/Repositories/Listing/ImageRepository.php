<?php

namespace App\Contracts\Repositories\Listing;

interface ImageRepository
{
    /**
     * Create new images for the given listing.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return \App\Image;
     */
    public function create($listing, array $data);

    /**
     * Remove the listing image.
     *
     * @param  integer  $id
     * @return \App\Image;
     */
    public function remove($id);

    /**
     * Update the order of the listing images.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return \App\Image;
     */
    public function update($listing, array $data);
}
