
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
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
        
        
        <div class="page-wrapper">
           
            <div class="container-fluid">
                    <div class="container">
    <div class="row">
     
        <div style="width: 800px;margin: 0 auto;">
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-16">
                      <hr>
                      <h5 class="text-center m-b-20 font-bold">GST INVOICE</h5>
                      <hr>
                      <div class="pull-right text-right">
                        <h5 class="panel-heading">
                         <span class="font-bold">HASSLEFREE LUGGAGE PRIVATE LIMITED</span>
                          </h5>
                          <p class="m-b-0">F4/16, KRISHNA NAGAR<br>NEW DELHI-110051<br><b>GSTIN No. : </b>  07AAECH3866L1Z6</p>
                         </div>

                           <div class="pull-left">
                             <h5 class="panel-heading">
                           <span class="font-bold">INVOICE #{{ $booking->id }}</span>
                            </h5>
                            <p class="m-b-0">To {{ $booking->user->name }}<br><b>Date : </b>  {{ $booking->created_at->format('d-m-Y') }}</p>
                          </div>

                      <div class="clearfix"></div>
                     <hr>

                   
                     <div>
                       
                           <p ><b>Pick Up Time :</b> {{ $booking->pick_up_date }}, {{ getTime($booking->pick_up_time) }}</p>
                            
                             <p ><b>Pick Up Address :</b> 
                             
                               @if($booking->pick_up_type == 0)
                                {{ $booking->pickupAirport->name }}
                                <br><b>Flight Number :</b> {{ $booking->pick_up_flight_number }} 
                               @elseif($booking->pick_up_type == 1)


                               {{ $booking->pickupTrain->name }}
                              <br><b>Train PNR No. :</b> {{ $booking->pick_up_train_pnr }}

                            @elseif($booking->pick_up_type == 2)
      
                              {{ $booking->pickupBus->name }}

                            @else

                             {{ $booking->pick_up_from }}</p> 
                              @if(isset($booking->pick_up_address))
                              <br><b>Address : </b> {{ $booking->pick_up_address }}
                              @endif

                            @endif
                            </p>
                             
                           
                             <p ><b>Drop Time :</b>
                             {{ $booking->drop_date }}, {{ getTime($booking->drop_time) }}</p>
                           
                             <p ><b>Drop Address :</b> 
                             
                              @if($booking->drop_to_type == 0)

                                
                                {{ $booking->dropAirport->name }}
                                <br><b>Flight Number :</b> {{ $booking->drop_flight_number }}

                              @elseif($booking->drop_to_type == 1)

                                
                                {{ $booking->dropTrain->name }}
                                <br><b>Train PNR No. :</b> {{ $booking->drop_train_pnr }}

                              @elseif($booking->drop_to_type == 2)

                               
                                <b>Drop to :</b> {{ $booking->dropBus->name }}

                              @elseif($booking->drop_to_type > 2)

                                {{ $booking->drop_to }} 
                                @if(isset($booking->drop_address))
                                <br><b>Address : </b> {{ $booking->drop_address }}
                                @endif

                              @endif
                             </p>
                     </div>

                     <hr>
                     @if($booking->special != null)

                        <p><b>Special Comments : </b> {{ $booking->special }}</p>

                    @endif


                     <div class="table-responsive">
                       <table class="table table-striped table-bordered">
                         <tbody>
                           <tr>
                             <td class="font-medium">No. of Bags</td>
                             <td class="text-right">{{ $booking->bags_count }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Distance </td>
                             <td class="text-right">{{ $distance }} Km.</td>
                           </tr>

                          

                           <tr>
                             <td class="font-medium">Base Price</td>
                             <td class="text-right">Rs. {{ ($distance * 10) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Insurance</td>
                             <td class="text-right">Rs. {{ ($booking->bags_count * 12) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Handling Charges</td>
                             <td class="text-right">Rs. {{ ($booking->bags_count * 10) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Security Labelling</td>
                             <td class="text-right">
                              Rs. {{ ($booking->bags_count * 7) }}
                             </td>
                           </tr>

                            <tr>
                             <td class="font-medium">Taxable Amount</td>
                             <td class="text-right font-bold">Rs. {{ $basePrice  }}</td>
                           </tr>

                           <tr>
                             <td class="font-medium">CGST 9%</td>
                             <td class="text-right">Rs. {{ round($cgst, 2)  }}</td>
                           </tr>

                           <tr>
                             <td class="font-medium">SGST 9%</td>
                             <td class="text-right">Rs. {{ round($sgst, 2)  }}</td>
                           </tr>

                         </tbody>
                       </table>
                     </div>
                   

                    <hr>

                    <h3 class="pull-right"><b>Total : <span class="text-dark">Rs. {{ round($booking->total, 2) }}</span></b></h3>

                    <div class="clearfix"></div>
                     <hr>

                     <div id="qrcode"></div>

                    

                </div>
            </div>
        </div>

        
    </div>
</div>
            </div>    
            
        </div>
        
    </div>
   
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>

    <script src="/js/qrcode.min.js"></script>

    <script type="text/javascript">
      var qrcode = new QRCode("qrcode", {
          text: {{ $booking->id }},
          width: 128,
          height: 128,
          colorDark : "#000000",
          colorLight : "#ffffff",
          correctLevel : QRCode.CorrectLevel.H
      });
    </script>
    
   

</body>

</html>


