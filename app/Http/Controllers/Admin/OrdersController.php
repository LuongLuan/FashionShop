<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\orders;
use App\order_detail;
use App\user;

class OrdersController extends Controller
{


	public function order(){
		$order = orders::orderby('CreateTime','desc')->paginate(7);

    	return view('admin.order.order',compact('order'));
	}
   public function orderDetail($o_id){
   		$order = orders::where('Id',$o_id)->first();
   		$o_detail = order_detail::where('OrderId',$o_id)->get();

   		return view('admin.order.order_detail',compact('o_detail','order'));
   }
   public function ActiveOrder(Request $req,$o_id){
      switch ($req->stt) {
         case '0':
            $o = orders::where('Id',$o_id)->update(['Status' => $req->stt]);
            break;
         case '1':
            $o = orders::where('Id',$o_id)->update(['Status' => $req->stt]);
            break;
         case '2':
            $o = orders::where('Id',$o_id)->update(['Status' => $req->stt]);
            break;
         
         default:
            
            break;
      }
	   //$o = orders::where('Id',$o_id)->update(['Status' => 1]);
	   return redirect()->back()->with('message','Lưu thành công!');
   }
   //Xóa đơn hàng
   public function deleteOrder($id){
      $o = orders::where('Id',$id)->delete();
      $o_detail = order_detail::where('OrderId',$id)->delete();
      return redirect()->route('order')->with('message','Xóa thành công!');
   }
}
