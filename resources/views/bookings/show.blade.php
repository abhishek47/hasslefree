@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Booking Details</div>

                <div class="panel-body">
                   
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

                    <hr>

                    <h2><b>&#8377 {{ $booking->price }}</b></h2>

                     <hr>

                     @if($booking->status == 0)

                    <div class="pull-right">
                      <a href="/bookings/{{$booking->id}}/delete" class="btn btn-danger">Cancel Booking</a>
                
                      <a href="/bookings/{{$booking->id}}/pay" class="btn btn-success">Pay &amp; Confirm Booking</a>
                    </div>


                    @else

                      {!! getStatus($booking->status) !!}

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
