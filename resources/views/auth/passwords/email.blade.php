
@extends('layouts.master')

@section('content')

<div class="bg-light form4" id="register" style="margin-top: 0px;min-height: 1000px;padding-top: 40px;">
                <div class="container">
                    <div class="row">
                        <!-- Column -->
                        
                        <div class="col-lg-5 m-auto">
                            <div class="text-box">
                                 <div class="">
                                         @if (session('status'))
                                           <div class="alert alert-info">
                                                <span style="margin-bottom: 0;padding-bottom: 0;">{{ session('status') }}</span>
                                            </div>
                                        
                                        @endif
                                        </div>
                               <div class="card card-shadow">
                                <div class="card-body">
                                <form data-aos="fade-in" data-aos-duration="1200" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                     <div class="col-lg-12 m-l-10 m-b-20">
                                        <p class="font-bold m-b-10">Forgot Your Password?</p> 
                                        <p class="font-light">Worry not, tell us your email address, we'll send you the instructions to reset your Onyomark password.</p>
                                     </div>
                                    {{ csrf_field() }}
                                   
                                        <div class="col-lg-12">
                                            <div class="form-group {{$errors->has('email') ? 'has-danger' : '' }}">
                                                <input class="form-control {{$errors->has('email') ? 'form-control-danger' : '' }}" type="email" value="{{ old('email') }}" name="email" required placeholder="email address">
                                                @if ($errors->has('email'))
                                                    <div class="form-control-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 d-flex">
                                            <button type="submit" class="btn btn-md btn-block btn-danger-gradiant btn-arrow"><span> Send Password Reset Link <i class="fa fa-arrow-right"></i></span></button>
                                        </div>
                                        
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
@endsection

