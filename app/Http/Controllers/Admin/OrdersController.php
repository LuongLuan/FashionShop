<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\orders;
use App\order_detail;

class OrdersController extends Controller
{
	public function order(){
		$order = orders::paginate(5);

    	return view('admin.order',compact('order'));
	}
   public function orderDetail($o_id){
   		$order = orders::where('Id',$o_id)->get();
   		$o_detail = order_detail::where('OrderId',$o_id)->get();

   		return view('admin.order_detail',compact('o_detail','order'));
   }
}
