<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Bl\UserBl;

use App\Http\Requests;

class UserController extends Controller
{
    function delete(Request $request, UserBl $userRequest){
        if ($request->isMethod('post')) {
            $userRequest->delteUser($request);
        }
    }

    function update(Request $request, UserBl $userRequest){
        if ($request->isMethod('post')) {
            $userRequest->updateUser($request);
        }
    }

    function show(UserBl $userRequest){
        return $userRequest->getUsersList();
    }
}
