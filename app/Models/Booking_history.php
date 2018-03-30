<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking_history extends Model
 {
   	protected $table = 'booking_history';
    protected $guard = [];

    protected $fillable = ['booking_code','partner_id','user_id'];
    
    public function partner() {
        return $this->belongsTo('App\Models\Partner', 'partner_id');
    }
}
