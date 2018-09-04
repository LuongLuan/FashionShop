<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplies extends Model
{
    protected $table = 'supplies';

    public function categories(){
    	return $this.hasMany('App\categories','SupplyId','Id');
    }
    public function product(){
    	return $this.hasMany('App\product','SupplyId ','Id');
    }
}
