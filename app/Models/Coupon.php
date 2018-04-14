<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Coupon extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [ 'code', 'promo_text', 'discount_type', 'discount',  'valid_from', 'valid_through', 'min_order'];
    


    public function getDiscountTypeTextAttribute()
    {
        return $this->discount_type == 0 ? 'Flat' : 'Percentage';
    }
}
