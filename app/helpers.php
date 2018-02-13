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

function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&sensor=false&key=AIzaSyDul5sDHezP3kN2bCzJDgI2MYzMYqy4XIM');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&sensor=false&key=AIzaSyDul5sDHezP3kN2bCzJDgI2MYzMYqy4XIM');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}


function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}