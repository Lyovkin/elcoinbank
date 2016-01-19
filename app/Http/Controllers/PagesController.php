<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Get("/rules")
     * @Middleware("web")
     */
    public function rules()
    {
        return view('pages.rules');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Get("/conditions")
     * @Middleware("web")
     */
    public function conditions()
    {
        return view('pages.cond');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Get("faq")
     * @Middleware("web")
     */
    public function faq()
    {
        return view('pages.faq');
    }
}
