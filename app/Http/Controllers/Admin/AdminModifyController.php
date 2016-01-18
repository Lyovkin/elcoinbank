<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminModifyController
 * @package App\Http\Controllers\Admin
 */
class AdminModifyController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBalance(User $user)
    {
        return view('admin.modify.addmoney', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeBalance(Request $request)
    {
        $page = $request->page;
        $user = User::where('id', '=', $request->user_id)->first();
        $user->balance = $request->sum;
        $user->update();

        return redirect()->route('admin.user.index');
    }
}
