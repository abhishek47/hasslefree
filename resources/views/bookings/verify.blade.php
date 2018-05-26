@extends('layouts.scanner')

@section('content')

<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 0px;padding: 0px;">

  
       
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-16">
                     <h4 class="panel-heading font-weight-bold">Booking Details</h4>
                     <hr>
                     
                     <h5 style="font-weight: bold;">{{ $booking->user->name }}</h5> 
                     <p style="font-size: 14px;"><a href="tel:{{$booking->phone}}">{{$booking->phone}}</a><br>Booking #{{$booking->id}}</p>
                      
                      <form action="/bookings/manage/{{$booking->id}}/verify" method="POST">  
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                          <label>Verification OTP</label>
                          <input type="number" name="otp" class="form-control">
                        </div>

                        <div>
                          <button class="btn btn-primary">Verify &amp; Confirm Delivery</button>
                        </div>
                      </form>

                       


                   
                </div>
            </div>
      

        

</div>
</div>





@endsection


@section('js')

 

@endsection