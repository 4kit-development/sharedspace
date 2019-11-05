<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;
//use Laravel\Scout\Searchable;
use Laravel\Spark\Spark;

class User extends SparkUser
{
    use CanJoinTeams;//, Searchable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'address',
        'dob',
        'two_factor_reset_code',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    /**
    * Check if user is a developer
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    public function isDeveloper()
    {
      if ($this && Spark::developer($this->email)) {
          return true;
      }
    }

    /**
     * Determine if the given listing is owned by the user.
     *
     * @param  \App\Listing  $listing
     * @return bool
     */
    public function ownsListing($listing)
    {
        return $this->id && $listing->user_id && $this->id == $listing->user_id;
    }

    /**
     * Get all of the listings that the user belongs to.
     */
    public function listings()
    {
        return $this->hasMany('App\Listing');
    }
}
