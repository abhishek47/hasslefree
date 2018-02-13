<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one

class City extends Model
{
    use CrudTrait;

    protected $guarded = [];
}
