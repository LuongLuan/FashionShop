<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
	
   	protected $table = 'orders';

    public function order_detail(){
    	return $this.belongsTo('App\order_detail','OrderId','Id');
    }
    public function customer(){
    	return $this.belongsTo('App\customer','IdCustomer','Id');
    }
}
