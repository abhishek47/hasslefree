<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\NewBookingCreated;
use App\Mail\BookingCancelled;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{


    public function index()
    {
         $user = User::where('api_token', request('api_token'))->first();

         $bookings = $user->bookings()->orderBy('created_at', 'DESC')->get();

         return response(['status' => 'success', 'message' => 'Bookings loaded successfully!', 'data' => $bookings->toArray()]);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        $user = User::where('api_token', request('api_token'))->first();

            return response(['status'=> 'success', 'message' => 'Booking created successfully!', 'data' => $user], 200);



        $booking = $request->user()->bookings()->create($request->all());

        if(!$booking)
        {
            return response(['status'=> 'failed', 'message' => 'There was some problem! Please try again.', 'data' =>[]], 200);
        }

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


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function cancel(Booking $booking)
    {
        $user = User::where('api_token', request('api_token'))->first();

        if($user == null)
        {
            return response(['status'=> 'failed', 'message' => 'Please try again!', 'data' => []], 200);
        }

        $booking->status = -1;

        $booking->save();

        \Mail::to(auth()->user())->send(new BookingCancelled($booking));

        return response(['status'=> 'success', 'message' => 'Booking cancelled!', 'data' => []], 200);
    }


   
}
