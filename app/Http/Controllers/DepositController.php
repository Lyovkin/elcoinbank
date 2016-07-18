<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;


/**
 * Class DepositController
 * @package App\Http\Controllers
 */
class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $user = \Auth::user();

        $deposit = Deposit::findOrFail($id);
        $deposit->status = $request->input('status');
        $deposit->update();

        $user->balance += $deposit->total;
        $user->update();

        \Session::flash('message', 'Вывод успешно завершен.');

        return redirect()->route('profile.index');
    }
}
