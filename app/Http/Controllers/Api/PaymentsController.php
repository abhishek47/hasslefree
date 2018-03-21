<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\NewBookingCreated;
use Softon\Indipay\Facades\Indipay;  
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
	
    
    public function addMoney(Request $request, Booking $booking)
	{
          
          $user = User::where('api_token', request('api_token'))->first();


		  $bookingId = $booking->id;

		  $amount = round($booking->total, 2);

           $parameters = [
      
            'tid' => '1233221223322',
            
            'order_id' => '1232212',
            
            'amount' => $amount,
            'purpose' => $bookingId,
            'buyer_name' => $user->name,
            'email' => $user->email,
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
        	return view('payments.failure');
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


        flash('Payment was succesfully made!')->success();

        return redirect('/bookings/' . $booking->id);
    }  




}
