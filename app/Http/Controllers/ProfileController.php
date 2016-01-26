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
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
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

    /**
     * @Get("/profile/{id}/edit", as="profiles.edit")
     */
    public function edit()
    {
        return view('profile.update', [
            'profile' => $this->profile,
            'user' => $this->user,
        ]);
    }

    public function update(Request $request)
    {
        //dd($request);
        $profile = Profile::where('user_id', $request->input('id'))->first();
        $profile->user_id = $request->input('id');
        $profile->name = $request->input('name');
        $profile->last_name = $request->input('last_name');
        $profile->phone = $request->input('phone');
        $profile->wallet = $request->input('wallet');
        $profile->about = $request->input('about');
        $profile->update();
        return redirect('/profile');
    }



    /**
     * @Get("/profile/{id}/payments", as="profiles.payments")
     */
    /*public function transactionShow()
    {
        $transactions = Payment::all();
        return view('transaction.show', compact('transactions'));
    }*/
}
