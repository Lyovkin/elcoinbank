<?php

namespace App\Http\Controllers\Admin;

use App\Services\Request\RequestService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminRequestController extends Controller
{
    protected $reqService;
    
    public function __construct(RequestService $requestService)
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
