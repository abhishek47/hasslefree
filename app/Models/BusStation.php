<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one

class BusStation extends Model
{
    use CrudTrait;

    public $guarded = [];

    public function city()
    {
    	return $this->belongsTo(City::class);
    }
}
