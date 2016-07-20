<?php

namespace App\Http\Controllers;

use App\Models\PullOffMoney;
use App\Models\Banks;
use Illuminate\Http\Request;

/**
 * Class PullOffMoneyController
 * @package App\Http\Controllers
 * @Middleware("web")
 */
class PullOffMoneyController extends Controller
{
    /**
     * PullOffMoneyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @GET("/profile/pulloffmoney", as="profile.pulloffmoney.create")
     * @param PullOffMoney $pulloffmoney
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(PullOffMoney $pulloffmoney)
    {
        $user = \Auth::user();
        return view('pulloffmoney.create', compact('pulloffmoney', 'user'));
    }

    /**
     * @POST("/profile/pulloffmoney", as="profile.pulloffmoney.store")
     * @param PullOffMoney $pulloffmoney
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PullOffMoney $pulloffmoney, Request $request)
    {
        $user = \Auth::user();

        if ($request->input('amount') > $user->balance ) {
            \Session::flash('message', 'Недостаточно средств!');
            return back();
        }
        else {

            $pulloffmoney->fill($request->all());
            $pulloffmoney->user()->associate($user);
            $pulloffmoney->save();


            $user->balance -= $request->input('amount');
            $user->update();

            return redirect()->route('profile.show')->with('message', 'Заявка на вывод сделана! Спасибо, что доверяете нам!');
        }
    }
}
