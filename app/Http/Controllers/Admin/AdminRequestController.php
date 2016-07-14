<?php

namespace App\Http\Controllers\Admin;

use App\Services\Request\RequestService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminRequestController
 * @package App\Http\Controllers\Admin
 */
class AdminRequestController extends Controller
{
    protected $reqService;
    
    public function __construct(RequestService $requestService, Auth $auth)
    {
        $this->reqService = $requestService;
    }
    
    public function index()
    {
        $requests = $this->reqService->viewRequest()->paginate(10);
            
        return view('admin.request.index', compact('requests'));
    }

    public function delete($id)
    {
        $this->reqService->delete($id);

        return redirect()->back();
    }
}
