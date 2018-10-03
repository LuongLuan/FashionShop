<?php

namespace App\Http\Controllers\Admin;

use App\comment;
use App\customer;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller {
	public function customer() {
		$cus = User::all();

		return view('admin.customer.customer', compact('cus'));
	}
	public function delCustomer($id) {
		$cus = user::where('id', $id)->delete();

		return redirect()->back()->with('message', 'Đã xóa tài khoản');
	}
	public function getComment() {
		$cmt = comment::orderby('CreateDate', 'desc')->get();
		return view('admin.customer.getcomment', compact('cmt'));
	}
	public function active($id) {
		$active_cmt = comment::where('Id', $id)->update(['Status' => 1]);

		return redirect()->route('comment')->with('message', 'Đã duyệt');
	}
	public function delete($id) {
		//$cmt = comment::get();
		$del_cmt = comment::where('Id', $id)->delete();

		return redirect()->route('comment')->with('message', 'Đã xóa');
	}
}
