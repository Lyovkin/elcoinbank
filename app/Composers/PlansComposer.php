<?php

namespace App\Composers;

use App\Models\Plan;
use Illuminate\View\View;

class PlansComposer
{
    public function compose(View $view)
    {
        $plans_good = Plan::where('type_id', 1)->get();
        $plans_bad = Plan::where('type_id', 2)->get();

        $view->with('plans1', $plans_good)->with('plans2', $plans_bad);
    }
}