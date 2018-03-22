@extends('layouts.master')



@section('content')


<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 90px;">
		
	<div class="container">
		<div class="row">
		 <div class="col-md-8">	
			<div class="card card-shadow">
				<div class="card-body">
					<form method="post" class="text-dark" action="/profile">
						{{ csrf_field() }}
						<div class="form-group"> 
							<label>Full Name</label>
							<input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
						</div>

						<div class="form-group"> 
							<label>E-mail Address</label>
							<input type="email" readonly="" name="email" value="{{ auth()->user()->email }}" class="form-control">
						</div>

						<div class="form-group"> 
							
							<input type="submit" value="Update Profile" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>	
		 </div>	

		 <div class="col-md-4">
		 	<div class="card card-shadow">
				<div class="card-body text-dark">
					<i class="fa fa-file-text"></i> &nbsp; <b class="font-medium">Bookings Made :</b> {{ auth()->user()->bookings()->count()  }} <br>

					<hr>

					<i class="fa fa-credit-card"></i> &nbsp; <b class="font-medium">Payments Made :</b> <i class="fa fa-inr"></i> {{ auth()->user()->bookings()->where('status', '>', 0)->sum('price')  }} 
				</div>
			</div>
		 </div>
		</div>

	</div>	


</div>


@endsection