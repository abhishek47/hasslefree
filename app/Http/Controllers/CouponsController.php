<?php

namespace App\Http\Controllers;

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

                        return back();

                    } else {

                       flash('The minimum booking amount for this coupon is ' . $coupon->min_order)->warning();
                       return back();
                    }



            } else {

                flash('The given coupon is already expired!')->warning();
                return back();

            }

        } else {
           flash('The given coupon is doesn\'t exist!')->warning();
           return back();
        }


    }

    public function remove(Booking $booking, $code)
    {
        $booking->coupon_applied = null;

        $booking->discount_amount = null;

        $booking->save();

        return back();
    }
}
