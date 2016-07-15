<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Purchase;
use App\Models\TypePurchase;
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
     * @GET("/purchase/create", as="purchase.create")
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
     * @POST("/purchase", as="purchase.store")
     * @param Purchase $purchase
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Purchase $purchase, Request $request)
    {
        $data = $request->all();
       // dd($data);

        $type1 = TypePurchase::where('id', 1)->first();
        $type2 = TypePurchase::where('id', 2)->first();
        $type3 = TypePurchase::where('id', 3)->first();

        $user = User::where('id', $request->input('user_id'))->first();
        $course = Course::where('currency_id', $request->input('currency_id'))->first();

        $data['course'] = $course->course_purchase;

        if($request->input('status_trust') === 'true') {
            $data['status_trust'] = 1;
            $purchase->fill($data);
            $purchase->type()->associate($type2);
            $purchase->user()->associate($user);
            $purchase->course()->associate($course);
            $purchase->save();
        } elseif (!$request->input('total')) {
            $data['total'] = $request->input('amount');
            $purchase->fill($data);
            $purchase->type()->associate($type3);
            $purchase->user()->associate($user);
            $purchase->course()->associate($course);
            $purchase->save();

        } else {
            $purchase->fill($data);
            $purchase->type()->associate($type1);
            $purchase->user()->associate($user);
            $purchase->course()->associate($course);
            $purchase->save();
        }


        return redirect()->route('profile.index')->with('message', 'Заявка сделана!');
    }

    /**
     * @GET("/purchase/transfer", as="purchase.transfer.create")
     * @param Purchase $purchase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function transfer(Purchase $purchase)
    {
        $user = \Auth::user();
        return view('balance.transfer', compact('purchase', 'user'));
    }


}
