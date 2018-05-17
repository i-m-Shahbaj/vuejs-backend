<?php

namespace App\Http\Controllers;

use Froiden\RestAPI\ApiController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends ApiController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
