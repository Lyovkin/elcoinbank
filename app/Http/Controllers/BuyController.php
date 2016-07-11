<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Purchase;
use Illuminate\Http\Request;

/**
 * Class BuyController
 * @package App\Http\Controllers
 */
class BuyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    /**
     * @GET("/buy/create", as="buy.create")
     * @param Purchase $purchase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Purchase $purchase)
    {
        $user = \Auth::user();
        $currencies = Currency::all();
        return view('balance.create', compact('purchase', 'user', 'currencies'));
    }

    /**
     * @POST("/buy", as="buy.store")
     */
    public function store()
    {

    }
}
