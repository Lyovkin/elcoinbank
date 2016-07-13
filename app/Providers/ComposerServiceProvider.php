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
        View::composer(array('welcome', 'profile.profile', 'partials.head_profile', 'calc.index'), 'App\Composers\UserComposer');
        View::composer(['profile.profile', 'request.create', 'partials.head_profile', 'calc.index'], 'App\Composers\PercentComposer');
        View::composer(['profile.profile', 'request.create', 'partials.head_profile', 'calc.index'], 'App\Composers\CourseComposer');
        View::composer('request.create', 'App\Composers\DaysComposer');
        View::composer('layouts.profile_layout', 'App\Composers\ProfileComposer');
        View::composer(['profile.profile', 'welcome'], 'App\Composers\PlansComposer');
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
