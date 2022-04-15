<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{

    public function loginSocialite(Request $request){
        $provider = $request->input('provider_name');
        $user_token = $request->input('access_token');

        $providerUser = Socialite::driver($provider)->userFromToken($user_token);
        // check if access token exists etc
        // search for a user in our server with the specified provider id and provider name
        $user = User::where('provider_name', $provider)->where('provider_id', $providerUser->id)->first();
        // if there is no record with these data, create a new user
        dd($user);
        if($user == null){
            try{
                User::create([
                    'provider_name' => $provider,
                    'provider_id' => $providerUser->id,
                ]);
                $accessToken = auth()->user()->createToken('authToken')->plainTextToken;
                return response(['user' => auth()->user(), 'token' => $accessToken, 'success' => true, 'message' => 'Logged in successfully']);
            }catch (e){

            }

        }else{
            // user exists
        }
    }

}
