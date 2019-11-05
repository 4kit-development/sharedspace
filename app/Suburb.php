<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    //
    protected $fillable = ['title', 'district_id', 'status', 'created_at', 'updated_at'];
}
