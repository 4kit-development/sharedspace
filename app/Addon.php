<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    //

    protected $appends = ['formatted_price'];

    public function getFormattedPriceAttribute() {
        return number_format($this->price / 100, 2);
    }
}
