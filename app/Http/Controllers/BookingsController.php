<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $booking = auth()->user()->bookings()->create($request->all());

        if($booking->pick_up_type == 0)
        {
            $location1 = $booking->pickupAirport->location;
        } else if($booking->pick_up_type == 1){
            $location1 = $booking->pickupTrain->location;
        } else if($booking->pick_up_type == 2){
            $location1 = $booking->pickupBus->location;
        } else {
            $location1 = $booking->pick_up_from;  
        }

        if($booking->drop_to_type == 0)
        {
            $location2 = $booking->dropAirport->location;
        } else if($booking->drop_to_type == 1){
            $location2 = $booking->dropTrain->location;
        } else if($booking->drop_to_type == 2){
            $location2 = $booking->dropBus->location;
        } else {
          $location2 = $booking->drop_to;
        }

        $distance = getDistance($location1, $location2);

        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $basePrice = $basePrice + ($basePrice * (18/100)); // GST

        $booking->price = $basePrice;

        $booking->save();

        flash('Your booking was created successfully! Proceed with payment details.')->success();

        return redirect('/bookings/' . $booking->id );


    }


    public function confirmWithCOD(Booking $booking)
    {
        $booking->status = 1;

        $booking->save();

        flash('Your booking was confirmed & scheduled!')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();


        flash('Booking was cancelled successfully!')->success();

        return redirect('/home');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function cancel(Booking $booking)
    {
        $booking->status = -1;

        $booking->save();

        if($booking->payment_made)
        {
           flash('Booking was cancelled successfully! Add your payment details to initiate refund!')->success();
        } else {
            flash('Booking was cancelled successfully!')->success();
        }

        return redirect('/bookings/' . $booking->id);
    }
}
