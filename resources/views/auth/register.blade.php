@extends('layouts.auth')



@section('content')

    <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-55">
                        Create Account
                    </span>

                    @include('partials.errors')

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
                         @if(!empty($name))
                            <input class="input100" type="text" name="name" placeholder="Full Name" value="{{ $name }}"> 
                         @else
                            <input class="input100" type="text" name="name" placeholder="Full Name" value="{{ old('name') }}"> 
                         @endif   
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="fa fa-envelope"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                        
                        @if(!empty($name))
                         <input class="input100" type="text" name="email" placeholder="Email" value="{{ $email }}">
                        @else
                          <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        @endif

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="fa fa-envelope"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="fa fa-lock"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password confirmation is required">
                        <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="fa fa-check-circle"></span>
                        </span>
                    </div>

                   
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>

                    <div class="text-center w-full p-t-42 p-b-22">
                        <span class="txt1">
                            Or sign up with
                        </span>
                    </div>

                    <a href="{{ url('login/facebook') }}" class="btn-face m-b-10">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a>

                    <a href="{{ url('login/google') }}" class="btn-google m-b-10">
                        <img src="/auth/images/icons/icon-google.png" alt="GOOGLE">
                        Google
                    </a>

                    <div class="text-center w-full p-t-115">
                        <span class="txt1">
                            Already a member?
                        </span>

                        <a class="txt1 bo1 hov1" href="{{ route('login') }}">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>




@endsection


