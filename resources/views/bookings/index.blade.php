@extends('layouts.master')

@section('content')
<div class="mini-spacer bg-light" style="min-height: 1000px;padding-top: 90px;">

<div class="container">

    <h3 class="panel-heading m-b-30">My Bookings</h3>
    <div class="row">
        
        
        @if(count(auth()->user()->bookings()->latest()->get()) > 0)
        @foreach(auth()->user()->bookings()->latest()->get() as $index => $booking)
         
        <div class="col-md-4">
          
                <a href="/bookings/{{$booking->id}}" class="card card-shadow text-dark">
                    <div class="card-body">
                        <h3 class="card-title font-weight-medium">Booking #{{ $booking->id }}</h3>
                        <p class="text-success">{!! getStatus($booking->status) !!}</p>

                        <p><span style="font-weight: 500;">Pick up : </span>{{ $booking->pick_up_date }}</p>
                        <p><span style="font-weight: 500;">Drop on : </span>{{ $booking->drop_date }}</p>


                    </div>
                </a>
            
        </div>   

        @endforeach

        @else
         <div class="col-md-12">
            <p>You haven't made any bookings yet!</p>
             </div>   
        @endif

       </div>
    </div>
</div>

</div>
@endsection

