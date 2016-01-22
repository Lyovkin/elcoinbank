<?php

namespace App\Http\Controllers;

use App\Models\RequestMoney;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryMoneyController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requests = RequestMoney::where('user_id', Auth::user()->id)->get();

        return view('history.index', compact('requests'));
    }
}
