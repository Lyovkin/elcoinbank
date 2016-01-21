<?php

namespace App\Composers;

use App\Models\User;

/**
 * Class UserComposer
 * @package App\Composers
 */
class UserComposer
{
    /**
     * @param $view
     */
    public function compose($view)
    {
        $user_count = User::all()->count();

        $view->with('user_count', $user_count);
    }

}