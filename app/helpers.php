<?php


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
		return '<b><i  class="fa fa-building text-success"></i> In Warehouse.</b>
				';
	}

	else if($status == 4)
	{
		return '<b><i  class="fa fa-truck text-success"></i> In Transit.</b>
				';
	}

	else if($status == 5)
	{
		return '<b><i class="fa fa-thumbs-up text-success"></i> Luggage Delivered.</b>
				';
	}


}

function getTime($value)
{

	 $timings = ['09:00 AM - 10:00 AM','10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM', '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM' ];
                                        
		
	 return $timings[$value-1];

}

function getStatusString($value)
{

	if($value == -1)
	{
		return 'Cancelled';
	} 
	else {
		 $statuses = ['Created', 'Scheduled Pickup', 'Luggage Picked', 'In Warehouse', 'In Transit', 'Luggage Delivered' ];
                                        
		
	 return $statuses[$value];
	}
	

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


function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}