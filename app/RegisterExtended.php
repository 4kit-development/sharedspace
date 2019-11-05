<?php

namespace App;

use Laravel\Spark\Spark;
use Laravel\Spark\Interactions\Auth\Register;
use Laravel\Spark\Contracts\Http\Requests\Auth\RegisterRequest;
use Laravel\Spark\Contracts\Interactions\Auth\CreateUser as CreateUserContract;

class RegisterExtended extends Register
{
    /**
    * Create the user for the new registration.
    *
    * @param  RegisterRequest  $request
    * @return \Illuminate\Contracts\Auth\Authenticatable
    */
    protected function createUser(RegisterRequest $request)
    {
        return Spark::interact(CreateUserContract::class, [$request]);
    }

    /**
    * Subscribe the given user to a subscription plan.
    * Parent method visibility is protected
    * You need to make it public to call it in SparkServiceProvider
    *
    * @param  RegisterRequest  $request
    * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
    * @return \Illuminate\Contracts\Auth\Authenticatable
    */
    protected function subscribe($request, $user)
    {
        return parent::subscribe($request, $user);
    }
}
