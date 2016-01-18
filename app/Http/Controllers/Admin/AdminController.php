<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\AbstractAdminController as AdminBaseController;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 *
 */
class AdminController extends AdminBaseController
{
    public function index()
    {
        return view('admin.admin.index');
    }


}
