<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $fillable = ['title', 'region_id', 'status', 'created_at', 'updated_at'];
}
