<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banks;
use Illuminate\Http\Request;

/**
 * Class AdminBanksController
 * @package App\Http\Controllers\Admin
 * @Resource("bank")
 * @Controller(prefix="admin")
 */
class AdminBanksController extends AbstractAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Banks::with('profile')->get();
        return view('admin.bank.index', compact('banks'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Banks $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Banks $bank)
    {
        return view('admin.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Banks $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banks $bank)
    {
        $bank->fill($request->all())->update();

        return redirect()->route('admin.bank.index');
    }

}
