<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Requests;
use DB;
use App\product;
use App\categories;
use Cart,Auth,Datetime;
use App\orders;
use App\order_detail;
use App\subcategory;
use App\menu;


class PageController extends Controller
{
    public function getHome(){
        $featured  = product::inRandomOrder()->where('TypeId',1)->get();
    	$newProduct = product::inRandomOrder()->where('TypeId',2)->get();
    	$saleProduct = product::inRandomOrder()->where('TypeId',3)->get();        
    	return view('page.home',compact('featured','newProduct',
            'saleProduct'));
    }
    //Chi tiết sản phẩm
    public function productDetail(Request $req){
        $detail = product::where('Id',$req->id)->first();

    	return view('page.product_detail',compact('detail'));
    }

    //Lấy sp theo chuyên mục
    public function getproCate( Request $req, $id){
        $min=$req->input('minPrice');
        $max=$req->input('maxPrice');
        $req->session()->put('id', $id);
        $idd = $req->session()->get('id');
        if ($max != 0) {
            $get_pCate = product::whereBetween('Price', [$min, $max])->where('CategoryId', $id)->paginate(9);
        }else{
            $get_pCate = product::where('CategoryId', $id)->paginate(9);
        }
        
        $subCate = subcategory::where('CategoryId',$id)->get();
        $featured  = product::inRandomOrder()->where('TypeId',1)->take(4)->get();

        return view('page.getproduct_cate',compact('get_pCate','subCate','featured','idd'));
    }
    
    //Lấy sp theo sub chuyên mục
    public function getProduct(Request $req, $id){
        $min=$req->input('minPrice');
        $max=$req->input('maxPrice');
        
        $featured  = product::inRandomOrder()->where('TypeId',1)->take(4)->get();
        $req->session()->put('id',$id);
        $idd=$req->session()->get('id');
        if ($max != 0) {
            $getpro_sub = product::whereBetween('Price', [$min, $max])->where('SubCategoryId',$id)->paginate(9);
        }else{
            $getpro_sub = product::where('SubCategoryId',$id)->paginate(9);
        }
        return view('page.getproduct',compact('getpro_sub','idd','featured'));
    }
    //Tìm kiếm
    public function search(Request $request,$id = null){
        $request->session()->put('key', $_GET['key_word']);
        $value = $request->session()->get('key');
            //$_SESSION['key'] = $_GET['key_word'];
            if ($id == null) {
                $searchPro = product::where('Name', 'LIKE', '%' . $value . '%')->paginate(5);
            }
            else{
                $searchPro = product::where('Name', 'LIKE', '%' . $value . '%')->where('CategoryId',$id)->paginate(5);
            }
            return view('page.product_search',compact('searchPro','value'));
    }
    //Giỏ hàng
    public function cart(){
    	return view('page.cart');
    }
    //Thêm vào giỏ
    public function addCart($id){
        $pro = product::where('Id',$id)->first();
        Cart::add([
            'id'=>$pro->Id,
            'name'=>$pro->Name,
            'price'=>$pro->Price-($pro->Price*$pro->Percent_off/100),
            'qty'=> 1,
            'options'=>['img' => $pro->Image1, 'percent_off' => $pro->Percent_off]
        ]);
        // $count = Cart::count();
        // return response()->json([
        //     'count' => $count
        // ]);
        return redirect()->route('gio-hang');
    }

    //Update giỏ 
    public function update($id,$qty,$dk){
        if ($dk == 'up') {
            $qt=$qty + 1;
            Cart::update($id, $qt);
        }elseif ($dk == 'down') {
            $qt=$qty - 1;
            Cart::update($id, $qt);
        }
        return redirect()->route('gio-hang');
    }

    //Xóa sp
    public function delete($id){
        Cart::remove($id);
        $total = Cart::total();
        // return response()->json([
        //     'total' => $total
        // ]);
        return redirect()->route('gio-hang');
    }

    //Xóa giỏ
    public function deleteCart(){
        Cart::destroy();
        return redirect()->route('gio-hang');
    }
        //checkout
    public function checkout(){
        if (Auth::check()) {
            return view('page.checkout');
        }
        else{
            return view('auth.login');
            }
        }
        //Đặt hàng
        public function placeOrder(){
            //Add order
            $order = new orders();
            $order->CustomerId = Auth::user()->id;
            $order->Address = Auth::user()->address;
            $order->Phone = Auth::user()->phone;
            $order->Email = Auth::user()->email;
            $order->Status = 0;
            $order->Createtime = new datetime;
            $order->Cart_total = Cart::total();
            $order->save();
            
            //Add order detail
            foreach (Cart::content() as $row) 
            {
                $order_detail = new order_detail();
                $order_detail->OrderId = $order->id;
                $order_detail->ProductId = $row->id;
                $order_detail->Quantity = $row->qty;
                $order_detail->Price = $row->price * $row->qty;
                $order_detail->save();
            }
            Cart::destroy();
            return redirect()->route('gio-hang')->with('message','Đơn hàng của bạn đã được gửi đi');
        }
    
}
