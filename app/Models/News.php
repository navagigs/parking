<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
 {
   	protected $table = 'news';
    protected $guard = [];

    protected $fillable = ['admin_id','category_id','title','description','image'];
    public function category() {
		return $this->belongsTo('App\Models\Category', 'category_id');
	}
}
