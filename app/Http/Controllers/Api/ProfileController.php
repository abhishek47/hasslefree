<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Password;

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



    public function sendResetLinkEmail(Request $request, Password $broker)
    {
        if( $request->ajax() )
        {
            $this->validate($request, ['email' => 'required|email']);

            $response = $passwords->sendResetLink($request->only('email'));

            return $response == Password::RESET_LINK_SENT
                    ? response(['status' => 'success', 'message' => 'Password reset instructions sent!', 'data' => []])
                    : response(['status' => 'failed', 'message' => 'There was some problem loading profile data!', 'data' => []]);
        }

        return false;

        
    }

   

    


   
}
