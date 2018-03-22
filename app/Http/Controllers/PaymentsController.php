<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\NewBookingCreated;
use Softon\Indipay\Facades\Indipay;  

class PaymentsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('response');
    }
    
    public function addMoney(Request $request, Booking $booking)
	{
		  $bookingId = $booking->id;

		  $amount = round($booking->total, 2);

           $parameters = [
      
            'tid' => '1233221223322',
            
            'order_id' => '1232212',
            
            'amount' => $amount,
            'purpose' => $bookingId,
            'buyer_name' => \Auth::user()->name,
            'email' => \Auth::user()->email,
            'phone' => '9922367414',
            
          ];
 
          
          $order = Indipay::prepare($parameters);

          return Indipay::process($order);
	}

    public function response(Request $request)
    {
        // For default Gateway
        $response = Indipay::response($request);

        
        if(!$response->success)
        {
        	return redirect('/bookings/' . $booking->id . '/failed');
        }
        
        $bookingId = $response->payment_request->purpose;

        $booking = Booking::findOrFail($bookingId);

        

        $booking->status = 1;

        $booking->payment_made = 1;

        $booking->save();

        $distance = $booking->distance;

        $basePrice = ($distance * 10) + ($booking->bags_count * 12) + ($booking->bags_count * 10) + ($booking->bags_count * 7);

        $cgst = ($basePrice * (9/100)); // GST

        $sgst = ($basePrice * (9/100)); // GST

        $invoice = \PDF::loadView('bookings.download', compact('booking', 'distance', 'cgst', 'sgst','basePrice'));

        $invoiceData = $invoice->output();
        
        $message = new NewBookingCreated($booking);

        $message->attachData($invoiceData, 'invoice.pdf', 
                    [
                        'mime' => 'application/pdf',
                    ]);

        \Mail::to($booking->user)->send($message);

       sendSMS('91' . $booking->phone, 'Droghers Luggage Travel booking confirmed and scheduled for pickup. Your Booking ID is ' . $booking->id);


        flash('Payment was succesfully made!')->success();

        return redirect('/bookings/' . $booking->id);
    }  




}
