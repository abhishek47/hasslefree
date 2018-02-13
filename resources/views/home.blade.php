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
                                </div>
                                
                                <div class="form-group">
                                    <label>Special Comments about luggage (optional)</label>
                                    <textarea name="special" rows="3" class="form-control"></textarea>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger-gradiant btn-next btn-arrow pull-right">
                            <span>Continue <i class="fa fa-arrow-right"></i></span>
                        </button>
                    </fieldset>
                    <fieldset>
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
                                </div>
                                <div id="pickup_other" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="pick_up_from" id="pick_up_location" class="form-control" placeholder="Enter your location">
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
                                        <label>Airport Terminal</label>
                                        <input type="text" name="pick_up_airport_terminal" class="form-control" placeholder="Enter Terminal from ticket">
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
                                        <label>Train Number (optional)</label>
                                        <input type="text" name="pick_up_train_no" class="form-control" placeholder="Enter train number">
                                    </div>

                                    <div class="form-group">
                                        <label>Train Coach (optional)</label>
                                        <input type="text" name="pick_up_train_coach" class="form-control" placeholder="Enter train coach number">
                                    </div>

                                     <div class="form-group">
                                        <label>Train Seat No. (optional)</label>
                                        <input type="text" name="pick_up_train_seat" class="form-control" placeholder="Enter train seat number">
                                    </div>

                                    <div class="form-group">
                                        <label>Train Time (optional)</label>
                                        <input type="time" name="pick_up_train_time" class="form-control" placeholder="Enter train arrival time">
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

                         <button class="btn btn-danger-gradiant btn-next btn-arrow pull-right">
                        <span>Continue <i class="fa fa-arrow-right"></i></span>
                        </button>

                        <button class="btn btn-success-gradiant btn-previous btn-arrow pull-left">
                        <span>Back <i class="fa fa-arrow-left"></i></span>
                        </button>
                       
                    </fieldset>
                    <fieldset>
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
                                </div>
                                <div id="drop_other" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Tell us your location</label>
                                        <input type="text" name="drop_to" id="drop_location" class="form-control" placeholder="Enter your location">
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
                                        <label>Airport Terminal</label>
                                        <input type="text" name="drop_airport_terminal" class="form-control" placeholder="Enter Terminal from ticket">
                                    </div>
                                    <div class="form-group">
                                        <label>Flight Number (optional)</label>
                                        <input type="text" name="drop_flight_number" class="form-control" placeholder="Enter flight number">
                                    </div>
                                </div>
                                <div id="drop_train" class="hidden">
                                    <div class="form-group">
                                        <label>Choose train station</label>
                                        <select name="drop_train_station" class="form-control">
                                            <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\TrainStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Train Number (optional)</label>
                                        <input type="text" name="drop_train_no" class="form-control" placeholder="Enter train number">
                                    </div>

                                    <div class="form-group">
                                        <label>Train Coach (optional)</label>
                                        <input type="text" name="drop_train_coach" class="form-control" placeholder="Enter train coach number">
                                    </div>

                                     <div class="form-group">
                                        <label>Train Seat No. (optional)</label>
                                        <input type="text" name="drop_train_seat" class="form-control" placeholder="Enter train seat number">
                                    </div>

                                    <div class="form-group">
                                        <label>Train Time (optional)</label>
                                        <input type="time" name="drop_train_time" class="form-control" placeholder="Enter train departure time">
                                    </div>
                                </div>
                                <div id="drop_bus" class="hidden">
                                    
                                    <div class="form-group">
                                        <label>Choose Bus station</label>
                                        <select name="drop_bus_station" class="form-control">
                                             <option value="0">-- Select your option --</option>
                                            @foreach(\App\Models\BusStation::all() as $station)
                                             <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger-gradiant btn-next btn-arrow pull-right">
                        <span>Continue <i class="fa fa-arrow-right"></i></span>
                        </button>

                        <button class="btn btn-success-gradiant btn-previous btn-arrow pull-left">
                        <span>Back <i class="fa fa-arrow-left"></i></span>
                        </button>
                    </fieldset>
                    <fieldset>
                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pick up date</label>
                                    <input type="text" id="datedropper1" data-large-default="true" data-large-mode="true" data-init-set="false"  data-format="d-m-Y" name="pick_up_date" required class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Pick up time</label>
                                   
                                    <select class="form-control" name="pick_up_time" id="pick_up_time">
                                        <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                        <option value="10:00 AM - 11:00 AM">09:00 AM - 10:00 AM</option>
                                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                        <option value="12:00 AM - 01:00 PM">12:00 AM - 01:00 PM</option>
                                        <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                                        <option value="02:00 PM - 03:00 PM">02:00 AM - 03:00 PM</option>
                                        <option value="03:00 PM - 04:00 PM">03:00 AM - 04:00 PM</option>
                                        <option value="04:00 PM - 05:00 PM">04:00 AM - 05:00 PM</option>
                                        <option value="05:00 PM - 06:00 PM">05:00 AM - 06:00 PM</option>
                                        <option value="06:00 PM - 07:00 PM">06:00 AM - 07:00 PM</option>
                                        <option value="07:00 PM - 08:00 PM">07:00 AM - 08:00 PM</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Drop date</label>
                                    <input type="date" id="datedropper2" data-large-default="true" data-large-mode="true" data-init-set="false"  data-format="d-m-Y" name="drop_date" required class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Drop time</label>
                                    <select class="form-control" name="drop_time" id="drop_time">
                                        <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                        <option value="10:00 AM - 11:00 AM">09:00 AM - 10:00 AM</option>
                                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                        <option value="12:00 AM - 01:00 PM">12:00 AM - 01:00 PM</option>
                                        <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                                        <option value="02:00 PM - 03:00 PM">02:00 AM - 03:00 PM</option>
                                        <option value="03:00 PM - 04:00 PM">03:00 AM - 04:00 PM</option>
                                        <option value="04:00 PM - 05:00 PM">04:00 AM - 05:00 PM</option>
                                        <option value="05:00 PM - 06:00 PM">05:00 AM - 06:00 PM</option>
                                        <option value="06:00 PM - 07:00 PM">06:00 AM - 07:00 PM</option>
                                        <option value="07:00 PM - 08:00 PM">07:00 AM - 08:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger-gradiant btn-next btn-arrow pull-right">
                        <span>Continue <i class="fa fa-arrow-right"></i></span>
                        </button>

                        <button class="btn btn-success-gradiant btn-previous btn-arrow pull-left">
                        <span>Back <i class="fa fa-arrow-left"></i></span>
                        </button>
                    </fieldset>
                    <fieldset>
                        <div class="card card-shadow">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="phone" required class="form-control" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger-gradiant btn-next btn-arrow pull-right">
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
$('#pick_up_type').on('change', function (e) {
console.log('changed');
var optionSelected = $("option:selected", this);
var valueSelected = this.value;
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
</script>
@endsection