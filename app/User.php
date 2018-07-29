<?php

namespace App;

use App\Models\Booking;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'referral_code', 'refer_code'
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

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
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


    public function sendToken()
    {

      $token = mt_rand(10000, 99999);
      //$token = 12345;
      session(['token' => $token]);

      $message = "Your Droghers verification OTP is " . $token;
      sendSMS($this->phone, $message);

      return $token;

    }

    public function validateToken($token)
    {

             $validToken = session('token');



          if($token == $validToken) {
            session()->forget('token');
            auth()->login($this);
            return true;
          } else {
            return false;
          }
    }

}
