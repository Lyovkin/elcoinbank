<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conclusion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminConclusionController
 * @package App\Http\Controllers\Admin
 */
class AdminConclusionController extends Controller
{
    /**
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $conclusion = Conclusion::orderBy('id', 'desc')->paginate(15);
        return view('admin.conclusion.index', compact('conclusion'));
    }

    public function success($id, Request $request)
    {
        $conclusion = Conclusion::findOrFail($id);
        $conclusion->status = $request->input('status');
        $conclusion->update();

        return redirect()->back();
    }

    public function delete($id)
    {
        Conclusion::findOrFail($id)->delete();

        return redirect()->back();
    }
}
