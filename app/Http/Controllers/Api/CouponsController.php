<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    public function apply(Booking $booking, $code)
    {
    	

    	if(Coupon::where('code', $code)->exists())
    	{	
    		$coupon = Coupon::where('code', $code)->first();
    		if(check_in_range($coupon->valid_from, $coupon->valid_through, date('Y-m-d')))
    		{

    				if($booking->taxable > $coupon->min_order)
    				{
    					$booking->coupon_applied = $code;
    					
    					$discount = $coupon->discount_type == 0 ? $coupon->discount : $booking->taxable * ($coupon->discount / 100);
    					
    					$booking->discount_amount = $discount;
    					
    					$booking->save();	

    					return response(['status'=> 'success', 'message' => 'Coupon applied successfully', 'booking' => $booking], 200);
    				
    				} else {
    				
    					return response(['status'=> 'failed', 'message' => 'Minimum booking amount should be ' . $coupon->min_order, 'data' =>[]], 200);
    				
    				}
    				
    			
    			
    		} else {
    			
    			return response(['status'=> 'failed', 'message' => 'Coupon is expired!', 'data' =>[]], 200);
    		
    		}
    		
    	} else {
    		return response(['status'=> 'failed', 'message' => 'Coupon doesn\'t Exist', 'data' =>[]], 200);
    	}
    	

    }

    public function remove(Restaurant $restaurant, $code)
    {
    	$booking->coupon_applied = null;
		
		$booking->discount_amount = null;
    	
    	$booking->save();	

    	return response(['status'=> 'success', 'message' => 'Coupon is removed!', 'data' =>[]], 200);
    }
}
