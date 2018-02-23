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
        'drop_airport_terminal', 'drop_flight_number', 'drop_train_station_id', 'drop_train_no', 'drop_train_coach', 'drop_train_seat', 'drop_train_time', 'drop_bus_station_id', 'pick_up_date', 'pick_up_time', 'drop_date', 'drop_time', 'phone', 'pick_up_address', 'drop_address', 'status'
    ];


    public function openPreview($crud = false)
    {
        return '<a class="btn btn-xs btn-success" target="_blank" href="/bookings/' . $this->id . '/download' . '" data-toggle="tooltip" title="View/Download Booking Receipt"><i class="fa fa-search"></i> View Details</a>';
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function getPaymentStatusAttribute()
    {
        return $this->payment_made == 0 ? 'Pending' : 'Received';
    }

    public function getBookingStatusAttribute()
    {
        return getStatusString($this->status);
    }

     public function refund()
    {
        return $this->hasOne(Refund::class);
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
        return $this->belongsTo(TrainStation::class, 'drop_train_station_id');
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
