<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'bags_count', 'special', 'pick_up_type', 'pick_up_from', 'drop_to_type', 'drop_to', 'pick_up_airport_name', 
        'pick_up_airport_terminal', 'pick_up_flight_number', 'pick_up_train_station', 'pick_up_train_no', 'pick_up_bus_station', 'drop_airport_name', 
        'drop_airport_terminal', 'drop_flight_number', 'drop_train_station', 'drop_train_no', 'drop_bus_station', 'pick_up_date', 'pick_up_time', 'drop_date', 'drop_time', 'phone'
    ];



    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
