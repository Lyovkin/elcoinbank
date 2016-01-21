<?php

namespace App\Services\Request;

use App\Models\Request;

/**
 * Class RequestService
 * @package App\Services\Request
 */
class RequestService
{
    /**
     * @return mixed
     */
    public function viewRequest()
    {
        return Request::orderBy('id', 'desc');
    }

    /**
     * @param $input
     * @return Request
     */
    public function createRequest($input)
    {
        $req = new Request();
        $req->fill($input);
        $req->save();
        return $req;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $req = Request::findOrFail($id);
        $req->delete();
    }
}