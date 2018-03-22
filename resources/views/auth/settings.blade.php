@extends('layouts.master')



@section('content')


<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 90px;">
		
	<div class="container">
		<div class="row">
		 <div class="col-md-8">	
			<div class="card card-shadow">
				<div class="card-body">
					<h3>Update Password</h3>
					<hr>
					<form method="post" class="text-dark" action="/password">
						{{ csrf_field() }}
						<div class="form-group"> 
							<label>Old Password</label>
							<input type="password" name="old_password"  class="form-control">
						</div>

						<div class="form-group"> 
							<label>New Password</label>
							<input type="password"  name="password"  class="form-control">
						</div>

						<div class="form-group"> 
							<label>Confirm New Password</label>
							<input type="password" name="password_confirmation"  class="form-control">
						</div>

						<div class="form-group"> 
							
							<input type="submit" value="Update Password" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>	
		 </div>	

		 <div class="col-md-4">
		 	<div class="card card-shadow">
				<div class="card-body text-dark">
					<h4>Notifications</h4>
					<hr>
					
					<p>Notification settings will come here..</p>
				</div>
			</div>
		 </div>
		</div>

	</div>	


</div>


@endsection