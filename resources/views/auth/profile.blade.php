@extends('layouts.master')



@section('content')


<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 90px;">

	<div class="container">
		<div class="row">
		 <div class="col-md-8">
			<div class="card card-shadow">
				<div class="card-body">
					<form method="POST" class="text-dark" action="/profile">
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

			<div class="card card-shadow">
				<div class="card-body text-dark">
					<i class="fa fa-coupon"></i> &nbsp; <b class="font-medium">Referral Code<br>

					<hr>

					<div class="alert alert-warning">
                    Share your referral code with your friends and for each user you refer earn upto 100 Rs. <img src="/images/paytm.png" style="width: 90px;display: inline;margin: 0;
   						 padding: 0;margin-left: -6px;"> cashback.
                    </div>

                    <input type="text" readonly="" name="refer_code" value="{{ auth()->user()->refer_code }}" style="text-align: center;font-weight: bold;" class="form-control">

                    <br>
                    <i class="fa fa-users"></i> &nbsp; <b class="font-medium">Referred Users : </b> {{ auth()->user()->referred / 10  }}


				</div>
			</div>
		 </div>


		</div>

	</div>


</div>


@endsection