<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = 'subcategory';

    public function categories(){
    	return $this.belongsTo('App\categories','CategoryId','Id');
    }
    public function product(){
    	return $this.hasMany('App\product','SubcategoryId','Id');
    } 
}
