<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\PushToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushTokensController extends Controller
{

        public function register()
        {
            $user = User::where('api_token', request('api_token'))->first();

           // return response(['user' => $user], 200);
            if($user)
            {
                if($user->pushToken != null)
                {
                    $user->pushToken->token = request('token');
                    $user->pushToken->save();
                } else {
                    $user->pushToken()->create(['token' => request('token')]);
                }
            }


            return response(['status' => 'success'], 200);
        }



}
