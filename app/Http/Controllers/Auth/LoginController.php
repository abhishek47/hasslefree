<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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

    if($request->wantsJson()) {
      if(request('email') == '')
      {
        return response()->json([
                'status' => 'failed',
                'message' => 'Please enter email address!'
                
            ]);
      } else if(request('password') == ''){
         return response()->json([
                'status' => 'failed',
                'message' => 'Please enter password!'
                
            ]);
      }
    } else {
      $this->validateLogin($request);
    }

      

     if ($this->attemptLogin($request)) {
        $user = $this->guard()->user();
        $user->generateToken();
        
        if($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User Logged in successfully!',
                'data' => $user->toArray()
            ]);
        }
      }

      if($request->wantsJson()) {
            return response()->json([
                 'status' => 'failed',
                'message' => 'User login failed! Please try again!'
                
            ]);
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
        return response()->json(['status' => 'success',
                'message' => 'User logged out'], 200);
       } else {
         $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
       }
    }


    public function direct(Request $request)
    {
        
        if(request('email') == '')
        {
          return response()->json([
                  'status' => 'failed',
                  'message' => 'Please enter email address!'
                  
              ]);
        }

      $user = User::where('email', request('email'))->first();

      if (empty($user)) {
          return response()->json([
                  'status' => 'failed',
                  'message' => 'Account doesn\'t Exist!'
                  
              ]);
      }

      if(\Auth::loginUsingId($user->id)){
          $user->generateToken();
          return response()->json([
                'status' => 'success',
                'message' => 'User Logged in successfully!',
                'data' => $user->toArray()
            ]);
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
