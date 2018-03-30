<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
 {
   	protected $table = 'identitas';
    protected $guard = [];
    protected $fillable = ['name','description','keyword','address','phone','facebook','email','twitter','googleplus','youtube','location','favicon'];

}
