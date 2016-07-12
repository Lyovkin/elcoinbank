<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 *
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
        $this->middleware(['web', 'auth']);

        $this->profile = $profile;
    }

    public function index()
    {
        $profile = $this->profile->profileWithUser();

        $courses = Course::with('currency')->get();

        if($profile->hasWallet())

            \Session::flash('message', 'Пожалуйста, укажите Elcoin кошелек и полностью заполните профиль, если у Вас нет кошелька,
            зарегистрируйтесь в системе Elephant: https://elcoin.space');

        return view('profile.profile', compact('profile', 'courses'));

    }

    /**
     * Edit user profile
     *
     * @Get("/profile/{id}/edit", as="profiles.edit")
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        $user->fill($request->all());
        $user->update();

        $wallet = Wallet::where('id', $request->input('id'))->first();
        $wallet->fill($request->all());
        $wallet->update();

        $profile = Profile::where('id', $request->input('id'))->first();
        $profile->fill($request->all());
        $profile->user()->associate($user);
        $profile->wallet()->associate($wallet);
        $profile->update();

        return redirect('/profile');
    }

}
