@extends('layouts.master')

@section('content')
<div class="mini-spacer bg-light" style="min-height: 1000px;">

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-shadow">
                

                <div class="card-body">
                    <h3 class="panel-heading">My Bookings</h3>
                    <br>
                    <table class="table table-hover text-dark"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th>Pick up on</th> 
                                <th>Drop on</th> 
                                <th>Status</th>
                                <th></th>
                            </tr> 
                        </thead> 

                        <tbody> 
                        @foreach(auth()->user()->bookings()->latest()->get() as $index => $booking)
                            <tr> 
                                <th scope="row">{{ $index+1 }}</th> 
                                <td>{{ $booking->pick_up_date }}</td> 
                                <td>{{ $booking->drop_date }}</td> 
                                <td>{!! getStatus($booking->status) !!}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/bookings/{{$booking->id}}">View</a>
                                </td>
                            </tr> 
                          @endforeach 

                           
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection