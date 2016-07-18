<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Purchase;
use Illuminate\Http\Request;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    /**
     * @GET("profile/transactions", as="profile.transactions")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = \Auth::user()->id;

        $purchases = Purchase::where('user_id', $user_id)->get();
        $deposits = Deposit::where('user_id', $user_id)->get();

        return view('transactions.index', compact('purchases', 'deposits'));

    }
}
