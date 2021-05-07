<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request, $id)
    {
        if(! isset(Auth::user()->id)) {
            return redirect()->back()->with('messageError', 'Morate se ulogovati da biste poslali poruku!');
        }

        $ad = Ad::find($id);
        $receiver_id = $ad->user_id;

        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->title = $request->title;
        $message->text = $request->message;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $receiver_id;
        $message->ad_id = $ad->id;
        $message->save();

        return redirect()->back()->with('Success', 'Uspesno ste poslali poruku.');
    }

    public function inbox() {
        
        // $messages = Message::where('receiver_id', Auth::user()->id)->get();
        $messages = Message::where('receiver_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        
        foreach($messages as $message) {
            $user = User::where('id', $message->sender_id)->first();
        }

        if(!isset($user)) {
            return view('emptyInbox');
        }

        return view('userInbox', compact('messages', 'user'));
    }

    public function showMsg($id) {

        $message = Message::find($id);

        $sender = User::where('id', $message->sender_id)->first();

        return view('showMessage', compact('message', 'sender'));
    }

    public function replyMsg(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'ad_id' => 'required'
        ]);

        $message = new Message();
        $message->title = $request->title;
        $message->text = $request->text;
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->ad_id = $request->ad_id;
        $message->save();
        
        return redirect()->back()->with('successReply', 'Vasa poruka je poslata.');
    }
}
