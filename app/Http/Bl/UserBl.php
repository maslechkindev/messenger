<?php

namespace App\Http\Bl;

use App\Http\Models\User;

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
}
