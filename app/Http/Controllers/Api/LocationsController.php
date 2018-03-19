<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\TrainStation;
use App\Models\BusStation;
use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class LocationsController extends Controller
{


    public function getLocations()
    {
         return response(['trains' => TrainStation::all()->toArray(), 'buses' => BusStation::all()->toArray(), 'airports' => Airport::all()->toArray() ], 200);
    }


    public function getTrains()
    {
         return response(['data' => TrainStation::all()->toArray()], 200);
    }


    public function getBuses()
    {
         return response(['data' => BusStation::all()->toArray()], 200);
    }


    public function getAirports()
    {
         return response(['data' => Airport::all()->toArray()], 200);
    }


    
   

    


   
}
