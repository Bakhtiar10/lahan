<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Lahan;
use Auth;
use Session;

class ChatController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function createChat(Request $request){
        $room_id = 'S'.Auth::user()->id.'R'.$request->receive;
        $chat = Chat::where('room_id', $room_id)->orderBy('created_at', 'ASC')->get();

        $receive_id = $request->receive;
        $lahan = Lahan::findOrFail($request->lahan);

        session()->put('tanya_penjual', 'pertama');

        // if($request->session()->has('tanya_penjual')){
        //    Chat::create([
        //         'room_id' => $room_id,
        //         'sender_id' => Auth::user()->id,
        //         'receive_id' => $receive_id,
        //         // 'message' => ''
        //     ]);
        //
        //     session()->forget('tanya_penjual');
        // }

        // dd($lahan);

        return view('chat.chat_message', compact('room_id', 'chat', 'receive_id', 'lahan'));
    }

    public function storeMessage(Request $request) {

        Chat::create([
            'room_id' => $request->room_id,
            'sender_id' => $request->sender,
            'receive_id' => $request->receive,
            'message' => $request->message
        ]);

        $request->session()->put('tanya_penjual', 'default');

        return session()->forget('tanya_penjual');
    }

    public function chatList(Request $request) {
        $chat_list = Chat::with('sender')->select('room_id', 'sender_id')->where('receive_id', Auth::user()->id)->groupBy('room_id', 'sender_id')->get();

        return view('chat.chat_list', compact('chat_list'));
    }

    public function chatListPembeli(Request $request) {
        $chat_list = Chat::with('sender')->select('room_id', 'sender_id')->where('receive_id', Auth::user()->id)->groupBy('room_id', 'sender_id')->get();

        return view('chat.chat_list_pembeli', compact('chat_list'));
    }

    public function messageJson(Request $request){
        // dd($request->all());
        $room_id = 'S'.$request->sender.'R'.$request->receive;
        $chat = Chat::where('room_id', $room_id)->orderBy('created_at', 'ASC')->get();

        if(session()->has('tanya_penjual')){
            session()->put('tanya_penjual', 'pertama');
        }

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
