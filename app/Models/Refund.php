<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Refund extends Model
{
	use CrudTrait;
    protected $guarded = [];
}