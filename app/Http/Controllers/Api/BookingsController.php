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

         if(!$user)
         {

            return response(['status'=> 'failed', 'message' => 'Please login again!', 'data' =>[]], 200);
         }

        $data = $request->all();


     $data['status'] = 0;


        $data['verification_otp'] = mt_rand(10000, 99999);

        $data['phone'] = auth()->user()->phone;

        $booking = $user->bookings()->create($data);

        if(!$booking)
        {
            return response(['status'=> 'failed', 'message' => 'There was some problem! Please try again.', 'data' =>[]], 200);
        }

        $distance = getDistance($booking->pick_location, $booking->drop_location);

        // $distance = 7.23;

        if($distance <= config('settings.base_km'))
        {
            $booking->base_price = config('settings.base_price');
        } else {
            $booking->base_price = config('settings.base_price') + (config('settings.base_km_multiple') * ($distance - config('settings.base_km')));
        }

        if($booking->bags_count <= config('settings.base_bags'))
        {
            $booking->handling_charges = 0;
        } else {
            $booking->handling_charges = config('settings.handling_charges') * ($booking->bags_count - config('settings.base_bags'));
        }

        $booking->distance = $distance;

        $booking->subtotal = $booking->base_price + $booking->handling_charges;

        $booking->subtotal = round($booking->subtotal, 2);

        $booking->gst = $booking->subtotal * (config('settings.gst')/100);

        $booking->gst = round($booking->gst, 2);

        $booking->price = $booking->subtotal + $booking->gst;

        $booking->price = ceil(round($booking->price, 2));

        if($user->bookings()->count() == 1 && ($user->referral_code != null || $user->referral_code != ''))
        {
            $discount = ceil(config('settings.base_price') * (10/100));
            $booking->discount_amount = round($discount, 2);
            $booking->referral_applied = 1;
        }

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

    public function confirmWithCOD(Booking $booking)
    {

        $user = User::where('api_token', request('api_token'))->first();

        if($user == null)
        {
            return response(['status'=> 'failed', 'message' => 'Please try again!', 'data' => []], 200);
        }

        $booking->status = 1;

        $booking->save();



        $message = new NewBookingCreated($booking);


        //\Mail::to($user)->send($message);

        sendSMS($booking->phone, 'Droghers Luggage Travel booking confirmed and scheduled for pickup. Your Booking ID is ' . $booking->id);


        sendSMS('9582873902', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('7838233012', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('9873431797', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);


        return response(['status'=> 'success', 'message' => 'Pickup Scheduled!', 'data' => []], 200);

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

        //\Mail::to($user)->send(new BookingCancelled($booking));

        sendSMS( $booking->phone, 'Droghers Luggage Travel booking with ID ' . $booking->id . ' has been cancelled!');

        sendSMS('9582873902', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');
        sendSMS('7838233012', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');
        sendSMS('9873431797', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');


        return response(['status'=> 'success', 'message' => 'Booking cancelled!', 'data' => []], 200);
    }



    public function estimate()
    {
         $distance = request('distance');
         $bags_count = request('bags_count');

         $base_price = 0;
         $handling_charges = 0;

        if($distance <= config('settings.base_km'))
        {
            $base_price = config('settings.base_price');
        } else {
            $base_price = config('settings.base_price') + (config('settings.base_km_multiple') * ($distance - config('settings.base_km')));
        }

        if($bags_count <= config('settings.base_bags'))
        {
            $handling_charges = 0;
        } else {
            $handling_charges = config('settings.handling_charges') * ($bags_count - config('settings.base_bags'));
        }

        $subtotal = $base_price + $handling_charges;

        $subtotal = round($subtotal, 2);

        $gst = $subtotal * (config('settings.gst')/100);

        $gst = round($gst, 2);

        $price = $subtotal + $gst;

        $price = round($price, 2);

        return response(['status'=> 'success', 'message' => 'Price estimated!', 'estimate' => ceil($price)], 200);

    }



}
