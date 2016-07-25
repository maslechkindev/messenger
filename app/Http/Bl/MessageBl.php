<?php

namespace App\Http\Bl;

use App\Http\Models\Message;

class MessageBl extends MainBl
{
    public function showUserMessages($userId, $adminId)
    {
        $messages = $this->checkEmpty(Message::where('messages.id_sender', '=', $userId, 'or')
            ->orWhere('messages.id_user_to', '=', $userId)
            ->nodeleted()
            ->orderBy('published_at', 'asc')
            ->get());
        return [
                'messages' => $adminId == null ? [] : $messages,
                'id_user' => $userId,
                'id_user_to' => $adminId,
                'id_last_message' => !empty($messages[count($messages) - 1]->id) ?
                    $messages[count($messages) - 1]->id : null
               ];
    }

    public function showAdminMessages($userId)
    {
        $messages = $this->checkEmpty(Message::where('messages.id_sender', '=', $userId, 'or')
            ->orWhere('messages.id_user_to', '=', $userId)
            ->nodeleted()
            ->orderBy('published_at', 'asc')
            ->get());
        return [
            'messages' => $messages,
            'id_user' => $userId,
            'id_last_message' => !empty($messages[count($messages) - 1]->id) ?
                $messages[count($messages) - 1]->id : null
        ];
    }

    public function sendMessage($data)
    {
        if (!empty($data->message) && !empty($data->id_user_to) && !empty($data->id_sender)) {
            $messageRequest = new Message();
            $messageRequest->message = $data->message;
            $messageRequest->id_sender = $data->id_sender;
            $messageRequest->id_user_to = $data->id_user_to;
            $messageRequest->save();
        } elseif (!empty($data->message) && empty($data->id_user_to) && empty($data->id_sender)){
            $messageRequest = new Message();

            $messageRequest->message = $data->message;
            $messageRequest->id_sender = $data->id_sender;
            $messageRequest->id_user_to = $data->id_user_to;
            $messageRequest->save();
        }

    }

    public function getNewMessages($data)
    {
        return Message::where('messages.id_sender', '=', $data->id_user_to, 'or')
            ->orWhere('messages.id_user_to', '=', $data->id_user_to)
            ->nodeleted()
            ->newmessage($data->id_last_message)
            ->orderBy('published_at', 'asc')
            ->get()
            ->toJson();
    }

    function deleteMessages($data)
    {
       return Message::where('messages.id_sender', '=', $data->id_user_to, 'or')
            ->orWhere('messages.id_user_to', '=', $data->id_user_to)
            ->update(['deleted' => 1]);
    }
}
