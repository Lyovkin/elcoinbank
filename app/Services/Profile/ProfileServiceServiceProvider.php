<?php

namespace App\Services\Profile;

use Illuminate\Support\ServiceProvider;

class ProfileServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('profileService', function($app)
        {
           
            return new ProfileService(
                $app->make('App\Repositories\Profile\ProfileInterface')
            );
            
        });
    }
    
}

