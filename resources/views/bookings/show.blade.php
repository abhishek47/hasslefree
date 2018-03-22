@extends('layouts.master')

@section('content')

<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 90px;">
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
                           <tr >
                             <td class="font-medium" style="min-width: 35%;">Distance</td>
                             <td>{{ $booking->distance }} Km.</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Time</td>
                             <td>{{ $booking->pick_up_date }}, {{ getTime($booking->pick_up_time) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Address</td>
                             <td>
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

                             </td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Time</td>
                             <td>{{ $booking->drop_date }}, {{ getTime($booking->drop_time) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Address</td>
                             <td>
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

                            <tr >
                             <td class="font-medium" style="min-width: 35%;">Distance</td>
                           </tr>
                           <tr>
                             <td>{{ $booking->distance }} Km.</td>
                           </tr>

                           <tr>
                             <td class="font-medium">Pick Up Time</td>
                             
                           </tr>
                           <tr>
                             <td>{{ $booking->pick_up_date }}, {{ getTime($booking->pick_up_time) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Pick Up Address</td>
                            
                           </tr>
                           <tr>
                              <td>
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

                             </td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Time</td>
                             
                           </tr>
                           <tr>
                             <td>{{ $booking->drop_date }}, {{ getTime($booking->drop_time) }}</td>
                           </tr>
                           <tr>
                             <td class="font-medium">Drop Address</td>
                            
                           </tr>

                           <tr>
                              <td>
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

                    <h2><b>&#8377 {{ round($booking->total, 2) }}</b></h2>

                     <hr>

                     <p><b>Note:</b> Please provide a legal ID proof excluding PAN
                        card at the time of luggage pick up.</p>

                        <hr>

                     @if($booking->distance > 40)

                       <a href="tel:+911234567890" class="btn btn-success">Call Us @ 1234567890</a>

                     @else

                         @if($booking->status == -1)



                         @else

                           @if($booking->status == 0)


                            <a href="/bookings/{{$booking->id}}/delete" class="btn btn-danger">Cancel Booking</a>
                             
                            <br class="hidden-md-up"> <br class="hidden-md-up">  


                            <a  href="#confirmModal2" data-toggle="modal" class="btn btn-success hidden-md-up">Pay Online</a>

                            <a  href="#confirmModal1" data-toggle="modal" class="btn btn-primary hidden-md-up">Pay on Delivery</a>

                            <a  href="#confirmModal2" data-toggle="modal" class="btn btn-success pull-right hidden-md-down">Pay Online</a>

                            <a  href="#confirmModal1" data-toggle="modal" class="btn btn-primary pull-right hidden-md-down m-r-10">Pay on Delivery</a>
                         


                          @else

                             @if($booking->status != 5)
                               <a href="/bookings/{{$booking->id}}/cancel" class="btn btn-danger hidden-md-up">Cancel Booking</a>
                             @endif  

                             <a target="_blank" href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary hidden-md-up">Print Receipt</a>

                             @if($booking->status != 5)
                              <a href="/bookings/{{$booking->id}}/cancel" class="btn btn-danger pull-right hidden-md-down">Cancel Booking</a>
                             @endif

                             <a target="_blank"  href="/bookings/{{$booking->id}}/receipt" class="btn btn-primary pull-right hidden-md-down m-r-10">
                              Print Receipt
                             </a>

                          @endif

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

<!-- sample modal content -->
<div id="confirmModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Disclaimer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>The information contained in this website is for general information purposes only. The
                  information is provided by Hasslefree Luggage and while we endeavor to keep the information up
                  to date and correct, we make no representations or warranties of any kind, express or implied,
                  about the completeness, accuracy, reliability, suitability or availability with respect to the website
                  or the information, products, services, or related graphics contained on the website for any
                  purpose. Any reliance you place on such information is therefore strictly at your own risk.
                  In no event will we be liable for any loss or damage including without limitation, indirect or
                  consequential loss or damage, or any loss or damage whatsoever arising from loss of data or
                  profits arising out of, or in connection with, the use of this website.
                  Through this website you are able to link to other websites which are not under the control of
                  Hasslefree Luggage. We have no control over the nature, content and availability of those sites.
                  The inclusion of any links does not necessarily imply a recommendation or endorse the views
                  expressed within them. </p>

                  <p>Every effort is made to keep the portal up and running smoothly. However, Hasslefree Luggage
                  takes no responsibility for, and will not be liable for, the portal being temporarily unavailable due
                  to technical issues beyond our control.</p>
            </div>
            <div class="modal-footer">
                <a href="/bookings/{{$booking->id}}/cod" class="btn btn-danger waves-effect text-left" >Accept &amp; Confirm</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- sample modal content -->
<div id="confirmModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Disclaimer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <p>The information contained in this website is for general information purposes only. The
                  information is provided by Hasslefree Luggage and while we endeavor to keep the information up
                  to date and correct, we make no representations or warranties of any kind, express or implied,
                  about the completeness, accuracy, reliability, suitability or availability with respect to the website
                  or the information, products, services, or related graphics contained on the website for any
                  purpose. Any reliance you place on such information is therefore strictly at your own risk.
                  In no event will we be liable for any loss or damage including without limitation, indirect or
                  consequential loss or damage, or any loss or damage whatsoever arising from loss of data or
                  profits arising out of, or in connection with, the use of this website.
                  Through this website you are able to link to other websites which are not under the control of
                  Hasslefree Luggage. We have no control over the nature, content and availability of those sites.
                  The inclusion of any links does not necessarily imply a recommendation or endorse the views
                  expressed within them. </p>

                  <p>Every effort is made to keep the portal up and running smoothly. However, Hasslefree Luggage
                  takes no responsibility for, and will not be liable for, the portal being temporarily unavailable due
                  to technical issues beyond our control.</p>
            </div>
            <div class="modal-footer">
                <a href="/bookings/{{$booking->id}}/pay" class="btn btn-danger waves-effect text-left" >Accept &amp; Pay</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@endsection
