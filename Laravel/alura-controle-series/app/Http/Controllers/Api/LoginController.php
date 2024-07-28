<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        //dd($credentials);

        $user = User::whereEmail($credentials['email'])
            ->first();
        dd($user);
    }
}
