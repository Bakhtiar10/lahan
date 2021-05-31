<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Auth;

class ChatController extends Controller
{
    public function createChat(Request $request){
        $room_id = 'S'.$request->sender.'R'.$request->receive;
        $chat = Chat::where('room_id', $room_id)->orderBy('created_at', 'ASC')->get();

        $receive_id = $request->receive;

        return view('chat.chat_message', compact('room_id', 'chat', 'receive_id'));
    }

    public function storeMessage(Request $request) {
        // dd($request->all());

        Chat::create([
            'room_id' => $request->room_id,
            'sender_id' => $request->sender,
            'receive_id' => $request->receive,
            'message' => $request->message
        ]);

        return redirect()->back();
    }

    public function chatList(Request $request) {
        $chat_list = Chat::with('sender')->select('room_id', 'sender_id')->where('receive_id', Auth::user()->id)->groupBy('room_id', 'sender_id')->get();

        return view('chat.chat_list', compact('chat_list'));
    }

    public function messageJson(Request $request){
        // dd($request->all());
        $room_id = 'S'.$request->sender.'R'.$request->receive;
        $chat = Chat::where('room_id', $room_id)->orderBy('created_at', 'ASC')->get();

        return response()->json([
            'data' => $chat
        ]);
    }

    public function chatJson($room_id) {
        $chats = Chat::where('room_id', $room_id)->get();

        return response()->json([
            'data' => $chats
        ]);
    }
}
