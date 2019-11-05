<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findByCategory($category_id)
 */

class Amenity extends Model
{
    /**
     * return amenities for specified category
     */
    public function scopefindByCategory($query, $category) {
        return $query->where('category_id', $category);
    }
}
