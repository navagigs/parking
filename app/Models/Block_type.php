<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block_type extends Model
 {
   	protected $table = 'block_type';
    protected $guard = [];

    protected $fillable = ['size','partner_id','price'];
    
}
