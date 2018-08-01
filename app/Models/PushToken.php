<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PushToken extends Model
{
    protected $table = 'push_tokens';

    protected $fillable = ['user_id', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
