<?php

namespace App\Composers;


use App\Models\Percent;
use Illuminate\View\View;

class PercentComposer
{
    public function compose(View $view)
    {
        $percent = Percent::all()->first();

        $view->with('percent', $percent);
    }
}