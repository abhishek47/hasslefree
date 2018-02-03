<?php


function getStatus($status)
{

	if($status == 1)
	{
		return '<h3><b><i style="color: green;" class="fas fa-check-circle"></i> Pick up scheduled.</b></h3>
				<p>You will be getting status updates on your email!</p>';
	} 

	else if($status == 2)
	{
		return '<h3><b><i style="color: green;" class="fas fa-handshake"></i> Luggage Picked.</b></h3>
				<p>You will be getting status updates on your email!</p>';
	}

	else if($status == 3)
	{
		return '<h3><b><i style="color: green;" class="fas fa-building"></i> In Warehouse.</b></h3>
				<p>You will be getting status updates on your email!</p>';
	}

	else if($status == 4)
	{
		return '<h3><b><i style="color: green;" class="fas fa-truck"></i> In Transit.</b></h3>
				<p>You will be getting status updates on your email!</p>';
	}

	else if($status == 5)
	{
		return '<h3><b><i style="color: green;" class="fas fa-thumbs-up"></i> Luggage Dropped.</b></h3>
				<p>You will be getting status updates on your email!</p>';
	}


}


function getAddressType($index)
{
	$addressTypes = ['Airport', 'Train Station', 'Bus Station', 'Home', 'Hotel', 'Office'];

	return $addressTypes[$index];
}