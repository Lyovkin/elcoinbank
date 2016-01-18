<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc');
        $users = $users->paginate(10);

        return view('admin.user.index', compact('users'));
    }
}
