<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table = 'order_detail';

    public function orders(){
    	return $this.belongsTo('App\orders','OrderId','Id');
    }
     public function product(){
    	return $this.belongsTo('App\product','ProductId ','Id');
    }
}
