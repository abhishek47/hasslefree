<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Mail\NewBookingCreated;
use App\Mail\BookingCancelled;

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
        
        $data = $request->all();

        $data['verification_otp'] = mt_rand(10000, 99999);
        
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

        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        // $booking->price = $basePrice;

        $basePrice = $basePrice + ($basePrice * (12/100)); // GST

        $booking->distance = $distance;


        $booking->price = ceil($basePrice);

        if(auth()->user()->bookings()->count() == 1 && (auth()->user()->referral_code != null || auth()->user()->referral_code != ''))
        {
            $discount = ceil($booking->price * (10/100));
            $booking->discount_amount = $discount;
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


        $distance = $booking->distance;

        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $cgst = ($basePrice * (6/100)); // GST

        $sgst = ($basePrice * (6/100)); // GST

        $invoice = \PDF::loadView('bookings.download', compact('booking', 'distance', 'cgst', 'sgst','basePrice'));

        $invoiceData = $invoice->output();
        
        $message = new NewBookingCreated($booking);

        $message->attachData($invoiceData, 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);

        \Mail::to(auth()->user())->send($message);

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
       
        

        $distance = $booking->distance;


        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $cgst = ($basePrice * (6/100)); // GST

        $sgst = ($basePrice * (6/100)); // GST

       

        return view('bookings.print', compact('booking', 'distance', 'cgst', 'sgst','basePrice'));
    }


    public function download(Booking $booking)
    {

        

        $distance = $booking->distance;


        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $cgst = ($basePrice * (6/100)); // GST

        $sgst = ($basePrice * (6/100)); // GST

        

        return view('bookings.download', compact('booking', 'distance', 'cgst', 'sgst','basePrice'));

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

         \Mail::to(auth()->user())->send(new BookingCancelled($booking));

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

        \Mail::to(auth()->user())->send(new BookingCancelled($booking));

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
