<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Purchase;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

/**
 * Class BuyController
 * @package App\Http\Controllers
 */
class PurchaseController extends Controller
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
     * @param Purchase $purchase
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Purchase $purchase, Request $request)
    {
        $data = $request->all();

        $user = User::where('id', $request->input('user_id'))->first();
        $course = Course::where('currency_id', $request->input('currency_id'))->first();

        $data['course'] = $course->course_purchase;

        if($request->input('status_trust') === 'true')
            $data['status_trust'] = 1;

        $purchase->fill($data);
        $purchase->user()->associate($user);
        $purchase->course()->associate($course);
        $purchase->save();

        \Session::flash('message', 'Заявка сделана');

        return redirect()->route('profile.index');
    }
}
