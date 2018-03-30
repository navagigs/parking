<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
 {
   	protected $table = 'partner';
    protected $guard = [];
    protected $fillable = ['category_id','email','password','name','description','address','phone','website','logo','latittude','longtitude'];

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id')->where('status','=','active');
    }
    public function blocktype() {
        return $this->belongsTo('App\Models\Block_type', 'partner_id');
    }
    public function city() {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
