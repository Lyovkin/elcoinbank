<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use Illuminate\Http\Request;

use App\Http\Requests;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * @POST("/get_currency")
     * @param Request $request
     * @return mixed
     */
    public function getCurrency(Request $request)
    {
        $course = Course::with('currency')->where('currency_id', $request->input('currency'))->first()->toArray();

        return json_encode($course);

    }

    /**
     * @POST("/get_currency_elcoin")
     * @return string
     */
    public function get_elcoin()
    {
        $course = Course::with('currency')->where('currency_id', 11)->first()->toArray();

        return json_encode($course);
    }
}
