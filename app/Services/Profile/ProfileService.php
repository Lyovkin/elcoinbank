<?php

namespace App\Services\Profile;

use App\Repositories\Profile\ProfileInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Profile;

/**
 * Class ProfileService
 * @package App\Services\Profile
 */
class ProfileService
{
    protected $profileRepo;
    
    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }
    
    /**
     * View profile
     * 
     * @param Model $model
     * @return view
     */
    public static function viewProfile($model)
    {
        $view = View::make('profile.profile', ['data'=>$model])->render();
        if($model->user_id != Auth::user()->id)
        {
            $view = View::make('profile.user_profile', ['data'=>$model])->render();

        }
        return $view;
    }
    
    /**
     * Create user profile
     *
     * @param Request $data
     * @param type $id int
     */
    public static function createProfile($data, $id)
    {
        $profile = new Profile;
        $profile->name = $data['name'];
        $profile->user_id = $id;
        $profile->about = "Моя информация";
        $profile->save();
    }
}



