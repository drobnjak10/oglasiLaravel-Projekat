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
        
        $messages = Message::where('receiver_id', Auth::user()->id)->get();
        
        foreach($messages as $message) {
            $user = User::where('id', $message->sender_id)->first();
        }

        return view('userInbox', compact('messages', 'user'));
    }
}
