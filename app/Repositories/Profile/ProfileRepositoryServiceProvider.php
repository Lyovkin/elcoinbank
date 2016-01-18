<?php

namespace App\Repositories\Profile;

use Illuminate\Support\ServiceProvider;

class ProfileRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Profile\ProfileInterface', function($app)
        {
           
            return new ProfileRepository;
            
        });
    }
    
}

