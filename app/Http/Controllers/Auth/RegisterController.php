<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
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

          if(\Auth::loginUsingId($user->id)) {

                  $user->generateToken();

                  return response()->json([
                        'status' => 'success',
                        'message' => 'User Logged in successfully!',
                        'data' => $user->toArray()
                    ]);

          } 

    }


     /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if($request->wantsJson()) {
            $user->generateToken();
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully!',
                'data' => $user->toArray()], 201);
        } else {
            return false;
        }
    }


}
