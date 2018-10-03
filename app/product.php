<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    public $timestamps = false;

    public function categories(){
    	return $this.belongsTo('App\categories','CategoryId','Id');
    }
    public function order_detail(){
    	return $this.hasMany('App\order_detail','ProductId','Id');
    }
    public function supplies(){
    	return $this.belongsTo('App\supplies','SupplyId','Id');
    }

}
