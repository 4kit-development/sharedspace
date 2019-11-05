<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findByCode($code)
 */

class Coupon extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'decimal',
    ];

    protected $appends = ['formatted_value'];

    /**
     * Get all of the listings that belong to the coupon.
     */
    public function listings()
    {
        return $this->belongsToMany(
            'App\Listing', 'listing_coupons', 'listing_id', 'coupon_id'
        );
    }

    /**
     * Query builder to find coupon using code.
     *
     * @param $query
     * @param $code
     *
     * @return mixed
     */
    public function scopefindByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function getFormattedValueAttribute() {
        return number_format($this->value / 100, 2);
    }
}
