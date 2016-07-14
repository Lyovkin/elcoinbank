<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\PlansType;
use Illuminate\Http\Request;

/**
 * Class AdminPlansController
 * @package App\Http\Controllers\Admin
 * @Controller(prefix="admin")
 */
class AdminPlansController extends AbstractAdminController
{
    public function __construct()
    {
        $this->middleware(['web', 'admin']);
    }
    /**
     * @GET("/plans", as="admin.plans.index")
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * @GET("/plans/{plan}/edit", as="admin.plans.edit")
     * @param Plan $plan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * @PATCH("/plans/{plan}", as="admin.plans.update")
     * @param Plan $plan
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Plan $plan, Request $request)
    {
        $type = PlansType::findOrFail($request->input('type_id'));
        $plan->fill($request->all());
        $plan->type()->associate($type);
        $plan->update();

        return redirect()->route('admin.plans.index');
    }
}
