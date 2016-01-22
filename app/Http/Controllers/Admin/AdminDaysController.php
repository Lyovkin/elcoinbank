<?php

namespace App\Http\Controllers\Admin;

use App\Models\Days;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDaysController extends Controller
{

    public function __construct(Auth $auth)
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Days::all();

        return view('admin.days.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Days $days
     * @return \Illuminate\Http\Response
     */
    public function create(Days $days)
    {
        return view('admin.days.create', compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Days $days
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Days $days)
    {
        $days->fill($request->all());
        $days->save();

        return redirect()->route('admin.days.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Days::findOrFail($id)->delete();

        return redirect()->back();

    }
}
