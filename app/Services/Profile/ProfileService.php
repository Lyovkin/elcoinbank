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
            $view = View::make('profile::user_profile', ['data'=>$model])->render();

        }
        return $view;
    }

    
    /**
     * Create user profile
     *
     * @param Request $data
     * @param type $id int
     */
    public function createProfile($data, $id)
    {
        $profile = new Profile;
        //$profile->name = $data->name;
        //$profile->last_name = $data->last_name;
        $profile->user_id = $id;
        $profile->wallet = $data->wallet;
        $profile->about = "Моя информация";
        $profile->save();
    }

    /**
     * Update user profile
     */
    public function updateProfile($data, $model)
    {
//        if(!is_array($data))
//        {
//            $model->fill($data->all());
//        }
//        else
//        {
//            $model->fill($data);
//        }

        if (!is_array($data)) {
            $data = $data->all();
        }

        $model->fill($data);

        $model->save();
        //Profile::where('user_id', Auth::user()->id)->update($data->all());
    }

}



