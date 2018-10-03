<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    public function product(){
    	return $this.hasMany('App\product','CategoryId','Id');
    }
    public function supplies(){
    	return $this.belongsTo('App\supplies','SupplyId','Id');
    } 
}
