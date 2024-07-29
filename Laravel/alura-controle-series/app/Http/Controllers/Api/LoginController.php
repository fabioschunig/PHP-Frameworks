<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        //dd($credentials);

        // $user = User::whereEmail($credentials['email'])
        //     ->first();

        // if (Hash::check($credentials['password'], $user->password) === false) {
        //     return response()->json('Unauthorized', 401);
        // }

        if (Auth::attempt($credentials) === false) {
            return response()->json('Unauthorized', 401);
        }

        $user = Auth::user();
        //dd($user);

        $token = $request->user()->createToken('token');
        return response()->json($token->plainTextToken);
    }
}
