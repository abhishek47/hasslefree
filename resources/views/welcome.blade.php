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
                                <!-- Slide Background --><img src="/images/slider/slide1.jpg" alt="We are Digital Agency" class="slide-image" />
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide_style_left">
                                    <div class="col-md-9 col-lg-6">
                                        <label class="label bg-white text-uppercase font-semibold" data-animation="animated fadeInDown">Welcome To</label>
                                        <h2 data-animation="animated zoomInRight" class="title text-white">Hassle Free Luggage Transport Service</h2>
                                    </div>
                                    <div class="col-md-8 col-lg-5">
                                        <p data-animation="animated fadeInLeft" class="m-t-40 m-b-40 hidden-sm-down text-white op-8">We offer Luggage Storage and Transfer services in India for Stations, Airports and others.</p>
                                    </div>
                                    <div class="col-sm-12 btn-pad">
                                        <a class="btn btn-info-gradiant btn-md btn-arrow" data-animation="animated fadeInLeft" data-toggle="collapse" href="#"> <span>Take My Luggage <i class="fa fa-arrow-right"></i></span> </a>
                                        <a class="btn text-white" data-animation="animated fadeInRight" data-toggle="modal" data-target="#video" href="#"><i class="icon-Play-Music text-white vm m-r-10"></i> Watch Video</a>
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
                        <h2 class="m-b-30 font-bold m-t-20">We are leading Luggage Storage and Transfer company</h2>
                        <h4 class="text-muted font-light">You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h4>
                        <div class="row">
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Time Saving</h5>
                                <p>You can relay on our amazing features list and also our customer services will.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Easy &amp; Flexible</h5>
                                <p>You can relay on our amazing features list and also our customer services will.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Insurance &amp; Tracking</h5>
                                <p>You can relay on our amazing features list and also our customer services will.</p>
                            </div>
                            <div class="col-md-6 m-t-30">
                                <h5 class="font-medium">Satisfaction Guaranteed</h5>
                                <p>You can relay on our amazing features list and also our customer services will.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row wrap-feature-12">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12"><img src="/images/slider/1.jpg" class="rounded img-shadow img-responsive" alt="wrapkit" /></div>
                                    <div class="col-md-12"><img src="/images/slider/2.jpg" class="rounded img-shadow img-responsive" alt="wrapkit" /></div>
                                </div>
                            </div>
                            <div class="col-md-6 uneven-box">
                                <div class="row">
                                    <div class="col-md-12"><img src="/images/slider/3.jpg" class="rounded img-shadow img-responsive" alt="wrapkit" /></div>
                                    <div class="col-md-12"><img src="/images/slider/4.jpg" class="rounded img-shadow img-responsive" alt="wrapkit" /></div>
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
                        <h6 class="subtitle">Our professional concierges welcome you at the airports and train stations to take care of your suitcases.</h6>
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
                                <p class="m-t-20">Book your luggage storage and transfer online, in less than 5 minutes.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 wrap-feature2-box">
                        <div class="card card-shadow" data-aos="flip-up" data-aos-duration="1200">
                            <img class="card-img-top" src="/images/features/6.jpg" alt="wrappixel kit" />
                            <div class="card-body text-center">
                                <h5 class="font-medium">We Collect &amp; Store</h5>
                                <p class="m-t-20">Luggage is sealed than transfered to a secured warehouse before delivery.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 wrap-feature2-box">
                        <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                            <img class="card-img-top" src="/images/features/7.jpg" alt="wrappixel kit" />
                            <div class="card-body text-center">
                                <h5 class="font-medium">You Get Your Luggage</h5>
                                <p class="m-t-20">Get your luggage back anywhere and anytime you want, stations and airports included.</p>
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
                        <h3 class="font-bold">HassleFree is an Exclusive Service in India</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                        <ul class="list-block m-b-30">
                            <li><i class="fa fa-check-circle-o text-info"></i> Easy and seamless booking process.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A secured and satisfiable trasfer and storage service.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A perpeptual customer service.</li>
                            <li><i class="fa fa-check-circle-o text-info"></i> A rated and trusted team.</li>
                        </ul>
                        <a class="btn btn-info-gradiant btn-md btn-arrow" href="#"><span>Know About Us <i class="fa fa-arrow-right"></i></span></a>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="p-20">
                            <img src="/images/features/8.jpg" alt="wrapkit" class="img-responsive img-shadow" data-aos="flip-right" data-aos-duration="1200" />
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
        <div class="mini-spacer bg-yellow text-white">
            <div class="container">
                <div class="d-flex">
                    <div class="display-7 align-self-center">
                        <h3 class="">We are leading Luggage Storage and Transfer company</h3>
                        <h6 class="font-16">You will feel great using our quality products and services</h6>
                    </div>
                    <div class="ml-auto m-t-10 m-b-10">
                        <button class="btn btn-info-gradiant btn-md">Contact Us</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- call to action -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Testimonial 6 -->
        <!-- ============================================================== -->
        <div class="testimonial6 spacer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3" data-aos="fade-right">
                        <div class="nav flex-column nav-pills testi6" id="v-pills-tab" role="tablist">
                            <a class="nav-link" data-toggle="pill" href="#t6-1" role="tab" aria-controls="t6-1" aria-expanded="true">
                                  <img src="/images/test/1.jpg" alt="wrapkit" class="circle" />
                              </a>
                            <a class="nav-link" data-toggle="pill" href="#t6-2" role="tab" aria-controls="t6-2" aria-expanded="true">
                                 <img src="/images/test/2.jpg" alt="wrapkit" class="circle" />      
                              </a>
                            <a class="nav-link active" data-toggle="pill" href="#t6-3" role="tab" aria-controls="t6-3" aria-expanded="true">
                                 <img src="/images/test/3.jpg" alt="wrapkit" class="circle" />      
                              </a>
                            <a class="nav-link" data-toggle="pill" href="#t6-4" role="tab" aria-controls="t6-4" aria-expanded="true">
                                 <img src="/images/test/4.jpg" alt="wrapkit" class="circle" />  
                              </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 ml-auto align-self-center" data-aos="fade-up">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="t6-1" role="tabpanel">
                                <h2 class="font-bold">What our Customers says</h2>
                                <h6 class="subtitle m-t-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mode tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
                                <div class="d-flex m-t-40">
                                    <div>
                                        <h5 class="m-b-0 text-uppercase">Jon Doe</h5>
                                        <h6 class="subtitle">Miami</h6></div>
                                    <button class="btn btn-circle btn-info btn-md ml-auto"><i class="fa fa-quote-left"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t6-2" role="tabpanel">
                                <h2 class="font-bold">What our Customers says</h2>
                                <h6 class="subtitle m-t-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mode tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
                                <div class="d-flex m-t-40">
                                    <div>
                                        <h5 class="m-b-0 text-uppercase">Arina Gover</h5>
                                        <h6 class="subtitle">New York</h6></div>
                                    <button class="btn btn-circle btn-info btn-md ml-auto"><i class="fa fa-quote-left"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="t6-3" role="tabpanel">
                                <h2 class="font-bold">What our Customers says</h2>
                                <h6 class="subtitle m-t-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mode tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
                                <div class="d-flex m-t-40">
                                    <div>
                                        <h5 class="m-b-0 text-uppercase">Hanna Gover</h5>
                                        <h6 class="subtitle">Texas</h6></div>
                                    <button class="btn btn-circle btn-info btn-md ml-auto"><i class="fa fa-quote-left"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="t6-4" role="tabpanel">
                                <h2 class="font-bold">What our Customers says</h2>
                                <h6 class="subtitle m-t-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do mode tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h6>
                                <div class="d-flex m-t-40">
                                    <div>
                                        <h5 class="m-b-0 text-uppercase">Jane Martins</h5>
                                        <h6 class="subtitle">Palo Alto</h6></div>
                                    <button class="btn btn-circle btn-info btn-md ml-auto"><i class="fa fa-quote-left"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Testimonial 6 -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->

@endsection  