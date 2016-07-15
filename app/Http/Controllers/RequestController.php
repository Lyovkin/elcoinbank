<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Purchase;
use App\Services\Request\RequestService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class RequestController
 * @package App\Http\Controllers
 */
class RequestController extends Controller
{

    /**
     * @var RequestService
     */
    protected $req;

    /**
     * @param RequestService $requestService
     */
    public function __construct(RequestService $requestService)
    {
        $this->middleware('auth');
        $this->req = $requestService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->req->createRequest($request->all());

        \Session::flash('message', 'Вы успешно отправили запрос! Ожидайте, иы обязательно ответим Вам.');

        return redirect()->back();
    }

    /**
     * @param \App\Models\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(\App\Models\Request $request)
    {
        $user = \Auth::user();

        if(Purchase::where('user_id', $user->id)->where('type_id', 2)->get()) {
            $currencies = Plan::where('type_id', 1)->get();
        } else {
            $currencies = Plan::where('type_id', 2)->get();
        }

        return view('request.create', compact('request', 'user', 'currencies'));
    }
}
