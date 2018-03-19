<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{


    public function get()
    {
         $user = User::where('api_token', request('api_token'))->first();

         if(!$user)
        {
            return response(['status' => 'failed', 'message' => 'There was some problem loading profile data!', 'data' => []]);
        }

         return response(['status' => 'success', 'message' => 'Profile Data Loaded', 'data' => $user->toArray()]);
    }


    public function update()
    {
         $user = User::where('api_token', request('api_token'))->first();

         if(!$user)
        {
            return response(['status' => 'failed', 'message' => 'There was some problem loading profile data!', 'data' => []]);
        }

        $user->name = request('name');

        $user->email = request('email');

        $user->save();


         return response(['status' => 'success', 'message' => 'Profile updated!', 'data' => $user->toArray()]);
    }


   

    


   
}
