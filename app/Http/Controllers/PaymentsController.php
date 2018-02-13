<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }
    
    public function addMoney(Request $request, Booking $booking)
	{
		  $bookingId = $booking->id;

		  $amount = $booking->price;

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
        	return view('payments.failure');
        }
        
        $bookingId = $response->payment_request->purpose;

        $booking = Booking::findOrFail($bookingId);

        

        $booking->status = 1;

        $booking->payment_made = 1;

        $booking->save();



        flash('Payment was succesfully made!')->success();

        return redirect('/bookings/' . $booking->id);
    }  

}
