<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banks;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class AdminRequestsController
 * @package App\Http\Controllers
 * @Controller(prefix="admin")
 */
class AdminRequestsController extends AbstractAdminController
{
    public function __construct()
    {
        $this->middleware(['web', 'admin']);
    }

    /**
     * @GET("/requests", as="admin.requests.users")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $requests = Purchase::all();
        return view('admin.requests.index', compact('requests'));
    }

    /**
     * @POST("/requests/moderation/{id}", as="admin.requests.moderation")
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function moderation(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        $user = User::where('id', $purchase->user_id)->first();

        if(\Auth::user()->hasRole('supervisor')) {

            $purchase->status_moderation = $request->input('status_moderation');
            $purchase->update();
            return back();

        } elseif (\Auth::user()->hasRole('admin')) {

            if($purchase->status_trust == 0) {
                $bank = Banks::where('banks_profiles_id', 1)->first();

                $bank->amount -= $purchase->total;
                $bank->update();

                $user->balance += $purchase->total;
                $user->update();

            } elseif ($purchase->status_trust == 1) {
                $bank = Banks::where('banks_profiles_id', 2)->first();

                $bank->amount += $purchase->total;
                $bank->update();

                $user->balance += $purchase->total;
                $user->update();

            } elseif ($purchase->type_id == 3) {

                $user->balance += $purchase->total;
                $user->update();
            }

            $purchase->status_admin = $request->input('status_admin');
            $purchase->update();
            return back();
        }
    }

    /**
     * @DELETE("/requests/{id}", as="admin.requests.delete")
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Purchase::findOrFail($id)->delete();

        return back();
    }

    /**
     * @GET("/requests/finished", as="admin.requests.finished")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finishedTransactions()
    {
        $requests = Purchase::where('status_admin', 1)->get();

        return view('admin.requests.finished', compact('requests'));
    }
}
