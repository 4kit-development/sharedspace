<?php

namespace App\Repositories\Listing;

use App\Image;
use App\Contracts\Repositories\Listing\ImageRepository as Contract;

class ImageRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function create($listing, array $data)
    {
         return Image::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($id)
    {
        Image::destroy($id);
    }

    /**
     * {@inheritdoc}
     */
    public function update($listing, array $data)
    {
        Image::setNewOrder($data);
    }
}
