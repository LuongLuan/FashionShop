<?php

namespace App\Http\Controllers\Admin;

use App\categories;
use App\Http\Controllers\Controller;
use App\subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
	public function category() {
		$cate = categories::all();

		return view('admin/category/categories', compact('cate'));
	}
	public function create() {
		$cate = categories::all();

		return view('admin/category/add', compact('cate'));
	}
	public function addCate(Request $req) {
		//$file_name = $req->file('txtimg')->getClientOriginalName();
		$i_cate = $req->input('sltCate');
		$i_subcate = $req->input('txtCateName');
		if ($i_cate != "" && $i_subcate != "") {
			$s_category = new subcategory();
			$s_category->CategoryId = $i_cate;
			$s_category->Name = $i_subcate;
			//$s_category->Image = $file_name;
			//$req->file('txtimg')->move('img/subcategory/',$file_name);
			$s_category->save();
		} elseif ($i_cate != "" && $i_subcate == "") {
			$cate = new categories();
			$cate->Name = $i_cate;
			$cate->save();
		}

		return redirect()->route('category');
	}
	public function edit($id) {
		$cate = categories::where('Id', $id)->first();

		return view('admin/category/edit', compact('cate'));
	}
	public function editsub($id) {
		$s_cate = subcategory::where('Id', $id)->first();

		return view('admin/category/edit_sub', compact('s_cate'));
	}
	public function update(Request $req, $id) {
		$cate = categories::where('Id', $id)->update([
			'Name' => $req->txtcate,
		]);

		return redirect()->route('category')->with('message', 'Cập nhật thành công');
	}
	public function updateSub(Request $req, $id) {
		$cate = subcategory::where('Id', $id)->update([
			'Name' => $req->txtsubcate,
		]);

		return redirect()->route('category')->with('message', 'Cập nhật thành công');
	}

}
