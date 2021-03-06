<?php

namespace App\Models;

use App\User;
use App\Models\Employee;
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
        'drop_flight_number', 'drop_train_station_id', 'drop_train_pnr',  'drop_bus_station_id', 'pick_up_date', 'pick_up_time', 'drop_date', 'drop_time', 'phone', 'pick_up_address', 'drop_address', 'status', 'verification_otp', 'pick_up_emp', 'delivery_emp', 'customer_name', 'customer_phone'
    ];

    protected $appends = ['key', 'offer_amount', 'coupon_promo_text'];





    public function openPreview($crud = false)
    {
        return '<a class="btn btn-xs btn-success" target="_blank" href="/bookings/' . $this->id . '/download' . '" data-toggle="tooltip" title="View/Download Booking Receipt"><i class="fa fa-file-text"></i> Receipt</a>';
    }

    public function openEdit($crud = false)
    {
        return '<a class="btn btn-xs btn-info" target="_blank" href="/bookings/' . $this->id . '/edit' . '" data-toggle="tooltip" title="Update Booking Details"><i class="fa fa-save"></i> Update</a>';
    }

    public function newBooking($crud = false)
    {
        return '<a class="btn btn-md btn-warning" href="/bookings/new" data-toggle="tooltip" title="Add New Booking"><i class="fa fa-plus"></i> New Booking</a>';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pickupEmployee()
    {
        return $this->belongsTo(Employee::class, 'pick_up_emp');
    }

    public function deliveryEmployee()
    {
        return $this->belongsTo(Employee::class, 'delivery_emp');
    }



      public function getKeyAttribute()
    {
        return $this->id;
    }

    public function getCustomerNameAttribute()
    {
        return isset($this->attributes['customer_name']) && $this->attributes['customer_name'] != '' ? $this->attributes['customer_name'] : isset($this->user) ? $this->user->name : 'Guest Customer';
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






    public function getOfferAmountAttribute()
    {
        if($this->discount_amount == null)
        {
            return ceil($this->price);
        }

        return ceil($this->price - $this->discount_amount) ;
    }

     public function getCouponPromoTextAttribute()
    {
        if($this->discount_amount == null)
        {
            return '';
        }

        return 'Congratulations! A Coupon is applied. You saved Rs. ' . ceil($this->discount_amount);
    }



    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : 'NOT FOUND';
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