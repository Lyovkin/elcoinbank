<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Purchase;
use App\Models\RequestMoney;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Deposit $deposit
     * @return \Illuminate\Http\Response
     * @internal param RequestMoney $money
     */
    public function create(Deposit $deposit)
    {
        $user = \Auth::user();

        //dd(Purchase::where('user_id', $user->id)->where('type_id', 2)->count() == 0);

        if(Purchase::where('user_id', $user->id)->where('type_id', 2)->count() == 0) {
            $currencies = Plan::where('type_id', 2)->get();
        } else {
            $currencies = Plan::where('type_id', 1)->get();
        }
        return view('request.create', compact('deposit', 'currencies', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Deposit $deposit
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Deposit $deposit, Request $request)
    {
        if ((int) $request->input('amount') > Auth::user()->balance) {
            \Session::flash('message', 'Недостаточно средств!');
            return redirect('/profile');
        }
        else {
            $data = $request->all();
            $data['days'] = $request->input('days');
            $data['percent'] = $request->input('percent');
            $data['conclusion'] = Carbon::now()->addDays((int)$request->input('days'));

            $user = User::find($request->input('user_id'));
            $plan = Plan::find($request->input('currency_id'));

            $deposit->fill($data);
            $deposit->user()->associate($user);
            $deposit->plan()->associate($plan);

            $user->balance -=  (int) $request->input('amount');
            $user->update();
            $deposit->save();

           // \Session::flash('message', 'Вы успешно сделали вклад!');

            return redirect('/profile');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
