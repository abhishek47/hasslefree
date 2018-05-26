
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
    <title>Droghers | Luggage Transfer and Storage Service in India</title>
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