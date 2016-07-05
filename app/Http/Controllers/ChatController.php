<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use LRedis;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::all();
        return view('messenger.index', compact('messages'));
    }

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

    public function deleteMessage(Request $request)
    {
        $message = Message::findOrFail($request->input('id'));
        $message->delete();
        return back();
    }
}
