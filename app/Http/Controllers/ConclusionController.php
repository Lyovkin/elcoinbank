<?php

namespace App\Http\Controllers;

use App\Models\Conclusion;
use App\Models\RequestMoney;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ConclusionController
 * @package App\Http\Controllers
 */
class ConclusionController extends Controller
{
    /**
     * Auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $conclusions = Conclusion::where('user_id', Auth::user()->id)->get();

        return view('conclusion.index', compact('conclusions'));
    }

    /**
     * @param $id
     * @param Conclusion $conclusion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDeposit($id, Conclusion $conclusion)
    {
        $deposit = RequestMoney::findOrFail($id);

        return view('conclusion.get', compact('deposit'))->with('conclusion', $conclusion);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $req = new Conclusion();
        $req->name = $request->input('name');
        $req->email = $request->input('email');
        $req->tel = $request->input('tel');
        $req->days = $request->input('days');
        $req->course = $request->input('course');
        $req->percent = $request->input('percent');

        $req->wallet1 = $request->input('wallet1');
        $req->wallet2 = $request->input('wallet2');
        $req->wallet3 = $request->input('wallet3');
        $req->amount = $request->input('amount');
        $req->total = $request->input('total');
        $req->message = $request->input('message');
        $req->status = 1;

        $req->user_id = $request->input('id');

        $money = RequestMoney::findOrFail($request->input('dep_id'));
        $money->status = 0;
        $money->update();

        $req->save();

        \Session::flash('message', 'Заявка на вывод подана!');

        return redirect('/profile');
    }
}
