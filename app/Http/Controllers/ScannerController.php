<?php

namespace App\Http\Controllers;

Use App\Models\Booking;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function scan(Booking $booking)
    {
    	if($booking->bags_scanned == $booking->bags_count)
    	{	

    		if($booking->status == 4)
    		{
    			return redirect('/bookings/manage/' . $booking->id);
    		} else {
    			return redirect('/bookings/manage/' . $booking->id . '/verify');
    		}
    	
    	
    	} else {
    		
    		$booking->bags_scanned = $booking->bags_scanned + 1;
    	
    		$booking->save();

    		if($booking->bags_scanned < $booking->bags_count)
    		{
    			return redirect('/bookings/manage/' . $booking->id);
    		} else {
				return redirect('/bookings/manage/' . $booking->id . '/verify');
    		}

    	
    	}
    }

    public function postVerify(Booking $booking)
    {
    	if($booking->verification_otp == request('otp'))
    	{
    		$booking->status = 4;

            $booking->payment_made = 1;

    		$booking->save();
    		
    		flash('The booking was successfully delivered!')->success();

             $invoice = \PDF::loadView('bookings.download', compact('booking'));

            $invoiceData = $invoice->output();
            
            $message = new \App\Mail\BookingStatusUpdated($booking);

            $message->attachData($invoiceData, 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ]); 

    		\Mail::to($booking->user)->send($message);

        	sendSMS($booking->phone, getStatusMessage($booking->id, $booking->status));

    	} else {
    		flash('The verification otp did not match! Please try again.')->error();
    	}

    	return redirect('/bookings/manage/' . $booking->id);
    }


    public function manage(Booking $booking)
    {
		return view('bookings.manage', compact('booking'));
    }

     public function verify(Booking $booking)
    {
		return view('bookings.verify', compact('booking'));
    }
}
