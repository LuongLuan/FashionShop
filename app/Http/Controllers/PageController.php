<?php

namespace App\Http\Controllers;

use App\categories;
//use App\Http\Controllers\Requests;
use App\comment;
use App\orders;
use App\order_detail;
use App\product;
use App\subcategory;
use App\user;
use Auth;
use Cart;
use Datetime;
use Illuminate\Http\Request;

class PageController extends Controller {
	//Xuất trang chủ
	public function getHome() {
		$view_more = product::orderby('TotalView', 'desc')->get();
		$newProduct = product::inRandomOrder()->where('TypeId', 2)->get();
		$saleProduct = product::inRandomOrder()->where('TypeId', 3)->get();
		return view('page.home', compact('view_more', 'newProduct',
			'saleProduct'));
	}
	//Chi tiết sản phẩm
	public function productDetail(Request $req) {
		$detail = product::where('Id', $req->id)->first();
		product::where('Id', $req->id)->update(['TotalView' => $detail->TotalView + 1]);

		return view('page.product_detail', compact('detail'));
	}

	//Lấy sp theo chuyên mục
	public function getproCate(Request $req, $id) {
		if ($req->ajax() || 'NULL') {
			//Sắp xếp sản phẩm theo giá tăng giảm ...
			$order = $req->input('order');
			switch ($order) {
			case 'price-desc':
				$field = "Price";
				$dk = "desc";
				session(['slt0' => 'selected']);
				session()->forget(['slt1', 'slt2']);
				break;
			case 'price-asc':
				$field = "Price";
				$dk = "asc";
				session(['slt1' => 'selected']);
				session()->forget(['slt0', 'slt2']);
				break;
			case 'more-view':
				$field = "TotalView";
				$dk = "desc";
				session(['slt2' => 'selected']);
				session()->forget(['slt1', 'slt0']);
				break;

			default:
				$field = "Price";
				$dk = "desc";
				session(['slt0' => 'selected']);
				session()->forget(['slt1', 'slt2']);
				break;
			}
			//Lấy giá trị nhập vào
			$min = $req->input('minPrice');
			$max = $req->input('maxPrice');
			$req->session()->put('id', $id);
			$idd = $req->session()->get('id');
			//Nếu nhập giá trị max
			if ($max != 0) {
				$get_pCate = product::whereBetween('Price', [$min, $max])->where('CategoryId', $id)->get();
				$c_get_pCate = product::whereBetween('Price', [$min, $max])->where('CategoryId', $id)->get();
			} else {
				$get_pCate = product::where('CategoryId', $id)->where('CategoryId', $id)->orderby($field, $dk)->paginate(9);
				$c_get_pCate = product::where('CategoryId', $id)->get();
			}
			//title cate
			$_cate = categories::find($id);
			$subCate = subcategory::where('CategoryId', $id)->get();
			//Lấy sản phẩm nổi bật
			$featured = product::inRandomOrder()->where('TypeId', 1)->take(4)->get();

			return view('page.getproduct_cate', compact('get_pCate', 'subCate', 'featured', 'idd', '_cate', 'c_get_pCate', 'max'));
		}
	}

	//Lấy sp theo danh mục con
	public function getProduct(Request $req, $id) {
		//Sắp xếp theo giá tăng giảm
		$order = $req->input('order');
		switch ($order) {
		case 'price-desc':
			$field = "Price";
			$dk = "desc";
			session(['slt0' => 'selected']);
			session()->forget(['slt1', 'slt2']);
			break;
		case 'price-asc':
			$field = "Price";
			$dk = "asc";
			session(['slt1' => 'selected']);
			session()->forget(['slt0', 'slt2']);
			break;
		case 'more-view':
			$field = "TotalView";
			$dk = "desc";
			session(['slt2' => 'selected']);
			session()->forget(['slt1', 'slt0']);
			break;

		default:
			$field = "Price";
			$dk = "desc";
			session(['slt0' => 'selected']);
			session()->forget(['slt1', 'slt2']);
			break;
		}
		//Lấy giá trị nhập vào
		$min = $req->input('minPrice');
		$max = $req->input('maxPrice');
		//Lưu lại ID danh mục vào session
		$req->session()->put('id', $id);
		$idd = $req->session()->get('id');
		//Nếu có giá trị max thì xuất sp theo khoảng giá [min...max]
		if ($max != 0) {
			$getpro_sub = product::whereBetween('Price', [$min, $max])->where('SubCategoryId', $id)->paginate(9);
			$c_getpro_sub = product::whereBetween('Price', [$min, $max])->where('SubCategoryId', $id)->get();
		} else {
//ngược lại xuất sp theo ID danh mục
			$getpro_sub = product::where('SubCategoryId', $id)->orderby($field, $dk)->paginate(9);
			$c_getpro_sub = product::where('SubCategoryId', $id)->get();
		}

		//Sử dụng để xuất tên danh mục
		$_scate = subcategory::find($id);
		//SP nổi bật
		$featured = product::where('TypeId', 1)->take(4)->orderby('TotalView', 'desc')->get();
		//Lấy các danh mục con
		$sub_cate = subcategory::where('CategoryId', $_scate->CategoryId)->get();

		return view('page.getproduct', compact('getpro_sub', 'idd', 'featured', '_scate', 'sub_cate', 'c_getpro_sub', 'max'));
	}
	//Tìm kiếm
	public function search(Request $req) {
		//SP nổi bật
		$featured = product::inRandomOrder()->where('TypeId', 1)->take(4)->get();
		$key_word = $req->input('key_word');
		session(['kw' => $key_word]);
		$min = $req->input('minPrice');
		$max = $req->input('maxPrice');
		//Nếu có giá trị max thì xuất sp theo khoảng giá [min...max] và chứa từ trong session('kw')
		if ($max != 0) {
			$searchPro = product::where('Name', 'LIKE', '%' . Session('kw') . '%')->whereBetween('Price', [$min, $max])->paginate(9);
			$c_searchPro = product::where('Name', 'LIKE', '%' . Session('kw') . '%')->whereBetween('Price', [$min, $max])->get();
		} else {
			$searchPro = product::where('Name', 'LIKE', '%' . $key_word . '%')->paginate(9);
			$c_searchPro = product::where('Name', 'LIKE', '%' . $key_word . '%')->get();
		}
		return view('page.product_search', compact('searchPro', 'featured', 'max', 'c_searchPro'));
	}
	//Giỏ hàng
	public function cart() {
		return view('page.cart');
	}
	//Thêm vào giỏ
	public function addCart(Request $req, $id) {

		$qty = $req->input('qty');
		$pro = product::where('Id', $id)->first();
		Cart::add([
			'id' => $pro->Id,
			'name' => $pro->Name,
			'price' => $pro->Price * (1 - $pro->Percent_off / 100),
			'qty' => $qty ? $qty : 1,
			'options' => ['img' => $pro->Image1, 'percent_off' => $pro->Percent_off],
		]);
		// $count = Cart::count();
		// return response()->json([
		//     'count' => $count
		// ]);
		return redirect()->route('gio-hang');
	}

