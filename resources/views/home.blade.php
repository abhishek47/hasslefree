@extends('layouts.master')

@section('content')
<div class="bg-light mini-spacer" style="min-height: 1000px;">
    <div class="container">

        <div class="row hidden-md-down">
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Add-Window"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">You Make A Booking</a></h6>
                            <p class="m-t-20">Book your luggage storage and transfer in less than 5 minutes.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Truck"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">We Collect &amp; Store</a></h6>
                            <p class="m-t-20">Luggage is sealed and transfered to a secured warehouse.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Stopwatch"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">You Get Your Luggage</a></h6>
                            <p class="m-t-20">Get your luggage back anywhere and anytime you want.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 ">
                <form class="registration-form text-dark font-medium" method="POST" action="/bookings">
                    {{ csrf_field() }}
                    <fieldset style="display: block;">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h3 class="panel-heading">Take My Luggage</h3>
                                <hr>
                                
                                <div class="form-group">
                                    <label>Bags Count</label>
                                    <input type="number" data-parsley-required  name="bags_count" class="form-control" placeholder="No. of bags">
                                    <small>How many bags do we need to carry?</small>
                                </div>
                                
                                <div class="form-group">
                                    <label>Special Comments about luggage (optional)</label>
                                    <textarea name="special" rows="3" class="form-control"></textarea>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                       
                   
                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pickup my bags from</label>
                                    <select name="pick_up_type" data-parsley-required  id="pick_up_type" class="form-control" >
                                        <option disabled selected value>-- Select your option --</option>
                                        <option value="0">Airport</option>
                                        <option value="1">Train Station</option>
                                        <option value="2">Bus Station</option>
                                        <option value="3">My Home</option>
                                        <option value="4">My Hotel</option>
                                        <option value="5">My Office</option>
                                    </select>
                                     <small>Let us know where should we pick up bags from</small>
                                </div>
                                <div id="pickup_other" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="pick_up_from" id="pick_up_location" class="form-control" placeholder="Enter your location">
                                    </div>

                                    <div class="form-group">
                                        <label>Complete Address ( optional )</label>
                                        <input type="text" name="pick_up_address"  class="form-control" placeholder="Enter your address">
                                    </div>
                                    
                                </div>
                                <div id="pickup_airport" class="hidden">
                                    <div class="form-group">
                                        <label>Choose your airport</label>
                                        <select name="pick_up_airport_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\Airport::all() as $airport)
                                             <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Flight Number (optional)</label>
                                        <input type="text" name="pick_up_flight_number" class="form-control" placeholder="Enter flight number">
                                    </div>
                                </div>
                                <div id="pickup_train" class="hidden">
                                    <div class="form-group">
                                        <label>Choose train station</label>
                                        <select name="pick_up_train_station_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\TrainStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Ticket PNR Number </label>
                                        <input type="text" name="pick_up_train_pnr" class="form-control" placeholder="Enter your PNR number">
                                    </div>

                                   
                                </div>
                                <div id="pickup_bus" class="hidden">
                                    <div class="form-group">
                                        <label>Choose Bus station</label>
                                        <select name="pick_up_bus_station_id" class="form-control">
                                             <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\BusStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
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
                                        <option value="0">Airport</option>
                                        <option value="1">Train Station</option>
                                        <option value="2">Bus Station</option>
                                        <option value="3">My Home</option>
                                        <option value="4">My Hotel</option>
                                        <option value="5">My Office</option>
                                    </select>
                                    <small>Let us know where should we drop up bags at</small>
                                </div>
                                <div id="drop_other" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="drop_to" id="drop_location" class="form-control" placeholder="Enter your location">
                                    </div>

                                     <div class="form-group" id="complete-address">
                                        <label>Complete Address ( optional )</label>
                                        <input type="text" name="drop_address"  class="form-control" placeholder="Enter your address">
                                    </div>
                                    
                                </div>
                                <div id="drop_airport" class="hidden">
                                    <div class="form-group">
                                        <label>Choose your drop airport</label>
                                        <select name="drop_airport_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\Airport::all() as $airport)
                                             <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Flight Number </label>
                                        <input type="text" name="drop_flight_number" class="form-control" placeholder="Enter flight number">
                                    </div>
                                </div>
                                <div id="drop_train" class="hidden">
                                    <div class="form-group">
                                        <label>Choose train station</label>
                                        <select name="drop_train_station_id" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\TrainStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Ticket PNR Number </label>
                                        <input type="text" name="drop_train_pnr" class="form-control" placeholder="Enter your PNR number">
                                    </div>

                                    
                                </div>
                                <div id="drop_bus" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Choose Bus station</label>
                                        <select name="drop_bus_station_id" class="form-control">
                                             <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\BusStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
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
                                    <input type="text" id="datedropper1" data-large-default="true" data-large-mode="true" data-init-set="false"  data-format="d-m-Y" name="pick_up_date" data-lock="from" required class="form-control" onchange="checkTimeDifference();">
                                </div>
                                <div class="form-group">
                                    <label>Pick up time</label>
                                   
                                    <select class="form-control" name="pick_up_time" id="pick_up_time" onchange="checkTimeDifference();">
                                        <option selected disabled>--- Choose Time ---</option>
                                        <option value="1">09:00 AM - 10:00 AM</option>
                                        <option value="2">10:00 AM - 11:00 AM</option>
                                        <option value="3">11:00 AM - 12:00 PM</option>
                                        <option value="4">12:00 PM - 01:00 PM</option>
                                        <option value="5">01:00 PM - 02:00 PM</option>
                                        <option value="6">02:00 PM - 03:00 PM</option>
                                        <option value="7">03:00 PM - 04:00 PM</option>
                                        <option value="8">04:00 PM - 05:00 PM</option>
                                        <option value="9">05:00 PM - 06:00 PM</option>
                                        <option value="10">06:00 PM - 07:00 PM</option>
                                        <option value="11">07:00 PM - 08:00 PM</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Drop date</label>
                                    <input type="date" id="datedropper2" data-large-default="true" data-large-mode="true" data-init-set="false"  data-format="d-m-Y" name="drop_date" data-lock="from"  required class="form-control" onchange="checkTimeDifference();">
                                </div>
                                <div class="form-group">
                                    <label>Drop time</label>
                                    <select class="form-control" name="drop_time" id="drop_time" onchange="checkTimeDifference();">
                                        <option selected disabled>--- Choose Time ---</option>
                                        <option value="1">12:00 AM - 01:00 AM</option>
                                        <option value="2">01:00 AM - 02:00 AM</option>
                                        <option value="3">02:00 AM - 03:00 AM</option>
                                        <option value="4">03:00 AM - 04:00 AM</option>
                                        <option value="5">04:00 AM - 05:00 AM</option>
                                        <option value="6">05:00 AM - 06:00 AM</option>
                                        <option value="7">06:00 AM - 07:00 AM</option>
                                        <option value="8">07:00 AM - 08:00 AM</option>
                                        <option value="9">08:00 AM - 09:00 AM</option>
                                        <option value="10">09:00 AM - 10:00 AM</option>
                                        <option value="11">10:00 AM - 11:00 AM</option>
                                        <option value="12">11:00 AM - 12:00 PM</option>
                                        <option value="13">12:00 PM - 01:00 PM</option>
                                        <option value="14">01:00 PM - 02:00 PM</option>
                                        <option value="15">02:00 PM - 03:00 PM</option>
                                        <option value="16">03:00 PM - 04:00 PM</option>
                                        <option value="17">04:00 PM - 05:00 PM</option>
                                        <option value="18">05:00 PM - 06:00 PM</option>
                                        <option value="19">06:00 PM - 07:00 PM</option>
                                        <option value="20">07:00 PM - 08:00 PM</option>
                                        <option value="21">08:00 PM - 09:00 PM</option>
                                        <option value="22">09:00 PM - 10:00 PM</option>
                                        <option value="23">10:00 PM -  11:00 PM</option>
                                        <option value="24">11:00 PM - 12:00 AM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                    
                        <div class="card card-shadow">
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
                                </div> 


                                <div class="form-group hidden" id="verified-otp">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <h3 class="text-success m-b-0 p-b-0 font-bold"><i class="fa fa-check-circle"></i> Mobile Number Successfully Verified!</h3>
                                        </div>
                                    </div>
                                   
                                </div> 

                                

                               
                            </div>
                        </div>
                        <button id="getQuote" type="submit" class="btn btn-danger-gradiant btn-next btn-arrow pull-right" disabled="true">
                        <span>Get Quote <i class="fa fa-arrow-right"></i></span>
                        </button>

                        <button class="btn btn-success-gradiant btn-previous btn-arrow pull-left">
                        <span>Back <i class="fa fa-arrow-left"></i></span>
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
} else if(valueSelected == 1) {
$('#pickup_bus').addClass('hidden');
$('#pickup_other').addClass('hidden');
$('#pickup_airport').addClass('hidden');
$('#pickup_train').removeClass('hidden');
} else if(valueSelected == 2) {
$('#pickup_other').addClass('hidden');
$('#pickup_airport').addClass('hidden');
$('#pickup_train').addClass('hidden');
$('#pickup_bus').removeClass('hidden');
} else {
$('#pickup_airport').addClass('hidden');
$('#pickup_train').addClass('hidden');
$('#pickup_bus').addClass('hidden');
$('#pickup_other').removeClass('hidden');
}


});
$('#drop_to_type').on('change', function (e) {
var optionSelected = $("option:selected", this);
var valueSelected = this.value;
dropType = valueSelected;
if(valueSelected == 0){
$('#drop_train').addClass('hidden');
$('#drop_bus').addClass('hidden');
$('#drop_other').addClass('hidden');
$('#drop_airport').removeClass('hidden');
} else if(valueSelected == 1) {
$('#drop_bus').addClass('hidden');
$('#drop_other').addClass('hidden');
$('#drop_airport').addClass('hidden');
$('#drop_train').removeClass('hidden');
} else if(valueSelected == 2) {
$('#drop_other').addClass('hidden');
$('#drop_airport').addClass('hidden');
$('#drop_train').addClass('hidden');
$('#drop_bus').removeClass('hidden');
} else {
$('#drop_airport').addClass('hidden');
$('#drop_train').addClass('hidden');
$('#drop_bus').addClass('hidden');
$('#drop_other').removeClass('hidden');
}

if(valueSelected == 5)
{
    $('#complete-address').addClass('hidden');
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
    var date1 = $('#datedropper1').val();   
    var date2 = $('#datedropper2').val();    
    var time1 = $('#pick_up_time option:selected').val();
    var time2 = $('#drop_time option:selected').val();

    var message = '';

    if(date1 == date2 && (time2 - time1) < 6)
    {
        message = 'The delivery time should atleast be 6 hours ahead of pickup time.';
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

    
            
  }


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

            $('#request-otp').addClass('hidden');

            $('#user-phone').html('(+91)' + $('#phone').val());

            $('#verify-otp').removeClass('hidden');

            $('#btn-request-otp').addClass('hidden');

            $('#btn-verify-otp').removeClass('hidden'); 

        }

        

      
        
  });


    $('#btn-verify-otp').on('click', function()
  {

        if($('#user-otp').val() == 12345)
        {
            $('#user-otp').addClass('parsley-error');
            $('#user-otp').parent().find('.parsley-errors-list').remove();
            $('#verify-otp').addClass('hidden');
            $('#verified-otp').removeClass('hidden');
            $('#getQuote').attr('disabled', false);
        } else {
             message = 'Please enter correct OTP!'
             $('#user-otp').addClass('parsley-error');
            $('#user-otp').parent().find('.parsley-errors-list').remove();

            $('#user-otp').parent().append('<ul class="parsley-errors-list filled" id="parsley-id-3"><li class="parsley-required">'+message+'</li></ul>'); 
        }

      
  });


</script>
@endsection