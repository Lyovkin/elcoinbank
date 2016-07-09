<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Message;
use LRedis;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::all();
        return view('welcome', compact('messages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $redis = LRedis::connection();

        $data = [
            'message' => $request->input('message'),
            'user' => $request->input('user'),
            'user_id' => $request->input('id'),
            'createdAt' => new \DateTime()
        ];

        $message = new Message();
        $message->fill($data);
        $message->save();

        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMessage(Request $request)
    {
        $message = Message::findOrFail($request->input('id'));
        $message->delete();
        return back();
    }
}
