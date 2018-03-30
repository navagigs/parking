<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
 {
   	protected $table = 'category';
    protected $guard = [];

    protected $fillable = ['name','type','description','image','icon'];
    
}
