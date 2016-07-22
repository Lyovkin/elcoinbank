<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestMoneyController extends Controller
{

    /**
     * RequestMoneyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $user_purchases = \DB::table('purchase')
            ->select(\DB::raw('count(purchase.id)'))
            ->join('users', 'purchase.user_id', '=', 'users.id')
            ->where('purchase.user_id', $user->id)
            ->whereNotIn('type_id', [1,3])
            ->where('purchase.status_admin', 1)
            ->groupBy('purchase.id')
            ->get();

        if(count($user_purchases) > 0) {
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

            $bank = Banks::where('banks_profiles_id', 2)->first();

            $data = $request->all();
            $data['days'] = $request->input('days');
            $data['percent'] = $request->input('percent');
            $data['conclusion'] = Carbon::now()->addDays((int)$request->input('days'));

            $user = User::find($request->input('user_id'));
            $plan = Plan::find($request->input('currency_id'));

            $deposit->fill($data);
            $deposit->user()->associate($user);
            $deposit->plan()->associate($plan);

            $bank->amount += (int) $request->input('amount');
            $bank->update();

            $user->balance -=  (int) $request->input('amount');
            $user->update();

            $deposit->save();

            \Session::flash('message', 'Вы успешно сделали вклад! Для получения информации по вкладам перейдите в "Мои операции"');

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
