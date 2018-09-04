<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\orders;
use App\order_detail;
use App\user;

class OrdersController extends Controller
{
  public function dashboard(){
    //Đơn hàng chưa xử lý
    $or_noactive = orders::where('Status',false)->get();
    $count = count($or_noactive);
    //số khách hàng
    $cus =count(user::all());
    //Số đơn hàng
    $or = count(orders::all());

    return view('admin.dashboard',compact('count','cus','or'));
  }
	public function order(){
		$order = orders::paginate(5);

    	return view('admin.order',compact('order'));
	}
   public function orderDetail($o_id){
   		$order = orders::where('Id',$o_id)->first();
   		$o_detail = order_detail::where('OrderId',$o_id)->get();

   		return view('admin.order_detail',compact('o_detail','order'));
   }
   public function ActiveOrder($o_id){
	   $o = orders::where('Id',$o_id)->update(['Status' => 1]);
	   return redirect()->route('order');
   }
}
