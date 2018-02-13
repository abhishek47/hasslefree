<?php


function getStatus($status)
{
	if($status == 0)
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

function getDistance($addressFrom, $addressTo){
    //Change address format
    $formattedAddrFrom = str_replace(' ','%20',$addressFrom);
    $formattedAddrTo = str_replace(' ','%20',$addressTo);
    
    //Send request and receive json data
    $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$formattedAddrFrom."&destinations=".$formattedAddrTo."&key=AIzaSyDul5sDHezP3kN2bCzJDgI2MYzMYqy4XIM");
            $data = json_decode($api);
            dd($data);
       return ($data->rows[0]->elements[0]->distance->value / 1000);
}


function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}