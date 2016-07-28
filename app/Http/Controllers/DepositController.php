<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Banks;
use Illuminate\Http\Request;

/**
 * Class DepositController
 * @package App\Http\Controllers
 * @Middleware("web")
 */
class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @GET("profile/deposits", as="profile.deposits")
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = \Auth::user()->id;

        $deposits = Deposit::where('user_id', $user_id)->get();

        return view('deposits.index', compact('deposits'));
    }

    /**
     * @POST("/profile/deposits/{id}")
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $user = \Auth::user();

        $bank = Banks::where('banks_profiles_id', 2)->first();

        $deposit = Deposit::findOrFail($id);

        if($deposit->conclusion <= new \DateTime() && $deposit->status == 0) {
            $deposit->status = $request->input('status');
            $deposit->update();

            $bank->amount -= $deposit->total;
            $bank->update();

            $user->balance += $deposit->total;
            $user->update();

            \Session::flash('message', 'Вывод успешно завершен! Спасибо, что доверяете нам!');

            return redirect()->route('profile.index');
        } else {

            return redirect()->route('profile.index')->with('message', 'Ошибка вывода!');
        }
    }
}
