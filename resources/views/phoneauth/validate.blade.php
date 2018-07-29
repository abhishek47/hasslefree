@extends('layouts.auth')

@section('css')

    <link rel="canonical" href="https://droghers.in/start" />

@endsection

@section('title', 'Log In To Your Droghers Account')


@section('meta-desc', 'Welcome to Your Droghers Account. Sign in to your Droghers account for faster luggage transfer.')



@section('content')

    <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ url('user/auth') }}">
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

                    <div class="wrap-input100 m-b-16" >
                        <input class="input100" type="text" name="token" placeholder="Enter OTP">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="fa fa-lock"></span>
                        </span>
                    </div>




                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            Verify & Login
                        </button>
                    </div>


                </form>
            </div>




@endsection


