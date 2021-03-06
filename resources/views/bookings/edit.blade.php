@extends('layouts.master')

@section('title', 'Edit Booking | Booking #' . $booking->id)

@section('content')
<div class="bg-light mini-spacer" style="min-height: 1000px;padding-top: 90px;">
    <div class="container">




        <div class="row">
            <div class="col-md-12 ">
                <form class="registration-form text-dark font-medium" method="POST" action="/bookings/{{$booking->id}}/update">
                    {{ csrf_field() }}
                    <fieldset style="display: block;">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h3 class="panel-heading">Edit Booking #{{ $booking->id }}</h3>
                                <hr>

                                <div class="form-group">
                                    <label>Bags Count</label>
                                    <input type="number" data-parsley-required value="{{ $booking->bags_count }}" name="bags_count" class="form-control" placeholder="No. of bags">
                                    <small>How many bags do we need to carry?</small>
                                </div>

                                <div class="form-group">
                                    <label>Special Comments about luggage (optional)</label>
                                    <textarea name="special" rows="3" class="form-control">{{ $booking->special }}</textarea>
                                </div>





                            </div>
                        </div>


                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pickup my bags from</label>
                                    <select name="pick_up_type" data-parsley-required  id="pick_up_type" class="form-control" >
                                        <option value="0" {{ $booking->pick_up_type == 0 ? 'selected' : '' }}>Airport</option>
                                        <option value="1" {{ $booking->pick_up_type == 1 ? 'selected' : '' }}>Train Station</option>
                                        <option value="2" {{ $booking->pick_up_type == 2 ? 'selected' : '' }}>Bus Station</option>
                                        <option value="3" {{ $booking->pick_up_type == 3 ? 'selected' : '' }}>My Home</option>
                                        <option value="4" {{ $booking->pick_up_type == 4 ? 'selected' : '' }}>My Hotel</option>
                                        <option value="5" {{ $booking->pick_up_type == 5 ? 'selected' : '' }}>My Office</option>
                                    </select>
                                     <small>Let us know where should we pick up bags from</small>
                                </div>
                                <div id="pickup_other" class="hidden">

                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="pick_up_from" id="pick_up_location" value="{{ $booking->pick_up_from}}" class="form-control" placeholder="Enter your location">
                                    </div>

                                    <div class="form-group" id="pickup_complete_address_div">
                                        <label>Complete Address</label>
                                        <input type="text" name="pick_up_address" id="pickup_complete_address"  value="{{ $booking->pick_up_address}}" class="form-control" placeholder="Enter your address" required="" disabled="">
                                    </div>

                                </div>
                                <div id="pickup_airport" class="hidden">
                                    <div class="form-group">
                                        <label>Choose your airport</label>
                                        <select name="pick_up_airport_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\Airport::all() as $airport)
                                             <option value="{{ $airport->id }}" {{ $booking->pick_up_airport_id == $airport->id ? 'selected' : '' }}>{{ $airport->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Flight Number</label>
                                        <input type="text" name="pick_up_flight_number" id="pick_up_flight_number" value="{{ $booking->pick_up_flight_number}}" class="form-control" placeholder="Enter flight number">
                                    </div>
                                </div>
                                <div id="pickup_train" class="hidden">
                                    <div class="form-group">
                                        <label>Choose train station</label>
                                        <select name="pick_up_train_station_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\TrainStation::all() as $station)
                                             <option value="{{ $station->id }}" {{ $booking->pick_up_train_station_id == $station->id ? 'selected' : '' }}>{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ticket PNR Number </label>
                                        <input type="number" name="pick_up_train_pnr"  id="pick_up_prn" value="{{ $booking->pick_up_train_pnr }}" class="form-control" placeholder="Enter your PNR number" required="" disabled="">
                                    </div>


                                </div>
                                <div id="pickup_bus" class="hidden">
                                    <div class="form-group">
                                        <label>Choose Bus station</label>
                                        <select name="pick_up_bus_station_id" class="form-control">
                                             <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\BusStation::all() as $station)
                                             <option value="{{ $station->id }}" {{ $booking->pick_up_bus_station_id == $station->id ? 'selected' : '' }}>{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Drop my bags to</label>
                                    <select name="drop_to_type" required id="drop_to_type" class="form-control">
                                        <option disabled selected value>-- Select your option --</option>
                                        <option value="0" {{ $booking->drop_to_type == 0 ? 'selected' : '' }}>Airport</option>
                                        <option value="1" {{ $booking->drop_to_type == 1 ? 'selected' : '' }}>Train Station</option>
                                        <option value="2" {{ $booking->drop_to_type == 2 ? 'selected' : '' }}>Bus Station</option>
                                        <option value="3" {{ $booking->drop_to_type == 3 ? 'selected' : '' }}>My Home</option>
                                        <option value="4" {{ $booking->drop_to_type == 4 ? 'selected' : '' }}>My Hotel</option>
                                        <option value="5" {{ $booking->drop_to_type == 5 ? 'selected' : '' }}>My Office</option>
                                    </select>
                                    <small>Let us know where should we drop up bags at</small>
                                </div>
                                <div id="drop_other" class="hidden">

                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="drop_to" value="{{ $booking->drop_to }}" id="drop_location" class="form-control" placeholder="Enter your location">
                                    </div>

                                     <div class="form-group" id="complete-address_div">
                                        <label>Complete Address</label>
                                        <input type="text" name="drop_address" value="{{ $booking->drop_address }}" id="complete-address"  class="form-control" placeholder="Enter your address" required="" disabled="">
                                    </div>

                                </div>
                                <div id="drop_airport" class="hidden">
                                    <div class="form-group">
                                        <label>Choose your drop airport</label>
                                        <select name="drop_airport_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\Airport::all() as $airport)
                                             <option value="{{ $airport->id }}" {{ $booking->drop_airport_id == $airport->id ? 'selected' : '' }}>{{ $airport->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Flight Number </label>
                                        <input type="text" name="drop_flight_number" value="{{ $booking->drop_flight_number }}"  class="form-control" placeholder="Enter flight number">
                                    </div>
                                </div>
                                <div id="drop_train" class="hidden">
                                    <div class="form-group">
                                        <label>Choose train station</label>
                                        <select name="drop_train_station_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\TrainStation::all() as $station)
                                             <option value="{{ $station->id }}" {{ $booking->drop_train_station_id == $station->id ? 'selected' : '' }}>{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ticket PNR Number </label>
                                        <input type="number" name="drop_train_pnr" id="drop_prn" value="{{ $booking->drop_prn }}"  class="form-control" placeholder="Enter your PNR number" required="" disabled="">
                                    </div>


                                </div>
                                <div id="drop_bus" class="hidden">

                                    <div class="form-group">
                                        <label>Choose Bus station</label>
                                        <select name="drop_bus_station_id" class="form-control">
                                             <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\BusStation::all() as $station)
                                             <option value="{{ $station->id }}" {{ $booking->drop_bus_station_id == $station->id ? 'selected' : '' }}>{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pick up date</label>
                                    <input type="text" id="datedropper1" value="{{ $booking->pick_up_date }}" data-large-default="true" data-large-mode="true" data-init-set="false"  data-format="d-m-Y" name="pick_up_date" data-lock="from" required class="form-control" onchange="checkTimeDifference();">
                                </div>
                                <div class="form-group">
                                    <label>Pick up time</label>

                                    <select class="form-control" name="pick_up_time" id="pick_up_time" onchange="checkTimeDifference();">
                                        <option selected disabled>--- Choose Time ---</option>
                                        <option value="1" {{ $booking->pick_up_time == 1 ? 'selected' : '' }}>12:00 AM - 01:00 AM</option>
                                        <option value="2" {{ $booking->pick_up_time == 2 ? 'selected' : '' }}>01:00 AM - 02:00 AM</option>
                                        <option value="3" {{ $booking->pick_up_time == 3 ? 'selected' : '' }}>02:00 AM - 03:00 AM</option>
                                        <option value="4" {{ $booking->pick_up_time == 4 ? 'selected' : '' }}>03:00 AM - 04:00 AM</option>
                                        <option value="5" {{ $booking->pick_up_time == 5 ? 'selected' : '' }}>04:00 AM - 05:00 AM</option>
                                        <option value="6" {{ $booking->pick_up_time == 6 ? 'selected' : '' }}>05:00 AM - 06:00 AM</option>
                                        <option value="7" {{ $booking->pick_up_time == 7 ? 'selected' : '' }}>06:00 AM - 07:00 AM</option>
                                        <option value="8" {{ $booking->pick_up_time == 8 ? 'selected' : '' }}>07:00 AM - 08:00 AM</option>
                                        <option value="9" {{ $booking->pick_up_time == 9 ? 'selected' : '' }}>08:00 AM - 09:00 AM</option>
                                        <option value="10" {{ $booking->pick_up_time == 10 ? 'selected' : '' }}>09:00 AM - 10:00 AM</option>
                                        <option value="11" {{ $booking->pick_up_time == 11 ? 'selected' : '' }}>10:00 AM - 11:00 AM</option>
                                        <option value="12" {{ $booking->pick_up_time == 12 ? 'selected' : '' }}>11:00 AM - 12:00 PM</option>
                                        <option value="13" {{ $booking->pick_up_time == 13 ? 'selected' : '' }}>12:00 PM - 01:00 PM</option>
                                        <option value="14" {{ $booking->pick_up_time == 14 ? 'selected' : '' }}>01:00 PM - 02:00 PM</option>
                                        <option value="15" {{ $booking->pick_up_time == 15 ? 'selected' : '' }}>02:00 PM - 03:00 PM</option>
                                        <option value="16" {{ $booking->pick_up_time == 16 ? 'selected' : '' }}>03:00 PM - 04:00 PM</option>
                                        <option value="17" {{ $booking->pick_up_time == 17 ? 'selected' : '' }}>04:00 PM - 05:00 PM</option>
                                        <option value="18" {{ $booking->pick_up_time == 18 ? 'selected' : '' }}>05:00 PM - 06:00 PM</option>
                                        <option value="19" {{ $booking->pick_up_time == 19 ? 'selected' : '' }}>06:00 PM - 07:00 PM</option>
                                        <option value="20" {{ $booking->pick_up_time == 20 ? 'selected' : '' }}>07:00 PM - 08:00 PM</option>
                                        <option value="21" {{ $booking->pick_up_time == 21 ? 'selected' : '' }}>08:00 PM - 09:00 PM</option>
                                        <option value="22" {{ $booking->pick_up_time == 22 ? 'selected' : '' }}>09:00 PM - 10:00 PM</option>
                                        <option value="23" {{ $booking->pick_up_time == 23 ? 'selected' : '' }}>10:00 PM -  11:00 PM</option>
                                        <option value="24" {{ $booking->pick_up_time == 24 ? 'selected' : '' }}>11:00 PM - 12:00 AM</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Drop date</label>
                                    <input type="text" id="datedropper2"  data-large-default="true" data-large-mode="true"   data-format="d-m-Y" name="drop_date" data-lock="from"  required class="form-control" value="{{ $booking->drop_date }}  onchange="checkTimeDifference();">
                                </div>
                                <div class="form-group">
                                    <label>Drop time</label>
                                    <select class="form-control" name="drop_time" id="drop_time" onchange="checkTimeDifference();">
                                        <option selected disabled>--- Choose Time ---</option>
                                        <option value="1" {{ $booking->drop_time == 1 ? 'selected' : '' }}>12:00 AM - 01:00 AM</option>
                                        <option value="2" {{ $booking->drop_time == 2 ? 'selected' : '' }}>01:00 AM - 02:00 AM</option>
                                        <option value="3" {{ $booking->drop_time == 3 ? 'selected' : '' }}>02:00 AM - 03:00 AM</option>
                                        <option value="4" {{ $booking->drop_time == 4 ? 'selected' : '' }}>03:00 AM - 04:00 AM</option>
                                        <option value="5" {{ $booking->drop_time == 5 ? 'selected' : '' }}>04:00 AM - 05:00 AM</option>
                                        <option value="6" {{ $booking->drop_time == 6 ? 'selected' : '' }}>05:00 AM - 06:00 AM</option>
                                        <option value="7" {{ $booking->drop_time == 7 ? 'selected' : '' }}>06:00 AM - 07:00 AM</option>
                                        <option value="8" {{ $booking->drop_time == 8 ? 'selected' : '' }}>07:00 AM - 08:00 AM</option>
                                        <option value="9" {{ $booking->drop_time == 9 ? 'selected' : '' }}>08:00 AM - 09:00 AM</option>
                                        <option value="10" {{ $booking->drop_time == 10 ? 'selected' : '' }}>09:00 AM - 10:00 AM</option>
                                        <option value="11" {{ $booking->drop_time == 11 ? 'selected' : '' }}>10:00 AM - 11:00 AM</option>
                                        <option value="12" {{ $booking->drop_time == 12 ? 'selected' : '' }}>11:00 AM - 12:00 PM</option>
                                        <option value="13" {{ $booking->drop_time == 13 ? 'selected' : '' }}>12:00 PM - 01:00 PM</option>
                                        <option value="14" {{ $booking->drop_time == 14 ? 'selected' : '' }}>01:00 PM - 02:00 PM</option>
                                        <option value="15" {{ $booking->drop_time == 15 ? 'selected' : '' }}>02:00 PM - 03:00 PM</option>
                                        <option value="16" {{ $booking->drop_time == 16 ? 'selected' : '' }}>03:00 PM - 04:00 PM</option>
                                        <option value="17" {{ $booking->drop_time == 17 ? 'selected' : '' }}>04:00 PM - 05:00 PM</option>
                                        <option value="18" {{ $booking->drop_time == 18 ? 'selected' : '' }}>05:00 PM - 06:00 PM</option>
                                        <option value="19" {{ $booking->drop_time == 19 ? 'selected' : '' }}>06:00 PM - 07:00 PM</option>
                                        <option value="20" {{ $booking->drop_time == 20 ? 'selected' : '' }}>07:00 PM - 08:00 PM</option>
                                        <option value="21" {{ $booking->drop_time == 21 ? 'selected' : '' }}>08:00 PM - 09:00 PM</option>
                                        <option value="22" {{ $booking->drop_time == 22 ? 'selected' : '' }}>09:00 PM - 10:00 PM</option>
                                        <option value="23" {{ $booking->drop_time == 23 ? 'selected' : '' }}>10:00 PM -  11:00 PM</option>
                                        <option value="24" {{ $booking->drop_time == 24 ? 'selected' : '' }}>11:00 PM - 12:00 AM</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                     {{--    <div class="card card-shadow">
                            <div class="card-body">

                                <div class="form-group" id="request-otp">
                                    <label>Contact Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter a 10 digit mobile no." required class="form-control" >
                                    <small>We will send an OTP to this number.</small>
                                    <br><br>
                                      <button type="button" class="btn btn-danger-gradiant" id="btn-request-otp">
                                        <span>Request OTP</span>
                                    </button>
                                </div>



                                <div class="form-group hidden" id="verify-otp">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <p class="text-info font-bold">We have sent an OTP to  <span id="user-phone"></span></p>
                                        </div>
                                    </div>
                                    <label>Verify OTP</label>
                                    <input type="text" name="otp" id="user-otp" required class="form-control" >
                                    <small>Enter the five digit OTP received on your phone.</small>
                                    <br><br>
                                    <button type="button" class="btn btn-danger-gradiant" id="btn-verify-otp">
                                        <span>Verify OTP</span>
                                    </button>

                                     <button type="button" class="btn btn-primary" id="btn-resend-otp">
                                        <span>Resend OTP</span>
                                    </button>
                                </div>


                                <div class="form-group hidden" id="verified-otp">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <h3 class="text-success m-b-0 p-b-0 font-bold"><i class="fa fa-check-circle"></i> Mobile Number Successfully Verified!</h3>
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div> --}}
                        <button id="getQuote" type="submit" class="btn btn-danger-gradiant  btn-arrow pull-right">
                        <span>Update <i class="fa fa-arrow-right"></i></span>
                        </button>

                        <button onclick="window.close()" class="btn btn-success-gradiant btn-previous btn-arrow pull-left">
                        <span>Cancel <i class="fa fa-arrow-left"></i></span>
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


</div>



@endsection
@section('js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDul5sDHezP3kN2bCzJDgI2MYzMYqy4XIM&libraries=places"
></script>

<script type="text/javascript">
    var pickupType;
    var dropType;



pickupType = {{ $booking->pick_up_type }};


if(pickupType == 0){

 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').removeClass('hidden');

  $('#pick_up_prn').attr('disabled', true);

   $('#pick_up_flight_number').attr('disabled', false);

} else if(pickupType == 1) {

 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').removeClass('hidden');

 $('#pick_up_prn').attr('disabled', false);

 $('#pick_up_flight_number').attr('disabled', true);

} else if(pickupType == 2) {

 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').removeClass('hidden');


  $('#pick_up_prn').attr('disabled', true);

  $('#pick_up_flight_number').attr('disabled', true);

} else {

 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').removeClass('hidden');


  $('#pick_up_prn').attr('disabled', true);

  $('#pick_up_flight_number').attr('disabled', true);

  $('#pickup_complete_address').attr('disabled', false);

}

if(pickupType == 4)
{
    $('#pickup_complete_address_div').addClass('hidden');

     $('#pickup_complete_address').attr('disabled', true);
}


dropType = {{ $booking->drop_to_type }};

if(dropType == 0) {

    $('#drop_train').addClass('hidden');
    $('#drop_bus').addClass('hidden');
    $('#drop_other').addClass('hidden');
    $('#drop_airport').removeClass('hidden');

     $('#drop_prn').attr('disabled', true);

} else if(dropType == 1) {

    $('#drop_bus').addClass('hidden');
    $('#drop_other').addClass('hidden');
    $('#drop_airport').addClass('hidden');
    $('#drop_train').removeClass('hidden');

    $('#drop_prn').attr('disabled', false);

} else if(dropType == 2) {

    $('#drop_other').addClass('hidden');
    $('#drop_airport').addClass('hidden');
    $('#drop_train').addClass('hidden');
    $('#drop_bus').removeClass('hidden');

    $('#drop_prn').attr('disabled', true);

} else {

    $('#drop_airport').addClass('hidden');
    $('#drop_train').addClass('hidden');
    $('#drop_bus').addClass('hidden');
    $('#drop_other').removeClass('hidden');

    $('#drop_prn').attr('disabled', true);

    $('#complete-address').attr('disabled', false);

}

if(dropType == 4)
{
    $('#complete-address_div').addClass('hidden');

     $('#complete-address').attr('disabled', true);
}


</script>

<script type="text/javascript">

$('#pick_up_type').on('change', function (e) {

console.log('changed');

var optionSelected = $("option:selected", this);

var valueSelected = this.value;

pickupType = valueSelected;

console.log('value : ' + valueSelected);

if(valueSelected == 0){

 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').removeClass('hidden');

  $('#pick_up_prn').attr('disabled', true);

   $('#pick_up_flight_number').attr('disabled', false);

} else if(valueSelected == 1) {

 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').removeClass('hidden');

 $('#pick_up_prn').attr('disabled', false);

 $('#pick_up_flight_number').attr('disabled', true);

} else if(valueSelected == 2) {

 $('#pickup_other').addClass('hidden');
 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').removeClass('hidden');


  $('#pick_up_prn').attr('disabled', true);

  $('#pick_up_flight_number').attr('disabled', true);

} else {

 $('#pickup_airport').addClass('hidden');
 $('#pickup_train').addClass('hidden');
 $('#pickup_bus').addClass('hidden');
 $('#pickup_other').removeClass('hidden');


  $('#pick_up_prn').attr('disabled', true);

  $('#pick_up_flight_number').attr('disabled', true);

  $('#pickup_complete_address').attr('disabled', false);

}

if(valueSelected == 4)
{
    $('#pickup_complete_address_div').addClass('hidden');

     $('#pickup_complete_address').attr('disabled', true);
}


});

$('#drop_to_type').on('change', function (e) {

var optionSelected = $("option:selected", this);
var valueSelected = this.value;
dropType = valueSelected;

if(valueSelected == 0) {

    $('#drop_train').addClass('hidden');
    $('#drop_bus').addClass('hidden');
    $('#drop_other').addClass('hidden');
    $('#drop_airport').removeClass('hidden');

     $('#drop_prn').attr('disabled', true);

} else if(valueSelected == 1) {

    $('#drop_bus').addClass('hidden');
    $('#drop_other').addClass('hidden');
    $('#drop_airport').addClass('hidden');
    $('#drop_train').removeClass('hidden');

    $('#drop_prn').attr('disabled', false);

} else if(valueSelected == 2) {

    $('#drop_other').addClass('hidden');
    $('#drop_airport').addClass('hidden');
    $('#drop_train').addClass('hidden');
    $('#drop_bus').removeClass('hidden');

    $('#drop_prn').attr('disabled', true);

} else {

    $('#drop_airport').addClass('hidden');
    $('#drop_train').addClass('hidden');
    $('#drop_bus').addClass('hidden');
    $('#drop_other').removeClass('hidden');

    $('#drop_prn').attr('disabled', true);

    $('#complete-address').attr('disabled', false);

}

if(valueSelected == 4)
{
    $('#complete-address_div').addClass('hidden');

     $('#complete-address').attr('disabled', true);
}

});

$(document).ready(function () {
$('.registration-form fieldset:first-child').fadeIn('slow');
$('.registration-form input[type="text"]').on('focus', function () {
$(this).removeClass('input-error');
});
// next step
$('.registration-form .btn-next').on('click', function () {
    console.log('asdasd');
    var parent_fieldset = $(this).parents('fieldset');
    var next_step = true;

    var inputs = parent_fieldset.find('input, select, textarea');
    inputs.each(function()   {
    var instance = $(this).parsley();
    instance.validate();
    if(!instance.isValid()) {
    next_step = false;
}
});



if (next_step) {
parent_fieldset.fadeOut(400, function () {
$(this).next().fadeIn();
window.scrollTo(0,0);
var input1 = document.getElementById('pick_up_location');
var autocomplete1 = new google.maps.places.Autocomplete(input1);
var input2 = document.getElementById('drop_location');
var autocomplete2 = new google.maps.places.Autocomplete(input2);
});
}
});
// previous step
$('.registration-form .btn-previous').on('click', function () {
$(this).parents('fieldset').fadeOut(400, function () {
$(this).prev().fadeIn();
});
});


});
</script>

<script>
function init() {
var input1 = document.getElementById('pick_up_location');
var autocomplete1 = new google.maps.places.Autocomplete(input1);
var input2 = document.getElementById('drop_location');
var autocomplete2 = new google.maps.places.Autocomplete(input2);
}
google.maps.event.addDomListener(window, 'load', init);
</script>


<script>
    $('#datedropper1').dateDropper();
</script>

<script>
    $('#datedropper2').dateDropper();
</script>

<script>
  $.listen('parsley:field:validated', function(fieldInstance){
    if (fieldInstance.$element.is(":hidden")) {
        // hide the message wrapper
        fieldInstance._ui.$errorsWrapper.css('display', 'none');
        // set validation result to true
        fieldInstance.validationResult = true;
        return true;
    }
});


  function checkTimeDifference()
  {
    console.log('validation');

    var now = moment();



    var today = moment().format("DD-MM-YYYY");


    var date1 = $('#datedropper1').val();
    var date2 = $('#datedropper2').val();
    var time1 = parseInt($('#pick_up_time option:selected').val());
    var time2 = parseInt($('#drop_time option:selected').val());

    var diff = time2 - (time1+9);


    console.log('time1 : ' + time1 + ' | time2 : ' + time2 + ' | Diff : ' + diff);

    var message = '';
    var message2 = '';
    var message3 = '';

     var hours = moment().hour();

    if(date1 == today)
    {
        var cur = time1+9;

        if(cur < hours)
        {
            message2 = 'Please select a valid pickup time';
        }
    }

    if(date1 == date2 && time2 < 10)
    {
        message = 'The delivery time should atleast be 6 hours ahead of pickup time!!';

    } else if(date1 == date2 && (time2 >= 10 && diff < 6))
    {
        message = 'The delivery time should atleast be 6 hours ahead of pickup time.';
    }

    if(date2 == today)
    {
        if(time2 < hours)
        {
            message = 'Please select a valid drop time';
        }
    }

    if(message != '')
    {
        $('#drop_time').addClass('parsley-error');
        $('#drop_time').parent().find('.parsley-errors-list').remove();

        $('#drop_time').parent().append('<ul class="parsley-errors-list filled" id="parsley-id-3"><li class="parsley-required">'+message+'</li></ul>');

        $('#timeContinue').attr('disabled', true);

    } else {
        $('#drop_time').removeClass('parsley-error');
         $('#drop_time').parent().find('.parsley-errors-list').remove();
          $('#timeContinue').attr('disabled', false);
    }

    if(message2 != '')
    {
        $('#pick_up_time').addClass('parsley-error');
        $('#pick_up_time').parent().find('.parsley-errors-list').remove();

        $('#pick_up_time').parent().append('<ul class="parsley-errors-list filled" id="parsley-id-3"><li class="parsley-required">'+message2+'</li></ul>');

        $('#timeContinue').attr('disabled', true);

    } else {
        $('#pick_up_time').removeClass('parsley-error');
         $('#pick_up_time').parent().find('.parsley-errors-list').remove();
          $('#timeContinue').attr('disabled', false);
    }





  }

  var otp = '';

  $('#btn-request-otp').on('click', function()
  {
        var phone = $('#phone').val();
        if(phone.length  < 10)
        {
            message = 'Please enter correct 10 digit mobile number!';

            $('#phone').addClass('parsley-error');

            $('#phone').parent().find('.parsley-errors-list').remove();

            $('#phone').parent()
             .append('<ul class="parsley-errors-list filled" id="parsley-id-3"><li class="parsley-required">'+message+'</li></ul>');

        } else {

            $.post('api/phone/sendotp', {'phone':  $('#phone').val() }).then(function(response) {
              console.log(response);
               otp = response.otp;
            });

            $('#request-otp').addClass('hidden');

            $('#user-phone').html('(+91)' + $('#phone').val());

            $('#verify-otp').removeClass('hidden');

            $('#btn-request-otp').addClass('hidden');

            $('#btn-verify-otp').removeClass('hidden');

        }





  });

  $('#btn-resend-otp').on('click', function()
  {


            $.post('api/phone/sendotp', {'phone':  $('#phone').val() }).then(function(response) {
              console.log(response);
               otp = response.otp;
            });


        });








    $('#btn-verify-otp').on('click', function()
  {
        //console.log(otp);
        if($('#user-otp').val() == otp)
        {

            $('#user-otp').addClass('parsley-error');
            $('#user-otp').parent().find('.parsley-errors-list').remove();
            $('#verify-otp').addClass('hidden');
            $('#verified-otp').removeClass('hidden');
            $('#getQuote').attr('disabled', false);

        } else {
             message = 'Please enter correct OTP!';
             $('#user-otp').addClass('parsley-error');
            $('#user-otp').parent().find('.parsley-errors-list').remove();

            $('#user-otp').parent().append('<ul class="parsley-errors-list filled" id="parsley-id-3"><li class="parsley-required">'+message+'</li></ul>');
        }


  });


</script>
@endsection