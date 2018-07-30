<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PhoneAuthController extends Controller
{

    public function postLogin()
    {
        $phoneNum = request('phone');
       // session(['phoneNum' => $phoneNum]);

        $user = User::where('phone', '=', $phoneNum)->first();
        if($user)
        {
          $token = $user->sendToken();
          return response(['status' => 'success', 'message' => 'We have sent you an 5-digit OTP on ' . session('phoneNum'), 'data' => ['auth_token' =>  $token]]);
        } else
        {
          return response(['status' => 'no-account', 'message' => 'No Account Found!', 'data' => []]);
        }

    }

    public function postRegister()
    {
        $phoneNum = request('phone');
        $name = request('name');
        $email = request('email');
        $code = request('refer_code');
       // session(['phoneNum' => $phoneNum]);

        $data = [];

        $data['is_new'] = false;

        if(isset($email))
        {
            $userWithEmail = User::where('email', '=', $email)->first();
        } else {
            $userWithEmail = null;
        }

        $refer_code = strtoupper(substr($name, 0, 3) . mt_rand(100, 999));

        if($userWithEmail) {
            $userWithEmail->name = $name;
            $userWithEmail->phone = $phoneNum;
            $userWithEmail->refer_code = $refer_code;
            $userWithEmail->save();
            $user = $userWithEmail;
        } else {
            $user = User::create(['name' => $name, 'phone' => $phoneNum, 'email' => $email, 'refer_code' => $refer_code]);
            $data['is_new'] = true;
         }

        if($user)
        {
           $data['auth_token'] = $user->sendToken();
           return response(['status' => 'success', 'message' => 'We have sent you an 5-digit OTP on ' . $phoneNum, 'data' => $data]);
        } else
        {
           return response(['status' => 'failed', 'message' => 'There was some problem creating your account! Please try again.', 'data' => []]);
        }

    }

    public function tryAuth()
    {
        $token = request('token');
        $validToken = request('auth_token');
        $phoneNum = request('phone');
        $user = User::where('phone', '=', $phoneNum)->first();

        if($user && $token == $validToken) {
            $user->verified = 1;
            if($user->refer_code == null)
            {
                $user->refer_code = strtoupper(substr($user->name, 0, 3) . mt_rand(100, 999));
            }
            $user->save();
            $user->generateToken();

            if(request('is_new'))
            {
                $referrer = User::where('refer_code', strtoupper(request('refer_code')))->first();
            if($referrer) {
                $referrer->referred += 10;
                $referrer->save();
                sendSMS($referrer->phone, 'You earned 10 points on Droghers. Your amount will be credited to you within 72 Hrs.');
            }
              return response(['status' => 'success', 'message' => '', 'data' => $user->toArray()]);
            } else {
                 return response(['status' => 'success', 'message' => '', 'data' => $user->toArray()]);
            }
         } else {
            return response(['status' => 'failed', 'message' => 'The authentication token is not correct', 'data' => []]);
        }
    }

    public function sendOTP()
    {
         $message = "Your Droghers verification OTP is " . request('auth_token');
        sendSMS(request('phone'), $message);
        return response(['status' => 'success', 'message' => 'OTP Sent', 'data' => []]);
    }
}
