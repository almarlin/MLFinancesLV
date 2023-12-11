<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {

        $message = new Message();


        $message->user_id = $request->user()->id;
        $message->content = $request->input('inputMessage');
        $message->receiver_id = 1;

        $message->save();

        return redirect(route('mipanel'));
    }

    public function adminSendMessage(Request $request)
    {

        $message = new Message();

        $message->user_id = $request->input('user_id');
        $message->content = $request->input('inputMessage');
        $message->receiver_id = 1;

        $message->save();

        $user=User::find($request->input('user_id'));

        return redirect()->route('adminChat', ['userName' => $user->NAME]);

    }
}
