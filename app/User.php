<?php

namespace App;

use App\Models\Booking;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one


class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; // <----- this

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function generateToken()
    {
        if($this->api_token == null) {
        $token = substr(Password::getRepository()->createNewToken(), 0, 58);
          if (User::where('api_token', '=', $token)->exists()) {
                //Model Found -- call self.
                self::generate($length, $modelClass, $fieldName);
            } else {
                $this->api_token = $token;
                $this->save();
            }
       }
        
    }
    
}
