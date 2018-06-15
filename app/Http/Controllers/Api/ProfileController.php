<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\PasswordBroker;


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



    public function sendResetLinkEmail(Request $request, PasswordBroker $broker)
    {
        if( $request->wantsJson() )
        {
            $this->validate($request, ['email' => 'required|email']);

            $response = $broker->sendResetLink($request->only('email'));

            return $response == PasswordBroker::RESET_LINK_SENT
                    ? response(['status' => 'success', 'message' => 'Password reset instructions sent!', 'data' => []])
                    : response(['status' => 'failed', 'message' => 'There was some problem loading profile data!', 'data' => []]);
        }

        return false;

        
    }

    public function sendOTP(Request $request)
    {
        $phone = $request->get('phone');

        $otp = mt_rand(10000, 99999);


        $message = 'Your Droghers verification OTP is ' . $otp;

        $response = sendSMS($phone, $message);

        return response(['status' => 'success', 'message' => 'OTP sent successfully!', 'otp' => $otp, 'phone' => $phone, 'api' => $response]);
    }

    public function verifyResend()
    {
        $user = User::where('api_token', request('api_token'))->first();

        if($user->verifyUser == null)
        {
             $verifyUser = VerifyUser::create([
                'user_id' => $user->id,
                'token' => str_random(40)
            ]);
        }

        if($user->verified)
        {
          
            return response(['status' => 'success', 'message' => 'Your account is verified successfully!']);
       
        } else {

            \Mail::to($user->email)->send(new VerifyMail($user));

            return response(['status' => 'failed', 'message' => 'We have resent you the verification email!']);
        
        }

        
    }

    


   
}
