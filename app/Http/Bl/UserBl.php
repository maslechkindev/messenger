<?php

namespace App\Http\Bl;

use App\Http\Models\User;
use App\Http\Models\Message;
use Illuminate\Support\Facades\DB;

class UserBl extends MainBl
{
    const ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID = 2;

    public function getAdminId()
    {
        $user = User::select(['id'])
                    ->where('users.id_role', '=', self::ADMIN_ROLE_ID)
                    ->orderBy('id')
                    ->get();
        return $this->checkEmpty($user[0]->id);
    }

    public function getUsersList()
    {
        $users = User::select(['users.*', DB::raw('COUNT(`messages`.id) as `message_count`')])
            ->rightJoin('messages', 'messages.id_sender', '=', 'users.id')
            ->where('users.id_role', '!=', self::ADMIN_ROLE_ID)
            ->where('messages.is_new', '=', 1)
            ->orderBy('users.id')
            ->groupBy('messages.id_sender')
            ->get();
        return !empty($users) ? $users : [];
    }

    public function getLastUserId($users)
    {
        return !empty($users[count($users) - 1]->id) ?
            $users[count($users) - 1]->id : null;
    }

    public function delteUser($data)
    {
        $user = User::find($data->id_user_to);
        $user->deleted = 1;
        return $user->save() ? 'success' : 'error';
    }

    public function updateUser($data)
    {
        $user = User::find($data->id_user_to);
        $user->deleted = 0;
        return $user->save() ? 'success' : 'error';
    }
}
