<?php

namespace App;

use Laravel\Spark\Interactions\Auth\CreateUser;

class CreateUserExtended extends CreateUser
{
    /**
    * Remove the team validation force registration
    */
    public function validator($request)
    {
        return $this->baseValidator($request);
    }
}
