<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one

class Airport extends Model
{
	use CrudTrait;

    protected $guarded = [];


    public function city()
    {
    	return $this->belongsTo(City::class);
    }
    
}
