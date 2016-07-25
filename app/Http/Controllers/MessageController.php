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

    public function show(MessageBl $messageRequest, UserBl $userRequest, $id_user_to = null)
    {
        if(Auth::id() != $userRequest->getAdminId()){
            return view('/message/show', $messageRequest->showUserMessages(Auth::id(), $userRequest->getAdminId())) ;
        } else {
            $user_to = $id_user_to == null ? null : $id_user_to;
            $data = $messageRequest->showUserMessages(Auth::id(), $user_to);
            $data['users'] = $userRequest->getUsersList();
            $data['type'] = 'admin';
            return view('/message/showadmin', $data) ;
        }
    }

    public function showajax(Request $request, MessageBl $messageRequest)
    {
        return $messageRequest->showAdminMessages($request->id_user_to);
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

    public function historydelete(Request $request, MessageBl $messageRequest){
        if ($request->isMethod('post')) {
            return $messageRequest->deleteMessages($request);
        }
    }
}


