<?php

namespace App\Http\Controllers\Admin;

use App\account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller {

	//Get staff
	public function getStaff() {
		$staff = account::where('Role', 0)->get();
		return view('admin.staff.staff', compact('staff'));
	}
	//Delete staff
	public function delStaff($id) {
		$staff = account::where('Id', $id)->delete();

		return redirect()->back()->with('message', 'Xóa thành công');
	}
	//Create staff
	public function createStaff() {

		return view('admin.staff.add');
	}
	//Edit staff
	public function getedit($id) {

		$staff = account::find($id);
		return view('admin.staff.edit', compact('staff'));
	}
	public function editStaff(Request $req, $id) {
		$up_staff = account::where('Id', $id)->update([
			'Username' => $req->username,
			'Password' => $req->password,
			'Address' => $req->address,
			'Phone' => $req->phone,
			'Name' => $req->name,
		]);
		return redirect()->route('get-staff')->with('message', 'Cập nhật thành công');
	}
	//Add staff
	public function addStaff(Request $req) {
		$staff = new account();

		$staff->Name = $req->name;
		$staff->Username = $req->username;
		$staff->Password = $req->password;
		$staff->Address = $req->address;
		$staff->Phone = $req->phone;
		$staff->Role = 0;
		$staff->save();

		return redirect()->route('get-staff')->with('message', 'Thêm thành công');
	}
}
