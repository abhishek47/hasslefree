<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    
    use AuthenticatesUsers;    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

        $this->validateLogin($request);

        $user = \App\User::where(['email' => request('email')])->first();

        if($user) {
           
            if ($this->attemptLogin($request)) {
             
                return $this->sendLoginResponse($request);
             
             }
       
             return $this->sendFailedLoginResponse($request);

        } else {

            return $this->sendUserNotExistResponse($request);

        }
        
    }


     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        return response(['response'=> 'success', 'user'=>$this->guard()->user(), 'message' => 'User Logged in successfully!'], 200);
    }


     /**
     * Send the response after the user was not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return response(['response'=> 'failed', 'user'=> [], 'message' => 'Please check your credentials!'], 200);
    }


    /**
     * Send the response after the user was not found.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendUserNotExistResponse(Request $request)
    {
        return response(['response'=> 'failed', 'user'=> [], 'message' => 'No user exist with the given e-mail!'], 200);
    }
}
