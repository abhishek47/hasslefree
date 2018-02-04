<?php


function getStatus($status)
{

	if($status == 1)
	{
		return '<b><i style="color: green;" class="fa fa-check-circle"></i> Pick up scheduled.</b>
				';
	} 

	else if($status == 2)
	{
		return '<b><i style="color: green;" class="fa fa-handshake"></i> Luggage Picked.</b>
				';
	}

	else if($status == 3)
	{
		return '<b><i style="color: green;" class="fa fa-building"></i> In Warehouse.</b>
				';
	}

	else if($status == 4)
	{
		return '<b><i style="color: green;" class="fa fa-truck"></i> In Transit.</b>
				';
	}

	else if($status == 5)
	{
		return '<b><i style="color: green;" class="fa fa-thumbs-up"></i> Luggage Dropped.</b>
				';
	}


}


function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}