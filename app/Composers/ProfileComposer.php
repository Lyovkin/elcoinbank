<?php

namespace App\Composers;


use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileComposer
{
    public function compose(View $view)
    {
        $data = Profile::where('user_id', Auth::user()->id)->first();
        $view->with('data', $data);
    }
}