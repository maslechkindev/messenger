<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Bl\MessageBl;
use App\Http\Bl\UserBl;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(MessageBl $messageRequest, UserBl $userRequest)
    {
        return view('/message/show', $messageRequest->showUserMessages(Auth::id(), $userRequest->getAdminId()));
    }

    public function send(Request $request, MessageBl $messageRequest)
    {
        if ($request->isMethod('post')) {
            $messageRequest->sendMessage($request);
        }
    }

    public function updatechat(Request $request, MessageBl $messageRequest)
    {
        if ($request->isMethod('post')) {
            return $messageRequest->getNewMessages($request);
        }

    }
}


