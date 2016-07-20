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
        return view('/message/show', [
            'messages' => $messageRequest->showUserMessages(Auth::id()),
            'id_user' => Auth::id(),
            'id_user_to' => $userRequest->getAdminId()
        ]);
    }

    public function send(Request $request, MessageBl $messageRequest)
    {
        if ($request->isMethod('post') && !empty($request->message) &&
            !empty($request->id_user_to) && !empty($request->id_sender)) {
            $messageRequest->sendMessage([
                'message' => $request->message,
                'id_user_to' => $request->id_user_to,
                'id_sender' => $request->id_sender,
            ]);
        }

        /*
        return view('/message/show');*/
    }

    public function checkmessage(MessageBl $messageRequest)
    {
        return 12;

        /*
        return view('/message/show');*/
    }

    public function getmessage()
    {
        if (file_exists('chat.txt')) {
            $lines = file('chat.txt');
        }
        $log['message'] = count($lines);
        echo json_encode($log);
    }

    public function updatemessage()
    {
        $state = $_POST['message'];
        if (file_exists('chat.txt')) {
            $lines = file('chat.txt');
        }
        $count =  count($lines);
        if ($state == $count){
            $log['message'] = $state;
            $log['text'] = false;
        } else {
            $text= array();
            $log['message'] = $state + count($lines) - $state;
            foreach ($lines as $line_num => $line) {
                if ($line_num >= $state){
                    $text[] =  $line = str_replace("\n", "", $line);
                }
            }
            $log['text'] = $text;
        }
        echo json_encode($log);
    }

    public function sendmessage()
    {
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        $message = htmlentities(strip_tags($_POST['message']));
        if (($message) != "\n") {
            if (preg_match($reg_exUrl, $message, $url)) {
                $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
            }
            fwrite(fopen('chat.txt', 'a'), "<span> guest </span>" . $message = str_replace("\n", " ", $message) . "\n");
        }
    }

}


