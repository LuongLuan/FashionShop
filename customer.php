<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
     protected $table = 'customer';

      public function orders(){
    	return $this.hasMany('App\order','IdCustomer','Id');
    }
}
