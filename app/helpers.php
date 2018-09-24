<?php

use App\Models\Booking;

function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}


function getStatus($status)
{
	if($status == -1)
	{
		return '<b class="text-danger"><i  class="fa fa-check text-danger"></i> Booking Cancelled.</b>
				';
	}

	else if($status == 0)
	{
		return '<b><i  class="fa fa-check text-success"></i> Booking Created.</b>
				';
	}

	else if($status == 1)
	{
		return '<b><i  class="fa fa-check-circle text-success"></i> Pick up scheduled.</b>
				';
	}

	else if($status == 2)
	{
		return '<b><i class="fa fa-handshake text-success"></i> Luggage Picked.</b>
				';
	}

	else if($status == 3)
	{
		return '<b><i  class="fa fa-truck text-success"></i> In Transit.</b>
				';
	}

	else if($status == 4)
	{
		return '<b><i class="fa fa-thumbs-up text-success"></i> Luggage Delivered.</b>
				';
	}


}

function getHalfTime($value)
{

	 $timings = [ '09:00 AM - 10:00 AM','10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM',
	 '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM',
	 '08:00 PM - 09:00 PM',  '09:00 PM - 10:00 PM' ];


	 return $timings[$value-1];

	  /*$timings = ['12:00 AM - 01:00 AM', '01:00 AM - 02:00 AM', '02:00 AM - 03:00 AM', '03:00 AM - 04:00 AM', '04:00 AM - 05:00 APM', '05:00 AM - 06:00 AM',
	 '06:00 AM - 07:00 AM', '07:00 AM - 08:00 AM', '08:00 AM - 09:00 AM', '09:00 AM - 10:00 AM','10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM',
	 '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM',
	 '08:00 PM - 09:00 PM',  '09:00 PM - 10:00 PM' ,  '10:00 PM - 11:00 PM', '11:00 PM - 12:00 AM'  ];


	 return $timings[$value-1];*/

}


function getTime($value)
{

	 $timings = ['12:00 AM - 01:00 AM', '01:00 AM - 02:00 AM', '02:00 AM - 03:00 AM', '03:00 AM - 04:00 AM', '04:00 AM - 05:00 APM', '05:00 AM - 06:00 AM',
	 '06:00 AM - 07:00 AM', '07:00 AM - 08:00 AM', '08:00 AM - 09:00 AM', '09:00 AM - 10:00 AM','10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM',
	 '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM',
	 '08:00 PM - 09:00 PM',  '09:00 PM - 10:00 PM' ,  '10:00 PM - 11:00 PM', '11:00 PM - 12:00 AM'  ];


	 return $timings[$value-1];

}

function getStatusString($value)
{

	if($value == -1)
	{
		return 'Cancelled';
	}
	else {
		 $statuses = ['Created', 'Scheduled Pickup', 'Luggage Picked', 'In Transit', 'Luggage Delivered' ];


	 return $statuses[$value];
	}


}

function getStatusMessage($id, $value)
{
	 $statuses = ['Created', 'Scheduled Pickup', 'Luggage Picked', 'In Transit', 'Luggage Delivered' ];

	if($value == -1)
	{
		return 'Your Droghers Booking with ID ' . $id . ' has been cancelled.';
	} else if($value == 2)
	{
		 return 'Booking ' . $id . '- ' . $statuses[$value] . '. Your delivery verification OTP is : ' . \App\Models\Booking::findOrFail($id)->verification_otp . ' Please save this OTP with you as it is needed while delivery.';
	}
	else {
		 $statuses = ['Created', 'Scheduled Pickup', 'Luggage Picked', 'In Transit', 'Luggage Delivered' ];


	 return 'Your Droghers Booking with ID ' . $id . ' status updated : ' . $statuses[$value];
	}


}

function getPickupMessage($id)
{
	 $booking = Booking::findOrFail($id);

	 return 'Your Booking ' . $id . ' is scheduled for pickup. '. $booking->pickupEmployee->dname .' ( '. $booking->pickupEmployee->phone .') will pickup your luggage.';
}

function getDeliveryMessage($id)
{
	 $booking = Booking::findOrFail($id);

	 return 'Your Booking ' . $id . ' is out for delivery. '. $booking->pickupEmployee->dname .' ( '. $booking->pickupEmployee->phone .') will deliver your luggage.';


}


function getDistance($addressFrom, $addressTo){
    //Change address format
    $formattedAddrFrom = str_replace(' ','%20',$addressFrom);
    $formattedAddrTo = str_replace(' ','%20',$addressTo);

    //Send request and receive json data
    $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$formattedAddrFrom."&destinations=".$formattedAddrTo."&key=AIzaSyDul5sDHezP3kN2bCzJDgI2MYzMYqy4XIM");

     $data = json_decode($api);

       return ($data->rows[0]->elements[0]->distance->value / 1000);
}

function sendSMS($number, $message)
{
	// Account details
	$apiKey = urlencode('PlfU4yW3uc8-Jva0w5EyzaBh3Pbnjye1QIaSBYnN47');

	// Message details

	$sender = urlencode('DROGHR');
	$message = rawurlencode($message);

 	$number = '91' . $number;

	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $number, "sender" => $sender, "message" => $message);

	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);

	//dd($response);
	// Process your response here
	return $response;
}



function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}


function check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}