<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banks;
use App\Models\Purchase;
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

        if(\Auth::user()->hasRole('supervisor')) {

            if($purchase->status_trust == 0) {
                $bank = Banks::where('banks_profiles_id', 1)->first();

                $bank->amount -= $purchase->total;
                $bank->update();

            } elseif ($purchase->status_trust == 1) {
                $bank = Banks::where('banks_profiles_id', 2)->first();

                $bank->amount += $purchase->total;
                $bank->update();
            }

            $purchase->status_moderation = $request->input('status_moderation');
            $purchase->update();
            return back();

        } elseif (\Auth::user()->hasRole('admin')) {

            if($purchase->status_trust == 0) {
                $bank = Banks::where('banks_profiles_id', 1)->first();

                $bank->amount -= $purchase->total;
                $bank->update();

            } elseif ($purchase->status_trust == 1) {
                $bank = Banks::where('banks_profiles_id', 2)->first();

                $bank->amount += $purchase->total;
                $bank->update();
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
}
