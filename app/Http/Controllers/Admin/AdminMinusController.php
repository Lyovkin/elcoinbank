<?php

namespace App\Http\Controllers\Admin;

use App\Models\Minus;
use Illuminate\Http\Request;


/**
 * Class AdminMinusController
 * @package App\Http\Controllers
 * @Controller(prefix="admin")
 * @Middleware("web")
 */
class AdminMinusController extends AbstractAdminController
{
    /**
     * AdminMinusController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @GET("/minus", as="admin.minus.index")
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $minuses = Minus::all();

        return view('admin.minus.index', compact('minuses'));
    }

    /**
     * @GET("/minus/{minus}/edit", as="admin.minus.edit")
     * @param Minus $minus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Minus $minus)
    {
        return view('admin.minus.edit', compact('minus'));
    }

    /**
     * @PATCH("minus/{minus}", as="admin.minus.update")
     * @param Minus $minus
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Minus $minus, Request $request)
    {
        $minus->fill($request->all());
        $minus->update();
        return redirect()->route('admin.minus.index')->with('message', 'Значение обновлено!');
    }
}
