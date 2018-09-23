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

    				if($booking->subtotal > $coupon->min_order)
    				{
    					$booking->coupon_applied = $code;

    					if($coupon->discount_type != 2) {
                          $discount = $coupon->discount_type == 0 ? $coupon->discount : config('settings.base_price') * ($coupon->discount / 100);
                        } else {
                           $discount = $booking->subtotal - $coupon->discount;
                        }
    					$booking->discount_amount = $discount;

    					$booking->save();

    					return response(['status' => 'success', 'message' => 'Coupon was applied!', 'data' => $booking->toArray()]);

    				} else {

    					return response(['status'=> 'failed', 'message' => 'Minimum booking amount should be ' . $coupon->min_order, 'data' =>[]]);

    				}



    		} else {

    			return response(['status'=> 'failed', 'message' => 'Coupon is expired!', 'data' =>[]]);

    		}

    	} else {
    		return response(['status'=> 'failed', 'message' => 'Coupon doesn\'t Exist', 'data' =>[]]);
    	}


    }

    public function remove(Booking $booking, $code)
    {
    	$booking->coupon_applied = null;

		$booking->discount_amount = null;

    	$booking->save();

    	return response(['status'=> 'success', 'message' => 'Coupon is removed!', 'booking' => $booking->toArray()]);
    }
}
