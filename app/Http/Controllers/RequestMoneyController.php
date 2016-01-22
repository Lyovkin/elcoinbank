<?php

namespace App\Http\Controllers;

use App\Models\RequestMoney;
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
        $req = new RequestMoney();
        $req->name = $request->input('name');
        $req->email = $request->input('email');
        $req->tel = $request->input('tel');
        $req->days = $request->input('days');
        $req->course = $request->input('course');
        $req->percent = $request->input('percent');
        $req->wallet = $request->input('wallet');
        $req->amount = $request->input('amount');
        $req->message = $request->input('message');
        $req->user_id = Auth::user()->id;
        $req->save();

        \Session::flash('message', 'Ваша заявка отправлена! Следите за статусом в личном кабинете.');

        return redirect('/profile');
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
