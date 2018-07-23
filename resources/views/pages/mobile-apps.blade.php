@extends('layouts.master')

@section('css')

    <link rel="canonical" href="https://droghers.in/mobile-apps" />

@endsection


@section('title', 'Mobile Apps - Droghers')


@section('meta-desc', 'Download android and IOS application for Droghers')


@section('content')

    <div class="spacer bg-light">
        <div class="container">
            <div class="bg-danger-gradiant" style="height: 500px;padding: 30px;">
                <div class="row">
                    <div class="col-md-6" >
                         <h2 class="text-white mt-4">HassleFree Luggage Transport Service at your finger tips.</h2>

                         <h4 class="text-white mt-5">Download the app on your mobile now.</h4>

                         <div class="mt-5">
                             <a target="_blank"  href="https://itunes.apple.com/in/app/droghers/id1367958597?mt=8"><img style="display: inline;width: 200px;" src="/images/appstore.png"></a>
                             <a target="_blank" href="https://play.google.com/store/apps/details?id=com.hasslefreeluggage.droghers"><img style="display: inline;width: 200px;"  src="/images/playstore.png"></a>
                         </div>
                    </div>

                    <div class="col-md-6" >
                         <img style="width: 223px;
    position: absolute;
    right: 300px;
    left: 80px;" src="/images/app2.png">
                        <img style="width: 226px;
    position: absolute;
    right: 141px;
    left: 211px;" src="/images/app1.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection