<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
 {
   	protected $table = 'booking';
    protected $guard = [];

    protected $fillable = ['booking_code','partner_id','user_id'];
    
}
