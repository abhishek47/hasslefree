@extends('layouts.master')



@section('content')


                <!-- ============================================================== -->
                <!-- Slider  -->
                <!-- ============================================================== -->
                <div class="bg-light">
                <section id="slider-sec" class="slider2">
                    <div id="slider2" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="7000">
                        <ol class="carousel-indicators hide">
                            <li data-target="#slider2" data-slide-to="0" class="active"></li>
                        </ol>
                        <!-- Wrapper For Slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- Slide Background --><img src="/images/slider/b1.jpg"  alt="We are Digital Agency" class="slide-image" />
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide_style_left">
                                    <div class="col-md-9 col-lg-6">
                                        <label class="label bg-white text-uppercase font-semibold" data-animation="animated fadeInDown">Welcome To</label>
                                        <h1 data-animation="animated zoomInRight" class="title text-white">Droghers Luggage Transport Service</h1pmas>
                                    </div>
                                    <div class="col-md-8 col-lg-5">
                                        <p data-animation="animated fadeInLeft" class="m-t-40 m-b-40 hidden-sm-down text-white">We offer Luggage Transfer services from Railway Stations, Airports as well as door to door service <b>in Delhi and NCR Region</b></p>
                                    </div>
                                    <div class="col-sm-12 btn-pad">
                                        <a class="btn btn-danger-gradiant btn-md btn-arrow" data-animation="animated fadeInLeft" href="/register"> <span>Take My Luggage <i class="fa fa-arrow-right"></i></span> </a>

                                    </div>
                                </div>
                            </div>
                            <!-- End of Slide -->



                        </div>
                    </div>
                    <!-- End Slider -->
                    <!-- Slider Modal -->
                    <div class="modal bd-example-modal-lg fade" id="video" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Your Video Title Here</h5>
                                    <button type="button" class="close font-20" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="ti-close"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <video width="100" controls>
                                        <source src="/images/slider/welding.mp4" type="video/mp4"> Your browser does not support HTML5 video.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slider Modal -->
                </section>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Feature 12  -->
        <!-- ============================================================== -->
        <div class="spacer feature12" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="m-b-30 font-bold m-t-20">We are leading Luggage Transfer company</h2>
                        <h4 class="text-muted font-light">You can rely on our amazing features list and also our customer service will be great experience for you without doubt and in no-time</h4>
                        <div class="row">
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Smart Time Management</h5>
                                <p>Avoid the hassles of carrying your heavy luggages with you.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Easy &amp; Flexible</h5>
                                <p>Droghers is a easy online booking service with lots of flexibility.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Real-time Tracking</h5>
                                <p>Easily track your luggage status with our seamless online service.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Damage Free &amp; Safe</h5>
                                <p>Your luggage be safe with us and we even insure you about your luggage.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row wrap-feature-12">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12"><img src="/images/features/time.jpg" class="rounded img-shadow img-responsive" alt="time managing" /></div>
                                    <div class="col-md-12"><img src="/images/features/easy.jpg" class="rounded img-shadow img-responsive" alt="easy" /></div>
                                </div>
                            </div>
                            <div class="col-md-6 uneven-box">
                                <div class="row">
                                    <div class="col-md-12"><img src="/images/features/track.jpg" class="rounded img-shadow img-responsive" alt="Real-time Tracking" /></div>
                                    <div class="col-md-12"><img src="/images/features/safe.jpg" class="rounded img-shadow img-responsive" alt="safe" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Feature 12  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Feature 2  -->
        <!-- ============================================================== -->
        <div class="spacer feature2 bg-light" id="process">
            <div class="container">
                <!-- Row  -->
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="title font-bold">How it works</h2>
                        <h6 class="subtitle">A simple and flawless luggage travel solution from HassleFree Luggage Pvt. Ltd.</h6>
                    </div>
                </div>
                <!-- Row  -->
                <div class="row m-t-40">
                    <!-- Column -->
                    <div class="col-md-4 wrap-feature2-box">
                        <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                            <img class="card-img-top" src="/images/features/5.jpg" alt="wrappixel kit" />
                            <div class="card-body text-center">
                                <h5 class="font-medium">You Make a Booking</h5>
                                <p class="m-t-20">Book your luggage transfer online, in less than 5 minutes with our easy service.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 wrap-feature2-box">
                        <div class="card card-shadow" data-aos="flip-up" data-aos-duration="1200">
                            <img class="card-img-top" src="/images/features/6.jpg" alt="wrappixel kit" />
                            <div class="card-body text-center">
                                <h5 class="font-medium">We Collect &amp; Store</h5>
                                <p class="m-t-20">Luggage is sealed and transfered to a secured warehouse before delivery.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 wrap-feature2-box">
                        <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                            <img class="card-img-top" src="/images/features/7.jpg" alt="wrappixel kit" />
                            <div class="card-body text-center">
                                <h5 class="font-medium">You Get Your Luggage</h5>
                                <p class="m-t-20">Get your luggage back anywhere and anytime you want, stations and airports included with door to door.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Feature 2  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Feature 8  -->
        <!-- ============================================================== -->
        <div class="spacer feature8" id="about">
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6">
                        <small class="text-info">Exclusive Service</small>
                        <h3 class="font-bold">Droghers is an Exclusive Service in New Delhi &amp; NCR Region</h3>
                        <p>A team of trained &amp; experienced profesionals, who are well versed with the customer requirement in the Indian market</p>
                        <ul class="list-block m-b-30">
                            <li><i class="fa fa-check-circle-o text-info"></i> Easy and seamless booking process.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A secured and satisfiable trasfer service.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A perpeptual customer service.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A rated and trusted team.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> An Easy door to door service.</li>
                        </ul>
                       <!-- <a class="btn btn-danger-gradiant btn-md btn-arrow" href="#"><span>Know About Us <i class="fa fa-arrow-right"></i></span></a> -->
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="p-20">
                            <img src="/images/features/safe.jpg" alt="wrapkit" class="img-responsive img-shadow" data-aos="flip-right" data-aos-duration="1200" />
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Feature 8  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- call to action -->
        <!-- ============================================================== -->
        <div class="mini-spacer bg-primary-gradiant text-white" >
            <div class="container">
                <div class="d-flex">
                    <div class="display-7 align-self-center">
                        <h3 class="text-white">We are leading Luggage Transfer company</h3>
                        <h6 class="font-16 text-white">You will feel great using our quality products and services</h6>
                    </div>
                    <div class="ml-auto m-t-10 m-b-10">
                        <a href="/contact" class="btn btn-danger-gradiant btn-md">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- call to action -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->

@endsection