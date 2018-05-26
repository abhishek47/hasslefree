@extends('layouts.scanner')

@section('content')

<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 0px;padding: 0px;">

  
       
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-16">
                     <h4 class="panel-heading font-weight-bold">Booking Details</h4>
                     <hr>
                     
                     <h5 style="font-weight: bold;">{{ $booking->user->name }}</h5> 
                     <p style="font-size: 14px;"><a href="tel:{{$booking->phone}}">{{$booking->phone}}</a><br>Booking #{{$booking->id}}</p>
                    
                       @if($booking->status == 4)

                       <div style="background-color: #4ba508;padding: 4px;color: #fff;margin: -20px;
                          margin-top: 4px;margin-bottom: 20px;
                          text-align: center;
                      ">  

                        <b><i class="fa fa-check-circle"></i> Luggage Delivered</b>



                     </div>
                     

                     @else

                      
                     <div style="background-color: #0008ff;padding: 4px;color: #fff;margin: -20px;
                          margin-top: 4px;margin-bottom: 20px;
                          text-align: center;
                      ">  

                        <b>{{ $booking->bags_scanned }}</b> bags scanned out of <b>{{ $booking->bags_count }}</b>



                     </div>

                     @endif

                     <p><b>From :</b> {{ $booking->pick_up_address }}</p>

                     <p><b>To :</b> {{ $booking->drop_to }}</p>


                    @if($booking->coupon_applied != null || $booking->referral_code)
                      <h5 class="pull-right"><b>Total : <span class="text-dark">Rs. {{ round($booking->offer_amount, 2) }}</span></b></h5>
                    @else
                      <h5 class="pull-right"><b>Total : <span class="text-dark">Rs. {{ round($booking->total, 2) }}</span></b></h5>
                    @endif
                </div>
            </div>
      

        

</div>
</div>





@endsection


@section('js')

 

@endsection