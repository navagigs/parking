<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
 {
   	protected $table = 'media';
    protected $guard = [];

    protected $fillable = ['partner_id','type','description','image'];
    
	public function partner() {
		return $this->belongsTo('App\Models\Partner', 'partner_id')->where('status','=','active');
	}
}
