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
         'pick_up_flight_number', 'pick_up_train_station_id', 'pick_up_train_pnr', 'pick_up_bus_station_id', 'drop_airport_id', 
        'drop_flight_number', 'drop_train_station_id', 'drop_train_pnr',  'drop_bus_station_id', 'pick_up_date', 'pick_up_time', 'drop_date', 'drop_time', 'phone', 'pick_up_address', 'drop_address', 'status'
    ];

    protected $appends = ['key', 'pick_location', 'drop_location', 'insuarance', 'handling', 'labelling', 'taxable', 'gst', 'total', 'offer_amount'];
    


    public function openPreview($crud = false)
    {
        return '<a class="btn btn-xs btn-success" target="_blank" href="/bookings/' . $this->id . '/download' . '" data-toggle="tooltip" title="View/Download Booking Receipt"><i class="fa fa-file-text"></i> Receipt</a>';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

      public function getKeyAttribute()
    {
        return $this->id;
    }

    public function getpickLocationAttribute()
    {
        if($this->pick_up_type == 0)
        {
            $location1 = $this->pickupAirport->location;
        } else if($this->pick_up_type == 1){
            $location1 = $this->pickupTrain->location;
        } else if($this->pick_up_type == 2){
            $location1 = $this->pickupBus->location;
        } else {
            $location1 = $this->pick_up_from;  
        }

        return $location1;
    }

    public function getdropLocationAttribute()
    {
        if($this->drop_to_type == 0)
        {
            $location2 = $this->dropAirport->location;
        } else if($this->drop_to_type == 1){
            $location2 = $this->dropTrain->location;
        } else if($this->drop_to_type == 2){
            $location2 = $this->dropBus->location;
        } else {
          $location2 = $this->drop_to;
        }

        return $location2;
    }


    public function getInsuaranceAttribute()
    {
        return $this->bags_count * 12;
    }

    public function getHandlingAttribute()
    {
        return $this->bags_count * 10;
    }

    public function getLabellingAttribute()
    {
        return $this->bags_count * 7;
    }

    public function getTaxableAttribute()
    {
        return ($this->distance * 10) + $this->insuarance + $this->handling + $this->labelling;
    }


    public function getGstAttribute()
    {
        return $this->taxable * (18/100);
    }

    public function getTotalAttribute()
    {
        return $this->taxable + $this->gst;
    }

    public function getOfferAmountAttribute()
    {
        return ($this->taxable - $this->discount_amount) + $this->gst;
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