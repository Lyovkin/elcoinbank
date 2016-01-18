<?php

namespace App\Services\Profile;

use Illuminate\Support\Facades\Facade;

/**
 * Class ProfileFacade
 * @package App\Services\Profile
 */
class ProfileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profileService';
    }
}