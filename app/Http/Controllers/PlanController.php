<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;


/**
 * Class PlanControler
 * @package App\Http\Controllers
 */
class PlanController extends Controller
{
    /**
     * @POST("get_plan")
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_plan(Request $request)
    {
        //dd($request->all());

        $plan = Plan::where('id', $request->input('plan'))->first()->toArray();
        return response()->json($plan);
    }
}
