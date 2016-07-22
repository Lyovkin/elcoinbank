<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 * @Middleware("web")
 */
class ProfileController extends Controller
{

    protected $profile;

    /**
     * ProfileController constructor.
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->middleware('auth');

        $this->profile = $profile;
    }

    /**
     * @GET("/profile", as="profile.index")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profile = $this->profile->profileWithUser();

        $courses_raw = Course::with('currency')->get();

        $courses = $courses_raw->filter(function($value) {
            return $value->id != 11;
        });

        if(!$profile->wallet)

            \Session::flash('message', 'Пожалуйста, укажите Elcoin кошелек и полностью заполните профиль, если у Вас нет кошелька,
            зарегистрируйтесь в системе Elephant: https://elcoin.space');

        return view('profile.profile', compact('profile', 'courses'));

    }

    /**
     * Edit user profile
     *
     * @Get("/profile/{id}/edit", as="profiles.edit")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $profile = \Auth::user()->profile;
        $user = \Auth::user();

        return view('profile.update', ['profile' => $profile, 'user' => $user]);
    }

    /**
     * Update user profile
     *
     * @POST("profile/{id}/update", as="profile.update")
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        $user->fill($request->all());
        $user->update();

        $profile = Profile::where('user_id', $request->input('id'))->first();
        $profile->fill($request->all());
        $profile->user()->associate($user);
        $profile->update();

        return redirect('/profile');
    }

    /**
     * @GET("/profile/show_profile", as="profile.show")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $profile = $this->profile->profileWithUser();

        return view('profile.show', compact('profile'));
    }

}
