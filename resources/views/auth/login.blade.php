@extends('layouts.auth')

@section('css')

    <link rel="canonical" href="https://droghers.in/login" />

@endsection

@section('title', 'Log In To Your Droghers Account')


@section('meta-desc', 'Welcome to Your Droghers Account. Sign in to your Droghers account for faster luggage transfer.')



@section('content')

    <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <span class="login100-form-title p-b-55">
                       <img style="width:250px;" src="/images/logo.png" alt="wrapkit"/>
                    </span>

                    @include('partials.errors')

                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
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

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="contact100-form-checkbox m-l-4">
                        <a class="txt1 bo1 hov1" href="{{ route('password.request') }}">
                            forgot password?
                        </a>
                    </div>
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-42 p-b-22">
                        <span class="txt1">
                            Or login with
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
                            Not a member?
                        </span>

                        <a class="txt1 bo1 hov1" href="{{ route('register') }}">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>




@endsection


