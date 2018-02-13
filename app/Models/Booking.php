<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one

class Booking extends Model
{
    use CrudTrait;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'bags_count', 'special', 'pick_up_type', 'pick_up_from', 'drop_to_type', 'drop_to', 'pick_up_airport_id', 
        'pick_up_airport_terminal', 'pick_up_flight_number', 'pick_up_train_station_id', 'pick_up_train_no', 'pick_up_train_coach', 'pick_up_train_seat', 'pick_up_train_time' ,'pick_up_bus_station_id', 'drop_airport_id', 
        'drop_airport_terminal', 'drop_flight_number', 'drop_train_station_id', 'drop_train_no', 'drop_train_coach', 'drop_train_seat', 'drop_train_time', 'drop_bus_station_id', 'pick_up_date', 'pick_up_time', 'drop_date', 'drop_time', 'phone'
    ];



    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function pickupBus()
    {
        return $this->belongsTo(BusStation::class, 'pick_up_bus_station_id');
    }

     public function dropBus()
    {
        return $this->belongsTo(BusStation::class, 'drop_bus_station_id');
    }

    public function pickupTrain()
    {
        return $this->belongsTo(TrainStation::class, 'pick_up_train_station_id');
    }

     public function dropTrain()
    {
        return $this->belongsTo(TrainStation::class, 'drop_trian_station_id');
    }

    public function pickupAirport()
    {
        return $this->belongsTo(Airport::class, 'pick_up_airport_id');
    }

     public function dropAirport()
    {
        return $this->belongsTo(Airport::class, 'drop_airport_id');
    }


}
