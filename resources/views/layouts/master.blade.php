
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-desc', 'Let Droghers be your valet to your hotel, airport or railway station | we deliver bags to and from, so you dont have to | Droghers provides you door to door luggage transfer service in Delhi NCR | Send your bag to droghers and we will deliver it to your destination | luggage transport near me.')">
    <meta name="author" content="HassleFree">

    <meta name="google-site-verification" content="qq55UBRGOwfkI9xMqGpV_D70LiGtlS2GM4N-amkXNiI" />

    <meta name="msvalidate.01" content="B842E0088C384B8C0BF7287B5D54ABCF" />

    <link rel="canonical" href="https://droghers.in/" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <title>@yield('title', 'Left Luggage - Luggage Transport Services in Delhi NCR | Droghers')</title>
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121213789-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121213789-1');
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2089814694611343');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"

src="https://www.facebook.com/tr?id=2089814694611343&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

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
                                    <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Droghers-244123833010176"><i class="fa fa-facebook"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/droghers7/"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>


                <!-- Navbar  -->
                <div class="h14-navbar no-print">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-nav">

                            <a class="hidden-lg-up" style="font-weight: bold !important;" href="/"><img src="/images/logo-main.png" style="width: 20px;display: inline;margin-top: -10px;">  <span>Droghers</span></a>
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
                                            <a class="nav-link" href="/#features"> Features</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/#process"> Process</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/#about"> About</a>
                                        </li>

                                        <li class="nav-item {{ request()->is('faq') ? 'active' : '' }}">
                                            <a class="nav-link"  href="/faq"> FAQ</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/contact"> Contact Us</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/mobile-apps"> Download App</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/home"> My Account</a>
                                        </li>

                                     @else

                                        <li class="nav-item {{ request()->is('home') ? 'active' : '' }} hidden-sm-down">
                                           <a class="nav-link" style="font-weight: bold !important;" href="/"><img src="/images/logo-main.png" style="width: 20px;display: inline;margin-top: -10px;">  <span>Droghers</span></a>
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

                @guest
                 <!-- Infobar  -->
                <div class="h14-infobar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-info-bar">
                            <a class="navbar-brand"><img style="width:230px;" src="/images/logo.png" alt="wrapkit"/></a>
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
                                                <h6 class="font-bold">(+91) 7291047153</h6></div>
                                        </a>
                                    </li>
                                    <li class="nav-item donate-btn"><a href="/home" class="btn btn-danger-gradiant">Book Now</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                @endguest
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

                    </div>

                @yield('content')
            </div>
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer 3  -->
            <!-- ============================================================== -->

            <div class="footer3 bg-dark font-14">

                <div class="f3-topbar container">
                    <div class="d-flex">
                        <div class="d-flex no-block align-items-center">
                            <span>A team of trained &amp; experienced <span class="text-white">professionals</span>, who are
                            <br/>well versed with the customer requirement in the Indian market.</span>
                        </div>

                    </div>
                </div>
                <div class="f3-middle container">
                    <!-- Row  -->
                    <div class="row">
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">Helpful Links</h6>
                            <ul class="general-listing">
                                <li><a href="/faq"><i class="fa fa-arrow-right"></i> FAQ</a></li>
                                <li><a href="/terms.pdf" target="_blank"><i class="fa fa-arrow-right"></i> Terms &amp; Conditions</a></li>
                                 <li><a href="/privacy.pdf" target="_blank"><i class="fa fa-arrow-right"></i> Privacy Policy</a></li>
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
                                    <p> New Delhi, India</p>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-10">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                                <div class="info">
                                    <span class=" db  m-t-5"><a href="tel:7291047153">(+91) 7291047153</a></span>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-30">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                                <div class="info">
                                    <a href="mailto:info@hasslefreeluggage.in" class="link db  m-t-5">info@hasslefreeluggage.in</a>
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
                            <span class="m-t-10 m-b-10">Copyright {{date('Y')}}. HassleFree Luggage Pvt. Ltd.</span>
                            <div class="ml-auto m-t-10 m-b-10">
                                <a href="https://www.facebook.com/Droghers-244123833010176" class="link"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/droghers7/" class="link"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        @foreach (session('flash_notification', collect())->toArray() as $message)

             var message = "{!! $message['message'] !!}"
             var level = "{!! $message['level'] !!}"

             swal("Notice", message, level);

        @endforeach
    </script>

    {{ session()->forget('flash_notification') }}

    <!-- <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script> -->

    @yield('js')
</body>

</html>