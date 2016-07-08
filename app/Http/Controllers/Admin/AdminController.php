<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Admin\AbstractAdminController as AdminBaseController;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 * @Middleware("admin")
 *
 */
class AdminController extends AdminBaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.admin.index');
    }


}
