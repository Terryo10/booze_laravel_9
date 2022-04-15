<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($loginData)) {
            return $this->jsonError(401, "Invalid credentials");
        }
//        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $accessToken = auth()->user()->createToken('authToken')->plainTextToken;
        return response(['user' => auth()->user(), 'token' => $accessToken, 'success' => true, 'message' => 'Logged in successfully']);
    }


}
