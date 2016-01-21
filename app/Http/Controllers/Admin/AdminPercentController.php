<?php

namespace App\Http\Controllers\Admin;

use App\Models\Percent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminPercentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percent = Percent::all();

        return view('admin.percent.index', compact('percent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Percent $percent
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Percent $percent)
    {
        return view('admin.percent.edit', compact('percent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Percent $percent
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Percent $percent)
    {
        $percent->fill($request->all());
        $percent->update();

        return redirect()->route('admin.percent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
