<?php

namespace App\Http\Bl;

use App\Http\Models\Message;

class MessageBl extends MainBl
{
    public function showUserMessages($userId)
    {
        return $this->checkEmpty(Message::where('messages.id_sender', '=', $userId, 'or')
            ->orWhere('messages.id_user_to', '=', $userId)
            ->nodeleted()
            ->orderBy('published_at', 'asc')
            ->get());
    }

    public function sendMessage($data)
    {
        $messageRequest = new Message();
        $messageRequest->message = $data['message'];
        $messageRequest->id_sender = $data['id_sender'];
        $messageRequest->id_user_to = $data['id_user_to'];
        $messageRequest->save();
    }
}
