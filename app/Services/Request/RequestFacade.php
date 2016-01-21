<?php

namespace App\Services\Request;

use Illuminate\Support\Facades\Facade;

/**
 * Class RequestFacade
 * @package App\Services\Request
 */
class RequestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'requestService';
    }
}