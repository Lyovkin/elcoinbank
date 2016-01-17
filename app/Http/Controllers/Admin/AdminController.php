<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 *
 * @Resource("/admin")
 * @Middleware("admin")
 */
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index');
    }
}
