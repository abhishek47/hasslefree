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

                      <p><b>Airport</b></p>
                      <p><b>Pick up from :</b> {{ $booking->pickupAirport->name }}
                      <br><b>Terminal :</b> {{ $booking->pick_up_airport_terminal }}
                      <br><b>Flight Number :</b> {{ $booking->pick_up_flight_number }} </p>

                    @elseif($booking->pick_up_type == 1)


                      <p><b>Train Station</b></p>
                      <p><b>Pick up from :</b> {{ $booking->pickupTrain->name }}
                      <br><b>Train No. :</b> {{ $booking->pick_up_train }}</p>
                      <br><b>Coach No. :</b> {{ $booking->pick_up_train_coach }}</p>
                      <br><b>Seat No. :</b> {{ $booking->pick_up_train_seat }}</p>
                      <br><b>Train Time :</b> {{ $booking->pick_up_train_time }}</p>

                    @elseif($booking->pick_up_type == 2)

                      <p><b>Bus Station</b></p>
                      <p><b>Pick up from :</b> {{ $booking->pickupBus->name }}

                    @else

                      <p><b>Pick up from :</b> {{ $booking->pick_up_from }}</p> 
                      @if(isset($booking->pick_up_address))
                      <br><p><b>Address : </b> {{ $booking->pick_up_address }}</p>
                      @endif

                    @endif

                    <p><b>Drop on :</b> {{ $booking->drop_date }}, <b>Time : </b>{{ $booking->drop_time }}</p>

                     @if($booking->drop_to_type == 0)

                      <p><b>Airport</b></p>
                      <p><b>Drop to :</b> {{ $booking->dropAirport->name }}
                      <br><b>Terminal :</b> {{ $booking->drop_airport_terminal }}
                      <br><b>Flight Number :</b> {{ $booking->drop_flight_number }} </p>

                    @elseif($booking->drop_to_type == 1)

                       <p><b>Train Station</b></p>
                      <p><b>Drop to :</b> {{ $booking->dropTrain->name }}
                      <br><b>Train No. :</b> {{ $booking->drop_train_no }}</p>
                       <br><b>Coach No. :</b> {{ $booking->drop_train_coach }}</p>
                        <br><b>Seat No. :</b> {{ $booking->drop_train_seat }}</p>
                         <br><b>Train Time :</b> {{ $booking->drop_train_time }}</p>

                    @elseif($booking->drop_to_type == 2)

                      <p><b>Bus Station</b></p>
                      <p><b>Drop to :</b> {{ $booking->dropBus->name }}

                    @elseif($booking->drop_to_type > 2)

                      <p><b>Drop to :</b> {{ $booking->drop_to }}</p> 
                      @if(isset($booking->drop_address))
                      <br><p><b>Address : </b> {{ $booking->drop_address }}</p>
                      @endif

                    @endif

                    <p><b>Contact :</b> {{ $booking->phone }}</p> 

                    <hr>

                    <h2><b>&#8377 {{ round($booking->price, 2) }}</b></h2>

                     <hr>

                     @if($booking->status == -1)



                     @else

                       @if($booking->status == 0)

                    
                        <a href="/bookings/{{$booking->id}}/delete" class="btn btn-danger">Cancel Booking</a>
                         
                        <br class="hidden-md-up"> <br class="hidden-md-up">  


                        <a  href="/bookings/{{$booking->id}}/pay" class="btn btn-success hidden-md-up">Pay Online</a>

                        <a  href="/bookings/{{$booking->id}}/cod" class="btn btn-primary hidden-md-up">Pay on Delivery</a>

                        <a  href="/bookings/{{$booking->id}}/pay" class="btn btn-success pull-right hidden-md-down">Pay Online</a>

                         <a  href="/bookings/{{$booking->id}}/cod" class="btn btn-primary pull-right hidden-md-down m-r-10">Pay on Delivery</a>
                     


                      @else

                         <a  href="/bookings/{{$booking->id}}/cancel" class="btn btn-danger hidden-md-up">Pay Online</a>

                        <a  href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary hidden-md-up">Print Receipt</a>

                        <a  href="/bookings/{{$booking->id}}/cancel" class="btn btn-danger pull-right hidden-md-down">Cancel Booking</a>

                         <a  href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary pull-right hidden-md-down m-r-10">Print Receipt</a>

                       

                      @endif

                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-body">
                  @if($booking->status > -1)
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

                  @else
                    <h4 class="font-bold m-b-20"><i class="fa fa-check text-success"></i> Booking Cancelled</h4>

                    @if($booking->refund()->exists())


                      <h6 class="font-bold m-b-10">Refund Details</h6>

                      <p><span class="font-bold">Account Name : </span> {{ $booking->refund->account_name }}</p>

                       <p><span class="font-bold">Account No. : </span> {{ $booking->refund->account_no }}</p>

                        <p><span class="font-bold">Account Type : </span> {{ $booking->refund->account_type }}</p>

                         <p><span class="font-bold">Bank Name : </span> {{ $booking->refund->bank_name }}</p>
                          <p><span class="font-bold">Bank IFSC : </span> {{ $booking->refund->bank_ifsc }}</p>

                          <p class="text-primary"><span class="font-bold">Refund Status : </span> {{ $booking->refund->status == 0 ? 'Pending' : 'Amount Credited' }}</p>




                    @else
                    <form method="post" action="/booking/refund">
                       {{ csrf_field() }}
                        <div class="form-group">
                          <label>Account Name</label>
                          <input type="text" name="account_name" class="form-control" placeholder="Ex. Jhon Doe">
                        </div>

                        <div class="form-group">
                          <label>Bank Name</label>
                          <input type="text" name="bank_name" class="form-control" placeholder="Ex. HDFC">
                        </div>

                         <div class="form-group">
                          <label>Account No.</label>
                          <input type="text" name="account_no" class="form-control" placeholder="Ex. 8800967">
                        </div>

                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <input type="hidden" name="amount" value="{{ $booking->price }}">

                        <div class="form-group">
                          <label>Account Type</label>
                          <select class="form-control" name="account_type">
                            <option value="savings">Savings</option>
                            <option value="current">Current</option>
                          </select>
                        </div>

                         <div class="form-group">
                          <label>Bank IFSC Code</label>
                          <input type="text" name="bank_ifsc" class="form-control" placeholder="Ex. HDFC00064">
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Request Refund</button>
                        </div>
                    </form>

                    @endif
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
