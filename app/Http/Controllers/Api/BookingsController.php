<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\NewBookingCreated;
use App\Mail\BookingCancelled;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $booking = auth()->user()->bookings()->create($request->all());

        if(!$booking)
        {
            return response(['status'=> 'failed', 'message' => 'There was some problem! Please try again.', 'data' =>[]], 200);
        }

         /*  if($booking->pick_up_type == 0)
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
        */

       // $distance = getDistance($location1, $location2);

        $distance = 7.23;

        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $basePrice = $basePrice + ($basePrice * (18/100)); // GST

        $booking->distance = $distance;

        $booking->price = $basePrice;

        $booking->save();

       /* if($booking->distance > 40)
        {   
            flash('Your travel distance is more than 40Km! we take bookings above 40km distance only on call.')->warning();
        } else {
             flash('Your booking was successfully created, proceed with payment details!')->success();
        }
        */
       

        return response(['status'=> 'success', 'message' => 'Booking created successfully!', 'data' => $booking->toArray()], 200);

    }


   
}
