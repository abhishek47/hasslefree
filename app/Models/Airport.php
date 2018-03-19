<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one

class Airport extends Model
{
	use CrudTrait;

    protected $guarded = [];

    protected $appends = ['key'];	

    public function getKeyAttribute()
    {
    	return $this->id;
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }


    
}
