<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	protected $table = 'floor';
	protected $guard = [];

	protected $fillable = ['partner_id','name','description','image'];

	public function partner() {
		return $this->belongsTo('App\Models\Partner', 'partner_id')->where('status','=','active');
	}
}
