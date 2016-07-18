<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class AdminDepositController
 * @package App\Http\Controllers\Admin
 * @Controller(prefix="admin")
 */
class AdminDepositController extends AbstractAdminController
{
    public function __construct()
    {
        $this->middleware(['web', 'admin']);
    }

    /**
     * @GET("/deposits", as="admin.deposits.index")
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $deposits = Deposit::all();

        return view('admin.deposits.index', compact('deposits'));
    }
}