	//Update giỏ
	public function update($id, $qty) {
		Cart::update($id, $qty);

		$total = Cart::total();
		$count = Cart::count();

		return response()->json([
			'total' => $total,
			'count' => $count,
		]);
	}

	//Xóa sp
	public function delete($id) {
		Cart::remove($id);
		$total = Cart::total();
		$count = Cart::count();
		return response()->json([
			'total' => $total,
			'count' => $count,
		]);
		//return redirect()->route('gio-hang');
	}

	//Xóa giỏ
	public function deleteCart() {
		Cart::destroy();
		return redirect()->route('gio-hang');
	}

	//checkout
	public function checkout() {
		// if (Auth::check()) {
		//     return view('page.checkout');
		// }
		// else{
		//     return view('auth.login');
		//     }
		return view('page.checkout');
	}
	//Đặt hàng
	public function placeOrder(Request $req) {
		//Thêm vào bảng orders
		if (count(Cart::content()) > 0) {
			//Add order
			$order = new orders();
			$order->CustomerId = Auth::check() ? Auth::user()->id : null;
			$order->Name = $req->input('name');
			$order->Address = $req->input('address');
			$order->Phone = $req->input('phone');
			$order->Email = $req->input('email');
			$order->Payment = $req->input('payment');
			$order->Note = $req->input('note');
			$order->Status = 0;
			$order->Createtime = new datetime;
			$order->Cart_total = Cart::total();
			$order->save();
			//Thêm vào order detail
			foreach (Cart::content() as $row) {
				$order_detail = new order_detail();
				$order_detail->OrderId = $order->id;
				$order_detail->ProductId = $row->id;
				$order_detail->Quantity = $row->qty;
				$order_detail->Price = $row->price * $row->qty;
				$order_detail->save();
			}
			Cart::destroy(); //Xóa giỏ
			return redirect()->route('gio-hang')->with('message', 'Đơn hàng của bạn đã được gửi đi');
		} else {
			return redirect()->route('trang-chu');
		}
	}

	//Comment
	public function postComment(Request $req, $p_id) {
		$cmt = new comment();
		$cmt->ProductId = $p_id;
		$cmt->Content = $req->input('comment');
		$cmt->CreateDate = new datetime;
		$cmt->Author = Auth::user()->name;
		$cmt->Email = Auth::user()->email;
		$cmt->save();
		return redirect()->route('product-detail', $p_id);

	}

	//Lịch sử đặt hàng
	public function listOrder() {
		if (Auth::check()) {
			$listorder = orders::where('CustomerId', Auth::user()->id)->get();
			return view('page.list_order', compact('listorder'));
		} else {
			return view('page.list_order');
		}
	}

	//Chi tiết đơn hàng theo ID
	public function getOrderDetail($id) {
		$order = orders::where('Id', $id)->first();
		$o_detail = order_detail::where('OrderId', $order->Id)->get();

		return view('page.detail_order', compact('order', 'o_detail'));
	}
	//Lấy thông tin thành viên
	public function profile() {
		if (Auth::check()) {
			$listorder = orders::where('CustomerId', Auth::user()->id)->get();
			return view('page.profile_info', compact('listorder'));
		} else {
			return view('page.profile_info');
		}
	}

	//Cập nhật hồ sơ
	public function updateProfile(Request $req) {
		$user = user::where('id', Auth::user()->id)->update([
			'name' => $req->name,
			'address' => $req->address,
			'phone' => $req->phone,
		]);
		return redirect('profile')->with('message', 'Cập nhật thành công!');
	}

}
