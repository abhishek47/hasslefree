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
      
      $amount = 0;
      
      if($booking->coupon_applied != null)
      {
        $amount = round($booking->offer_amount, 2);
      } else {
        $amount = round($booking->total, 2);
      }
		  

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

   




}
