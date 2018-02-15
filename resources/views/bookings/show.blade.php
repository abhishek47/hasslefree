@extends('layouts.master')

@section('content')
<div class="mini-spacer bg-light" style="min-height: 1000px;">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-16">
                     <h3 class="panel-heading">Booking Details</h3>
                     <hr>
                    
                     @if($booking->special != null)

                        <p><b>Special Comments : </b> {{ $booking->special }}</p>

                    @endif


                     <div class="table-responsive hidden-md-down">
                       <table class="table table-striped table-bordered">
                         <tbody>
                           <tr >
                             <td class="font-medium" style="min-width: 35%;">No. of Bags</td>
                             <td>{{ $booking->bags_count }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Time</td>
                             <td>{{ $booking->pick_up_date }}, {{ $booking->pick_up_time }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Address</td>
                             <td>
                               @if($booking->pick_up_type == 0)
                                {{ $booking->pickupAirport->name }}
                                <br><b>Terminal :</b> {{ $booking->pick_up_airport_terminal }}
                                <br><b>Flight Number :</b> {{ $booking->pick_up_flight_number }} 
                               @elseif($booking->pick_up_type == 1)


                               {{ $booking->pickupTrain->name }}
                              <br><b>Train No. :</b> {{ $booking->pick_up_train }}
                              <br><b>Coach No. :</b> {{ $booking->pick_up_train_coach }}
                              <br><b>Seat No. :</b> {{ $booking->pick_up_train_seat }}
                              <br><b>Train Time :</b> {{ $booking->pick_up_train_time }}

                            @elseif($booking->pick_up_type == 2)
      
                              {{ $booking->pickupBus->name }}

                            @else

                             {{ $booking->pick_up_from }}</p> 
                              @if(isset($booking->pick_up_address))
                              <br><b>Address : </b> {{ $booking->pick_up_address }}
                              @endif

                            @endif

                             </td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Time</td>
                             <td>{{ $booking->drop_date }}, {{ $booking->drop_time }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Address</td>
                             <td>
                              @if($booking->drop_to_type == 0)

                                
                                {{ $booking->dropAirport->name }}
                                <br><b>Terminal :</b> {{ $booking->drop_airport_terminal }}
                                <br><b>Flight Number :</b> {{ $booking->drop_flight_number }}

                              @elseif($booking->drop_to_type == 1)

                                
                                {{ $booking->dropTrain->name }}
                                <br><b>Train No. :</b> {{ $booking->drop_train_no }}
                                 <br><b>Coach No. :</b> {{ $booking->drop_train_coach }}
                                  <br><b>Seat No. :</b> {{ $booking->drop_train_seat }}
                                   <br><b>Train Time :</b> {{ $booking->drop_train_time }}

                              @elseif($booking->drop_to_type == 2)

                               
                                <b>Drop to :</b> {{ $booking->dropBus->name }}

                              @elseif($booking->drop_to_type > 2)

                                {{ $booking->drop_to }} 
                                @if(isset($booking->drop_address))
                                <br><b>Address : </b> {{ $booking->drop_address }}
                                @endif

                              @endif
                             </td>
                           </tr>

                           <tr>
                             <td class="font-medium">Contact</td>
                             <td>{{ $booking->phone }}</td>
                           </tr>

                         </tbody>
                       </table>
                     </div>

                     <div class="table-responsive hidden-md-up">
                       <table class="table table-striped table-bordered">
                         <tbody>
                           <tr >
                             <td class="font-medium" style="min-width: 35%;">No. of Bags</td>
                           </tr>
                           <tr>
                             <td>{{ $booking->bags_count }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Time</td>
                             
                           </tr>
                           <tr>
                             <td>{{ $booking->pick_up_date }}, {{ $booking->pick_up_time }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Address</td>
                            
                           </tr>
                           <tr>
                              <td>
                               @if($booking->pick_up_type == 0)
                                {{ $booking->pickupAirport->name }}
                                <br><b>Terminal :</b> {{ $booking->pick_up_airport_terminal }}
                                <br><b>Flight Number :</b> {{ $booking->pick_up_flight_number }} 
                               @elseif($booking->pick_up_type == 1)


                               {{ $booking->pickupTrain->name }}
                              <br><b>Train No. :</b> {{ $booking->pick_up_train }}
                              <br><b>Coach No. :</b> {{ $booking->pick_up_train_coach }}
                              <br><b>Seat No. :</b> {{ $booking->pick_up_train_seat }}
                              <br><b>Train Time :</b> {{ $booking->pick_up_train_time }}

                            @elseif($booking->pick_up_type == 2)
      
                              {{ $booking->pickupBus->name }}

                            @else

                             {{ $booking->pick_up_from }}</p> 
                              @if(isset($booking->pick_up_address))
                              <br><b>Address : </b> {{ $booking->pick_up_address }}
                              @endif

                            @endif

                             </td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Time</td>
                             
                           </tr>
                           <tr>
                             <td>{{ $booking->drop_date }}, {{ $booking->drop_time }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Address</td>
                            
                           </tr>

                           <tr>
                              <td>
                              @if($booking->drop_to_type == 0)

                                
                                {{ $booking->dropAirport->name }}
                                <br><b>Terminal :</b> {{ $booking->drop_airport_terminal }}
                                <br><b>Flight Number :</b> {{ $booking->drop_flight_number }}

                              @elseif($booking->drop_to_type == 1)

                                
                                {{ $booking->dropTrain->name }}
                                <br><b>Train No. :</b> {{ $booking->drop_train_no }}
                                 <br><b>Coach No. :</b> {{ $booking->drop_train_coach }}
                                  <br><b>Seat No. :</b> {{ $booking->drop_train_seat }}
                                   <br><b>Train Time :</b> {{ $booking->drop_train_time }}

                              @elseif($booking->drop_to_type == 2)

                               
                                <b>Drop to :</b> {{ $booking->dropBus->name }}

                              @elseif($booking->drop_to_type > 2)

                                {{ $booking->drop_to }} 
                                @if(isset($booking->drop_address))
                                <br><b>Address : </b> {{ $booking->drop_address }}
                                @endif

                              @endif
                             </td>
                           </tr>

                           <tr>
                             <td class="font-medium">Contact</td>
                             
                           </tr>

                           <tr>
                             <td>{{ $booking->phone }}</td>
                           </tr>

                         </tbody>
                       </table>
                     </div>

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

                        <a target="_blank" href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary hidden-md-up">Print Receipt</a>

                        <a  href="/bookings/{{$booking->id}}/cancel" class="btn btn-danger pull-right hidden-md-down">Cancel Booking</a>

                         <a target="_blank"  href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary pull-right hidden-md-down m-r-10">Print Receipt</a>

                       

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
