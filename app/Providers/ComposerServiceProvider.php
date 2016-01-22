<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(array('welcome', 'profile.profile'), 'App\Composers\UserComposer');
        View::composer(['profile.profile', 'request.create'], 'App\Composers\PercentComposer');
        View::composer(['profile.profile', 'request.create'], 'App\Composers\CourseComposer');
        View::composer('request.create', 'App\Composers\DaysComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
