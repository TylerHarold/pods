<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Pod\ChatMessage;

use App\Events\SendPodMessage;

class ChatController extends Controller
{
    public function sendMessage(Request $request) {
        $username = Auth::user()->username;
        $avatar = Auth::user()->avatar;
        $date = Carbon::now();
        $channel = $request->get("channel");
        $message = $request->get("message");

        return event(new SendPodMessage(
            [
                'username' => $username,
                'avatar' => $avatar,
                'date' => Carbon::parse($date)->diffForHumans(),
                'channel' => $channel,
                'message' => $message
            ]
        ));
    }
}
