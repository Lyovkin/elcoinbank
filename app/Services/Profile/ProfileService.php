<?php

namespace App\Services\Profile;

use App\Models\User;
use App\Repositories\Profile\ProfileInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

/**
 * Class ProfileService
 * @package App\Services\Profile
 */
class ProfileService implements ProfileInterface
{
    protected $profileRepo;
    
    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }
    
    /**
     * View profile
     * 
     * @param $model
     * @return view
     */
    public static function viewProfile($model, $data)
    {
        $view = View::make('profile.profile', ['data'=>$model, 'courses' => $data])->render();
        if($model->user_id != Auth::user()->id)
        {
            $view = View::make('profile.user_profile', ['data'=>$model, 'courses' => $data])->render();

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

    /**
     * Update user
     *
     * @param User $user
     * @param array $data
     */
    public static function update(User $user, $data = array())
    {
        $user->fill($data);
        $user->update();
    }
}



