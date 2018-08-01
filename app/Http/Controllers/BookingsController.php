<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Coupon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingCancelled;
use App\Mail\NewBookingCreated;

class BookingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('download');
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

        $data = $request->all();

        $data['verification_otp'] = mt_rand(10000, 99999);

        $data['phone'] = auth()->user()->phone;

        $booking = auth()->user()->bookings()->create($data);

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

        if(auth()->user()->bookings()->count() == 1 && (auth()->user()->referral_code != null || auth()->user()->referral_code != ''))
        {
            $discount = ceil(config('settings.base_price') * (10/100));
            $booking->discount_amount = round($discount, 2);
            $booking->referral_applied = 1;
        }

        $booking->save();

        if($booking->distance > 40)
        {
            flash('Your travel distance is more than 40Km! we take bookings above 40km distance only on call.')->warning();
        } else {
             flash('Your booking was successfully created, proceed with payment details!')->success();
        }



        return redirect('/bookings/' . $booking->id );


    }


    public function confirmWithCOD(Booking $booking)
    {
        $booking->status = 1;

        $booking->save();


      /*  $invoice = \PDF::loadView('bookings.download', compact('booking'));

        $invoiceData = $invoice->output();*/



       /* $message->attachData($invoiceData, 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]); */

        $message = new NewBookingCreated($booking);

      //  \Mail::to(auth()->user())->send($message);

        sendSMS( $booking->phone, 'Droghers Luggage Travel booking confirmed and scheduled for pickup. Your Booking ID is ' . $booking->id);

        sendSMS('9582873902', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('7838233012', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('9873431797', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);



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
        if($booking->distance > 40)
        {
            flash('Your travel distance is more than 40Km! we take bookings above 40km distance only on call.')->warning();
        }

        if($booking->coupon_applied != null)
        {
            $coupon = Coupon::where('code', $booking->coupon_applied)->first();
            return view('bookings.show', compact('booking', 'coupon'));
        }

        return view('bookings.show', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function print(Booking $booking)
    {

        return view('bookings.print', compact('booking'));
    }


    public function download(Booking $booking)
    {



        //$invoice = \PDF::loadView('bookings.download', compact('booking', 'distance', 'cgst', 'sgst','basePrice'));

        //return $invoice->download('invoice.pdf');

        return view('bookings.download', compact('booking'));

    }

    public function new()
    {
        return view('bookings.new');
    }

    public function storeNew(Request $request)
    {

        $user = User::where('phone', '=', request('customer_phone'))->first();
        if(!$user)
        {
             $refer_code = strtoupper(substr($user->name, 0, 3) . mt_rand(100, 999));
             $user = User::create(['name' => request('customer_name'), 'phone' => request('customer_phone'), 'refer_code' => $refer_code]);
        }

        $data = $request->all();

        $data['verification_otp'] = mt_rand(10000, 99999);

        $data['phone'] = $user->phone;

        $booking = $user->bookings()->create($data);

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


        $booking->status = 1;

        $booking->save();


        sendSMS( $booking->phone, 'Droghers Luggage Travel booking confirmed and scheduled for pickup. Your Booking ID is ' . $booking->id);

        sendSMS('9582873902', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('7838233012', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);
        sendSMS('9873431797', 'Droghers - You have received a new Booking. Booking ID is ' . $booking->id);

        \Alert::success('The booking was successfully created!')->flash();

        return redirect('/admin/bookings/');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
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
        $data = $request->all();

        //$data['verification_otp'] = mt_rand(10000, 99999);

        //$data['phone'] = auth()->user()->phone;

        $booking->update($data);

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

        if($booking->user->bookings()->count() == 1 && ($booking->user->referral_code != null || $booking->user->referral_code != ''))
        {
            $discount = ceil(config('settings.base_price') * (10/100));
            $booking->discount_amount = round($discount, 2);
            $booking->referral_applied = 1;
        }

        $booking->save();

        if($booking->distance > 40)
        {
            flash('The travel distance for the booking is more than 40Km!')->warning();
        } else {
             flash('The booking was updated successfully!')->success();
        }

        sendSMS($booking->user->phone, 'Your booking details for booking ID ' . $booking->id . ' has been updated.');
        return back();
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

      //   \Mail::to(auth()->user())->send(new BookingCancelled($booking));

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

       // \Mail::to(auth()->user())->send(new BookingCancelled($booking));

        if($booking->payment_made)
        {
           flash('Booking was cancelled successfully! Your amount will be credited to your bank account within next 48 working Hrs!')->success();
        } else {
            flash('Booking was cancelled successfully!')->success();
        }

        sendSMS($booking->phone, 'Droghers Luggage Travel booking with ID ' . $booking->id . ' has been cancelled!');

        sendSMS('9582873902', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');
        sendSMS('7838233012', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');
        sendSMS('9873431797', 'Droghers -  Booking ID ' . $booking->id . ' is cancelled!');

        return redirect('/bookings/' . $booking->id);
    }
}
