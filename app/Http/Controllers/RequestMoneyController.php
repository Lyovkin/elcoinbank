<?php

namespace App\Http\Controllers;

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
     * @param RequestMoney $money
     * @return \Illuminate\Http\Response
     */
    public function create(RequestMoney $money)
    {
        return view('request.create', compact('money'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((int) $request->input('amount') > Auth::user()->balance) {
            \Session::flash('message', 'Недостаточно средств!');
            return redirect('/profile');
        }
        else {
            $req = new RequestMoney();
            $req->name = Auth::user()->name;
            $req->email = Auth::user()->email;
            $req->tel = $request->input('tel');
            $req->days = $request->input('days');
            $req->course = $request->input('course');
            $req->percent = $request->input('percent');
            $req->wallet = $request->input('wallet');
            $req->amount = $request->input('amount');
            $req->message = $request->input('message');
            $req->user_id = Auth::user()->id;
            $req->conclusion = Carbon::now()->addDays((int)$request->input('days'));
            $req->status = 1;
            $user = Auth::user();
            $user->balance -=  (int) $request->input('amount');
            $user->update();
            $req->save();

            \Session::flash('message', 'Вы успешно сделали вклад!');

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
