<?php

namespace App\Http\Controllers\Admin;

use App\categories;
use App\Http\Controllers\Controller;
use App\product;
use App\subcategory;
use App\supplies;
use App\type;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller {
	// products
	public function product(Request $req) {
		if ($req->ajax() || 'NULL') {
			$pro = $req->pro;
			switch ($pro) {
			case 'sale':
				$product = DB::table('product')->where('TypeId', '3')->orderby('Id', 'asc')->paginate(7);
				session(['slt0' => 'selected']);
				session()->forget(['slt1', 'slt2', 'slt3']);
				break;
			case 'new':
				$product = DB::table('product')->where('TypeId', '2')->orderby('Id', 'asc')->paginate(7);
				session(['slt1' => 'selected']);
				session()->forget(['slt0', 'slt2', 'slt3']);
				break;
			case 'hot':
				$product = DB::table('product')->where('TypeId', '1')->orderby('Id', 'asc')->paginate(7);
				session(['slt2' => 'selected']);
				session()->forget(['slt1', 'slt0', 'slt3']);
				break;
			case 'all':
				$product = DB::table('product')->orderby('Id', 'asc')->paginate(7);
				session(['slt3' => 'selected']);
				session()->forget(['slt1', 'slt2', 'slt0']);
				break;

			default:
				$product = DB::table('product')->orderby('Id', 'asc')->paginate(7);
				session()->forget(['slt1', 'slt2', 'slt3', 'slt0']);
				break;
			}

			return view('admin.product.list', compact('product'));

		}
	}
	public function add() {
		$subcate = subcategory::all();
		$type = type::all();
		$sup = supplies::all();
		return view('admin.product.add', compact('subcate', 'type', 'sup'));
	}
	public function create(Request $req) {
		$file_name = $req->file('txtimg')->getClientOriginalName();
		$pro = new product();
		$pro->SubCategoryId = $req->input('sltsubCate');
		$pro->CategoryId = $req->input('sltCate');
		$pro->TypeId = $req->input('sltType');
		$pro->SupplyId = $req->input('sltSup');
		$pro->Name = $req->input('txtname');
		$pro->Description = $req->input('txtdesc');
		$pro->Size = $req->input('txtsize');
		$pro->Price = $req->input('txtprice');
		$pro->Percent_off = $req->input('txtdiscount');
		$pro->Available = $req->input('sltStatus');
		$pro->Image1 = $file_name;
		$req->file('txtimg')->move('img/product/', $file_name);
		$pro->save();
		return redirect()->route('product')->with('message', 'Đã thêm thành công');

	}
	public function delete($id) {
		$pro = product::where('Id', $id)->delete();
		return redirect()->route('product')->with('message', 'Đã xóa thành công');
	}
	public function getedit($id) {
		$pro = product::where('Id', $id)->first();
		$cate = categories::where('Id', '!=', $pro->CategoryId)->get();
		$subcate = subcategory::where('Id', '!=', $pro->SubCategoryId)->get();
		$type = type::where('Id', '!=', $pro->TypeId)->get();
		$sup = supplies::where('Id', '!=', $pro->SupplyId)->get();

		$category = categories::where('Id', $pro->CategoryId)->first();
		$sub = subcategory::where('Id', $pro->SubCategoryId)->first();
		$supply = supplies::where('Id', $pro->SupplyId)->first();
		$type1 = type::where('Id', $pro->TypeId)->first();

		return view('admin.product.edit', compact('subcate', 'type', 'sup', 'pro', 'category', 'sub', 'supply', 'type1', 'cate'));
	}

	public function postedit(Request $req, $id) {
		$pro = product::where('Id', $id)->first();
		if ($req->file('txtimg') == null) {
			$file_name = $pro->Image1;
		} else {
			$file_name = $req->file('txtimg')->getClientOriginalName();
			$req->file('txtimg')->move('img/product/', $file_name);
		}

		$pro = product::where('Id', $id)->update([
			'CategoryId' => $req->input('sltCate'),
			'SubCategoryId' => $req->input('sltsubCate'),
			'TypeId' => $req->input('sltType'),
			'SupplyId' => $req->input('sltSup'),
			'Name' => $req->input('txtname'),
			'Description' => $req->input('txtdesc'),
			'Size' => $req->input('txtsize'),
			'Percent_off' => $req->input('txtdiscount'),
			'Price' => $req->input('txtprice'),
			'Image1' => $file_name,
			'Available' => $req->input('sltStatus'),

		]);

		return redirect()->route('product')->with('message', 'Cập nhật thành công');
	}

}
