@extends('layouts.master')

@section('content')
<div class="mini-spacer bg-light" style="min-height: 1000px;">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-18">
                     <h3 class="panel-heading">Booking Details</h3>
                     <hr>
                    <p><b>No. of Bags :</b> {{ $booking->bags_count }}</p>

                    @if($booking->special != null)

                        <p><b>Special Comments : </b> {{ $booking->special }}</p>

                    @endif

                    <p><b>Pick up at :</b> {{ $booking->pick_up_date }}, <b>Time : </b> {{ $booking->pick_up_time }}</p>

                    @if($booking->pick_up_type == 0)

                      <p><b>Pick up from :</b> {{ $booking->pick_up_airport_name }}
                      <br><b>Terminal :</b> {{ $booking->pick_up_airport_terminal }}
                      <br><b>Flight Number :</b> {{ $booking->pick_up_flight_number }} </p>

                    @elseif($booking->pick_up_type == 1)

                      <p><b>Pick up from :</b> {{ $booking->pick_up_train_station }}
                      <br><b>Terminal :</b> {{ $booking->pick_up_train_no }}</p>

                    @elseif($booking->pick_up_type == 2)

                      <p><b>Pick up from :</b> {{ $booking->pick_up_bus_station }}
                      <br><b>Train No. :</b> {{ $booking->pick_up_train_no }}</p>

                    @else

                      <p><b>Pick up from :</b> {{ $booking->pick_up_from }}</p> 

                    @endif

                    <p><b>Drop on :</b> {{ $booking->drop_date }}, <b>Time : </b>{{ $booking->drop_time }}</p>

                     @if($booking->drop_to_type == 0)

                      <p><b>Drop to :</b> {{ $booking->drop_airport_name }}
                      <br><b>Terminal :</b> {{ $booking->drop_airport_terminal }}
                      <br><b>Flight Number :</b> {{ $booking->drop_flight_number }} </p>

                    @elseif($booking->drop_to_type == 1)

                      <p><b>Drop to :</b> {{ $booking->drop_train_station }}
                      <br><b>Terminal :</b> {{ $booking->drop_train_no }}</p>

                    @elseif($booking->drop_to_type == 2)

                      <p><b>Drop to :</b> {{ $booking->drop_bus_station }}
                      <br><b>Train No. :</b> {{ $booking->drop_train_no }}</p>

                    @else

                      <p><b>Drop to :</b> {{ $booking->drop_to }}</p> 

                    @endif

                    <p><b>Contact :</b> {{ $booking->phone }}</p> 

                    <hr>

                    <h2><b>&#8377 {{ $booking->price }}</b></h2>

                     <hr>

                     @if($booking->status == 0)

                  
                      <a href="/bookings/{{$booking->id}}/delete" class="btn btn-danger">Cancel Booking</a>
                       
                      <br class="hidden-md-up"> <br class="hidden-md-up">  


                      <a  href="/bookings/{{$booking->id}}/pay" class="btn btn-success hidden-md-up">Pay Online</a>

                      <a  href="/bookings/{{$booking->id}}/cod" class="btn btn-primary hidden-md-up">Pay on Delivery</a>

                      <a  href="/bookings/{{$booking->id}}/pay" class="btn btn-success pull-right hidden-md-down">Pay Online</a>

                       <a  href="/bookings/{{$booking->id}}/cod" class="btn btn-primary pull-right hidden-md-down">Pay on Delivery</a>
                   


                    @else

                      <a  href="/bookings/{{$booking->id}}/receipt" class="btn btn-success pull-right">Print Receipt</a>

                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-body">
                   <div class="streamline">
                      <div class="sl-item b-success">
                        @if($booking->status >= 0)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content">
                          <p class="font-bold">Booking Created</p>
                        </div>
                      </div>

                      <div class="sl-item {{ $booking->status >= 1 ? ' b-success' : '' }}">
                       @if($booking->status >= 1)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content">
                            <p class="font-bold">Pickup Scheduled</p>
                        </div>
                      </div>

                      <div class="sl-item {{ $booking->status >= 2 ? ' b-success' : '' }}">
                       @if($booking->status >= 2)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content ">
                            <p class="font-bold">Luggage Picked</p>
                        </div>
                      </div>

                      <div class="sl-item {{ $booking->status >= 3 ? ' b-success' : '' }}">
                       @if($booking->status >= 3)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content">
                            <p class="font-bold">In Warehouse</p>
                        </div>
                      </div>

                      <div class="sl-item {{ $booking->status >= 4 ? ' b-success' : '' }}">
                       @if($booking->status >= 4)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content">
                            <p class="font-bold">In Transit</p>
                        </div>
                      </div>

                      <div class="sl-item {{ $booking->status >= 5 ? ' b-success' : '' }}">
                       @if($booking->status >= 5)
                          <div class="sl-icon text-success"><i class="fa fa-check"></i></div>
                        @endif
                        <div class="sl-content">
                            <p class="font-bold">Luggage Delivered</p>
                        </div>
                      </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
