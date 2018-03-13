<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /* Handle Social login request
 
    *
 
    * @return response
 
    */
 
   public function socialLogin($social)
 
   {
 
       return \Socialite::driver($social)->redirect();
 
   }

   public function login(Request $request)
   {
      $this->validateLogin($request);
     if ($this->attemptLogin($request)) {
        $user = $this->guard()->user();
        $user->generateToken();
        
        if($request->wantsJson()) {
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }
      }
       return $this->sendFailedLoginResponse($request);
    }


    
    public function logout(Request $request)
    {
        if($request->wantsJson()) {
        $user = \Auth::guard('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }
        return response()->json(['data' => 'User logged out.'], 200);
       } else {
         $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
       }
    }



 
   /**
 
    * Obtain the user information from Social Logged in.
 
    * @param $social
 
    * @return Response
 
    */
 
   public function handleProviderCallback($social)
 
   {
 
       $userSocial = \Socialite::driver($social)->user();
 
       $user = \App\User::where(['email' => $userSocial->getEmail()])->first();
 
       if($user){
 
           \Auth::login($user);
 
           return redirect()->action('HomeController@index');
 
       }else{
 
           return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
 
       }
 
   }

}
