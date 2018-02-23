
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <title>Hassle Free Luggage | Luggage Transfer and Storage Service in India</title>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- This is for the animation CSS -->
    <link href="/css/aos.css" rel="stylesheet">
    <link href="/css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
    <link href="/css/magnific-popup.css" rel="stylesheet">

<link href="/css/datedropper.min.css" rel="stylesheet" type="text/css" />

    <!-- This css we made it from our predefine componenet 
    we just copy that css and paste here you can also do that -->
    <link href="/css/demo.css" rel="stylesheet">
    <!-- Common style CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/yourstyle.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/image/favicon.png" type="image/x-icon">

    @auth
        <style type="text/css">
            @media (min-width: 1024px)
            {
            .page-wrapper {
            padding-top: 55px;
            }
            }
        </style>
    @endauth


    @yield('css')
</head>

<body class="">
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="topbar">
            <!-- ============================================================== -->
            <!-- Header 14  -->
            <!-- ============================================================== -->
            <div class="header14 po-relative">
                <!-- Topbar  -->
                @guest
                <div class="h14-topbar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg font-14">
                            <a class="navbar-brand hidden-lg-up" href="#">Top Menu</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header14a" aria-controls="header14a" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-chevron"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="header14a">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link">We let you enjoy your trip luggage free!</a></li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- Infobar  -->
                <div class="h14-infobar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-info-bar">
                            <a class="navbar-brand"><img style="width:250px;" src="/images/logo.png" alt="wrapkit"/></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h14-info" aria-controls="h14-info" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-chevron-down"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="h14-info">
                                <ul class="navbar-nav ml-auto text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <div class="display-6 m-r-10"><i class="icon-Mail"></i></div>
                                            <div><small>Email us at</small>
                                                <h6 class="font-bold font-14">info@hasslefreeluggage.in</h6></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
                                            <div><small>CALL US NOW</small>
                                                <h6 class="font-bold">703 (123) 4567</h6></div>
                                        </a>
                                    </li>
                                    <li class="nav-item donate-btn"><a href="/home" class="btn btn-danger-gradiant">Book Now</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                @endguest
                <!-- Navbar  -->
                <div class="h14-navbar no-print">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-nav">
                            
                            <a class="hidden-lg-up" style="font-weight: bold !important;" href="/"><img src="/images/logo-small.png" style="width: 20px;display: inline;margin-top: -10px;">  <span>HassleFree</span></a>
                            <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#header14" aria-controls="header14" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-bars"></span>
                            </button>
                            <div class="collapse navbar-collapse collapse show" id="header14">
                                <div class="hover-dropdown">
                                    <ul class="navbar-nav">

                                    @guest
                                        
                                        <li class="nav-item {{ request()->is('home') ? 'active' : '' }}"> 
                                            <a class="nav-link" href="/"> Home</a>
                                        </li>

                                        <li class="nav-item"> 
                                            <a class="nav-link" href="#features"> Features</a>
                                        </li>

                                        <li class="nav-item"> 
                                            <a class="nav-link" href="#process"> Process</a>
                                        </li>

                                        <li class="nav-item"> 
                                            <a class="nav-link" href="#about"> About</a>
                                        </li>

                                        <li class="nav-item {{ request()->is('faq') ? 'active' : '' }}"> 
                                            <a class="nav-link"  href="/faq"> FAQ</a>
                                        </li>

                                        <li class="nav-item"> 
                                            <a class="nav-link" href="/home"> My Account</a>
                                        </li>

                                     @else
                                        
                                         <li class="nav-item {{ request()->is('home') ? 'active' : '' }} hidden-sm-down"> 
                                           <a class="nav-link" style="font-weight: bold !important;" href="/"><img src="/images/logo-small.png" style="width: 20px;display: inline;margin-top: -10px;">  <span>HassleFree</span></a>
                                        </li>

                                         <li class="nav-item {{ request()->is('bookings') ? 'active' : '' }}"> 
                                            <a class="nav-link" href="/bookings"> My Bookings</a>
                                        </li>

                                         

                                     @endif   
                                      
                                    </ul>
                                </div>
                                <ul class="navbar-nav ml-auto">

                                  @auth

                                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ auth()->user()->name }} <i class="fa fa-angle-down m-l-5"></i>
                                </a>
                                    <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                                        
                                        <li><a class="dropdown-item" href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                                        <li><a class="dropdown-item" href="/settings"><i class="fa fa-cog"></i> Settings</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                                    </ul>
                                </li>
                                   
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
                                      @endauth  

                                   
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Header 14  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper {{ auth()->check() ? 'bg-light' : ''}}">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                    <div class="container">
                     @include('flash::message')
                    </div> 
              
                @yield('content')
            </div>    
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer 3  -->
            <!-- ============================================================== -->
            @guest
            <div class="footer3 bg-dark font-14">
              
                <div class="f3-topbar container">
                    <div class="d-flex">
                        <div class="d-flex no-block align-items-center">
                            <span>A team of trained &amp; experienced <span class="text-white">profesionals</span>, who are
                            <br/>well versed with the customer requirement in the Indian market.</span>
                        </div>
                        <div class="ml-auto no-shrink align-self-center">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-dark form-control-lg" placeholder="Sign up for updates">
                                    <span class="input-group-btn">
                                      <button class="btn btn-info-gradiant btn-md" type="button">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="f3-middle container">
                    <!-- Row  -->
                    <div class="row">
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">SERVICES</h6>
                            <ul class="general-listing">
                                <li><a href="#"><i class="fa fa-arrow-right"></i> Airport Transport</a></li>
                                <li><a href="#"><i class="fa fa-arrow-right"></i> Station Transport</a></li>
                                <li><a href="#"><i class="fa fa-arrow-right"></i> Luggage Storage</a></li>
                                <li><a href="#"><i class="fa fa-arrow-right"></i> Doorstep Transport</a></li>
                            </ul>
                        </div>
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                       
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                        
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">CONTACT</h6>
                            <div class="d-flex no-block m-b-10 m-t-20">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                                <div class="info">
                                    <p> New Dehli, Maharashtra,
                                        <br/> India</p>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-10">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                                <div class="info">
                                    <span class=" db  m-t-5">(+91) 9582873902</span>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-30">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                                <div class="info">
                                    <a href="#" class="link db  m-t-5">info@hasslefreeluggage.in</a>
                                </div>
                            </div>
                        </div>
                        <!-- cOLUMN -->
                    </div>
                    <!-- Row  -->
                </div>

               
                <div class="f3-bottom-bar">
                    <div class="container">
                        <div class="d-flex">
                            <span class="m-t-10 m-b-10">Copyright {{date('Y')}}. All Rights Reserved.Powered by <a href="http://solicitousbusiness.com">Solicitous</a>.</span>
                            <div class="ml-auto m-t-10 m-b-10">
                                <a href="#" class="link"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="link"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="link"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="link"><i class="fa fa-pinterest"></i></a>
                                <a href="#" class="link"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @endguest
            <!-- ============================================================== -->
            <!-- End footer 3  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Back to top -->
            <!-- ============================================================== -->
            <a class="bt-top btn btn-circle btn-lg btn-info no-print" href="#top"><i class="fa fa-arrow-up"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
<script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- This is for the animation -->
    <script src="/js/aos.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>

     <script src="/js/parsley.min.js"></script>

      <script src="/js/datedropper.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="/js/jquery.touchSwipe.min.js"></script>
    <script src="/js/bootstrap-touch-slider.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script>
    $('#slider2').bsTouchSlider();
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>by Jon Doe</small>';
            }
        }
    });
    </script>

     <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    @yield('js')
</body>

</html>