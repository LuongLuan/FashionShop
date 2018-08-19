<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Auth;
use App\product;
use App\categories;
use App\subcategory;
use App\orders;
use App\order_detail;
use App\supplies;

class CategoriesController extends Controller
{
    public function category(){
    	$cate = categories::all();

    	return view('admin/categories',compact('cate'));
    }
}
