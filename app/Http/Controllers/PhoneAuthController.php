<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneAuthController extends Controller
{

    public function getLogin()
    {
        return view('phoneauth.index');
    }

    public function getRegister()
    {
        return view('phoneauth.register');
    }

    public function getVerify()
    {
        return view('phoneauth.validate');
    }

    public function getReferral()
    {
        return view('phoneauth.referral');
    }

    public function postLogin()
    {
        $phoneNum = request('phone');
        session(['phoneNum' => $phoneNum]);

        $user = User::where('phone', '=', $phoneNum)->first();
        if($user)
        {
          $user->sendToken();
          return redirect('/start/verify')->with('status', 'We have sent you an 5-digit OTP on ' . session('phoneNum'));
        } else
        {
           return redirect('/start/register')->with('status', 'No account is linked to this phone number! If you already had an account with us, enter the email id of that account to link your old account to this phone number or else lets create a new one.');
        }

    }

    public function postRegister()
    {
        $phoneNum = request('phone');
        $name = request('name');
        $email = request('email');
        session(['phoneNum' => $phoneNum]);

        if(isset($email))
        {
          $userWithEmail = User::where('email', '=', $email)->first();
        }

        $refer_code = strtoupper(substr($name, 0, 3) . mt_rand(100, 999));

        if(isset($email) && $userWithEmail){
            $userWithEmail->name = $name;
            $userWithEmail->phone = $phoneNum;
            $userWithEmail->refer_code = $refer_code;
            $userWithEmail->save();
            $user = $userWithEmail;
        } else {
            $user = User::create(['name' => $name, 'phone' => $phoneNum, 'email' => $email, 'refer_code' => $refer_code]);
            session(['is_new' => true]);
        }

        if($user)
        {
          $user->sendToken();
          return redirect('/start/verify')->with('status', 'We have sent you an 5-digit OTP on ' . session('phoneNum'));
        } else
        {
           return redirect('/start/register')->with('warning', 'There was some problem creating your account please try again.');
        }

    }

    public function tryAuth()
    {
        $token = request('token');
        $phoneNum = session('phoneNum');
        $user = User::where('phone', '=', $phoneNum)->firstOrFail();

        if($user && $user->validateToken($token)) {
            if($user->refer_code == null)
            {
                $user->refer_code = strtoupper(substr($user->name, 0, 3) . mt_rand(100, 999));
                $user->save();
            }
            if(session('is_new'))
            {
              return redirect('/start/referral')->with('status', 'Enter a referral code.');
            } else {
                return redirect('/home');
            }
         } else {
            return back()->with('warning', 'The authentication token is not correct!');
         }
    }

    public function postReferral()
    {
        $referrer = User::where('refer_code', strtoupper(request('refer_code')))->first();

        if($referrer) {
            $referrer->referred += 10;
            $referrer->save();
            sendSMS($referrer->phone, 'You earned 10 points on Droghers. Your amount will be credited to you within 72 Hrs.');
            return redirect('/home');
        } else {
            return back()->with('warning', 'Invalid referral code please check again.');
        }
    }
}
