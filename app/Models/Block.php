<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
 {
   	protected $table = 'block';
    protected $guard = [];

    protected $fillable = ['floor_id','blocktype_id','name','description'];
    
	public function blocktype() {
		return $this->belongsTo('App\Models\Block_type', 'blocktype_id');
	}
}
