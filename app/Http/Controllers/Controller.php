<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Spark\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs;


}
