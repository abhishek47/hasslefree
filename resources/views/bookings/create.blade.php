@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Take My Luggage</div>
				<div class="panel-body">
					<form method="POST" action="/bookings">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Bags Count</label>
							<input type="number" required name="bags_count" class="form-control" placeholder="No. of bags">
						</div>
						
						<div class="form-group">
							<label>Special Comments about luggage (optional)</label>
							<textarea name="special" rows="3" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<label>Pickup my bags from</label>
							<select name="pick_up_type" required id="pick_up_type" class="form-control" >
								<option>-- Select your option --</option>
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
								<input type="text" name="pick_up_from" class="form-control" placeholder="Enter your location">
							</div>
							
						</div>

						<div id="pickup_airport" class="hidden">
							<div class="form-group">
								<label>Choose your airport</label>
								<select name="pick_up_airport_name" class="form-control">
									<option>-- Select your option --</option>
									<option value="Pune Airport">Pune Airport</option>
									<option value="Mumbai Airport 1">Mumbai Airport 1</option>
									<option value="Mumbai Airport 2">Mumbai Airport 2</option>
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
								<select name="pick_up_train_station" class="form-control">
									<option>-- Select your option --</option>
									<option value="Train Station 1">Train Station 1</option>
									<option value="Train Station 2">Train Station 2</option>
									<option value="Train Station 3">Train Station 3</option>
								</select>
							</div>

							
							<div class="form-group">
								<label>Train Number (optional)</label>
								<input type="text" name="pick_up_train_no" class="form-control" placeholder="Enter train number">
							</div>
						</div>


						<div id="pickup_bus" class="hidden">

							<div class="form-group">
								<label>Choose Bus station</label>
								<select name="pick_up_bus_station" class="form-control">
									<option>-- Select your option --</option>
									<option value="Bus Station 1">Bus Station 1</option>
									<option value="Bus Station 2">Bus Station 2</option>
									<option value="Bus Station 3">Bus Station 3</option>
								</select>
							</div>

						</div>

						<div class="form-group">
							<label>Drop my bags to</label>
							<select name="drop_to_type" required id="drop_to_type" class="form-control">
								<option>-- Select your option --</option>
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
								<input type="text" name="drop_to" class="form-control" placeholder="Enter your location">
							</div>
							
						</div>

						<div id="drop_airport" class="hidden">
							<div class="form-group">
								<label>Choose your drop airport</label>
								<select name="drop_airport_name" class="form-control">
									<option>-- Select your option --</option>
									<option value="Pune Airport">Pune Airport</option>
									<option value="Mumbai Airport 1">Mumbai Airport 1</option>
									<option value="Mumbai Airport 2">Mumbai Airport 2</option>
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
									<option>-- Select your option --</option>
									<option value="Train Station 1">Train Station 1</option>
									<option value="Train Station 2">Train Station 2</option>
									<option value="Train Station 3">Train Station 3</option>
								</select>
							</div>

							
							<div class="form-group">
								<label>Train Number</label>
								<input type="text" name="drop_train_no" class="form-control" placeholder="Enter train number">
							</div>
						</div>


						<div id="drop_bus" class="hidden">
						
							<div class="form-group">
								<label>Choose train station</label>
								<select name="drop_bus_station" class="form-control">
									<option>-- Select your option --</option>
									<option value="Bus Station 1">Bus Station 1</option>
									<option value="Bus Station 2">Bus Station 2</option>
									<option value="Bus Station 3">Bus Station 3</option>
								</select>
							</div>

						</div>

						<div class="form-group">
							<label>Pick up date</label>
							<input type="date" name="pick_up_date" required class="form-control" >
						</div>

						<div class="form-group">
							<label>Pick up time</label>
							<input type="time" name="pick_up_time" required class="form-control" >
						</div>

						<div class="form-group">
							<label>Drop date</label>
							<input type="date" name="drop_date" required class="form-control" >
						</div>

						<div class="form-group">
							<label>Drop time</label>
							<input type="time" name="drop_time" required class="form-control" >
						</div>


						<div class="form-group">
							<label>Contact Number</label>
							<input type="text" name="phone" required class="form-control" >
						</div>


						<div class="form-group">
							
							<input type="submit" class="btn btn-success" value="Get Quote" >
						</div>





					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



@section('js')

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
</script>

@endsection