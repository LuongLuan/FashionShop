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
use App\user;

class CustomerController extends Controller
{
    public function customer(){
    	$cus = user::all();

    	return view('admin.customer',compact('cus'));
    }
}
