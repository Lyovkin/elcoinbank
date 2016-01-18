<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


/**
 * Class ProfileController
 * @package App\Http\Controllers
 *
 */
class ProfileController extends Controller
{
    /**
     * Construct (the captain style)
     */
    public function __construct()
    {
        if (Auth::user()) {
            $this->profile = Auth::user()->profile;
            $this->user = Auth::user();
        }
    }

    public function index()
    {
        return ProfileService::viewProfile(
            Profile::with('user')->where('user_id', Auth::user()->id)->first());

    }

    /*public function show(Profile $profile)
    {
        return \ProfileService::viewProfile($profile);
    }*/

    /**
     * @Get("/profile/{user_name}/edit", as="profiles.edit")
     */
    /*public function edit()
    {
        return view('profile::update', [
            'profile' => $this->profile,
            'user' => $this->user,
        ]);
    }*/

    /**
     * @Post("/profile/{id}/update", as="profiles.update")
     * @param Request $request
     * @return
     */
   /* public function update(Request $request)
    {
        \ProfileService::updateProfile($request, $this->profile);
        return \Redirect::to('/profile');
    }*/

    /**
     * @Post("/profile/{id}/upload", as="profiles.upload")
     */
    /*public function store(ProfileRequest $request)
    {
        \ProfileService::uploadImage($request, $this->profile);
        return \Redirect::to('/profile');
    }*/

    /**
     * @Post("/profile/{id}/user", as="profiles.user")
     * @param Request $request
     * @return
     */
    /*public function updateUser(Request $request)
    {
        $user = Auth::user();
        //Is the old password correct?
        if(!Hash::check(Input::get('old_password'), $user->password)){
            \Session::flash('message', 'К сожалению, пароли не совпадают, попробуйте еще раз.');
            return Redirect::back()->with('incorrectPassword', true);
        }
        else
        {
            \Users::update($request, $this->user);
        }
        if (!Input::has('password')) {
            \Users::update($request, $this->user);
        } else {
            \Users::update(['password' => bcrypt(Input::get('password'))], $this->user);
        }
        return \Redirect::to('/profile');
    }*/

    /**
     * @Get("/profile/{id}/payments", as="profiles.payments")
     */
    /*public function transactionShow()
    {
        $transactions = Payment::all();
        return view('transaction.show', compact('transactions'));
    }*/
}
