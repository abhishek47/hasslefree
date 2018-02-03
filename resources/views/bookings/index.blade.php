@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Bookings</div>

                <div class="panel-body">
                    <table class="table table-hover"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th>Booking Date</th> 
                                <th>Pick up on</th> 
                                <th>Drop on</th> 
                                <th>Actions</th>
                            </tr> 
                        </thead> 

                        <tbody> 
                        @foreach(auth()->user()->bookings()->latest()->get() as $booking)
                            <tr> 
                                <th scope="row">{{ $booking->id }}</th> 
                                <td>{{ $booking->created_at }}</td> 
                                <td>{{ $booking->pick_up_date }}</td> 
                                <td>{{ $booking->drop_date }}</td> 
                                <td>
                                    <a class="btn btn-primary btn-xs" href="/bookings/{{$booking->id}}">View</a>
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
@endsection