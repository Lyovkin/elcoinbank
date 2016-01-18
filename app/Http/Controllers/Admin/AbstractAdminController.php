<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as RouteController;

abstract class AbstractAdminController extends RouteController
{
    use ValidatesRequests;
}
