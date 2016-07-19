<?php

namespace App\Http\Controllers\Admin;

use App\Models\PullOffMoney;
use Illuminate\Http\Request;

/**
 * Class AdminPullOffMoneyController
 * @package App\Http\Controllers
 * @Controller(prefix="admin")
 * @Middleware("web")
 */
class AdminPullOffMoneyController extends AbstractAdminController
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @GET("/pulloffmoney", as="admin.pulloffmoney.index")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pulls = PullOffMoney::all();

        return view('admin.pulloffmoney.index', compact('pulls'));
    }

    /**
     * @POST("/pulloffmoney/{id}", as="admin.pulloffmoney.status")
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status_update($id, Request $request)
    {
        $pull = PullOffMoney::findORFail($id);
        $pull->status = $request->input('status');
        $pull->update();

        return redirect()->back();
    }
}
