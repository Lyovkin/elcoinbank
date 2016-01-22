<?php


namespace App\Composers;


use App\Models\Days;
use Illuminate\View\View;

class DaysComposer
{
    public function compose(View $view)
    {
        $days = Days::all();

        $view->with('days', $days);
    }
}