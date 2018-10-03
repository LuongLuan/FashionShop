<?php

namespace App\Http\Controllers\Admin;

use App\account;
use App\Http\Controllers\Controller;
use App\orders;
use App\User;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller {

	//Hiển thị lên trang chủ
	public function dashboard(Request $req) {
		//Đơn hàng chưa xử lý
		$or_noactive = orders::where('Status', false)->get();
		$count = count($or_noactive);
		//số khách hàng
		$cus = count(User::all());
		//Số đơn hàng
		$or = count(orders::all());

		$all_re = orders::all();
		$today_re = orders::whereBetween('Createtime', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->get();
		//Lấy tuần hiện tại
		$date = getdate();
		$week_day = $date['wday'];
		switch ($week_day) {
		case 0:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 6, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 1:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 2:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 3:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 2, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 4:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 3, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 5:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 4, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;
		case 6:
			$dayofweek = mktime(0, 0, 0, date("m"), date("d") - 5, date("Y"));
			$week_re = orders::whereBetween('Createtime', [date('Y-m-d H:i:s', $dayofweek), date('Y-m-d 23:59:59')])->get();
			break;

		default:
			# code...
			break;
		}
		//Tổng doanh thu ngày , tuần
		$sum = 0;
		$sum_today = 0;
		$sum_week = 0;
		for ($i = 0; $i < count($all_re); $i++) {
			$sum += $all_re[$i]->Cart_total;
		}
		for ($i = 0; $i < count($today_re); $i++) {
			$sum_today += $today_re[$i]->Cart_total;
		}
		for ($i = 0; $i < count($week_re); $i++) {
			$sum_week += $week_re[$i]->Cart_total;
		}

		return view('admin.dashboard', compact('count', 'cus', 'or', 'sum', 'sum_today', 'sum_week'));
	}

	//Đăng nhập
	public function postLogin(Request $req) {
		$username = $req->input('username');
		$pass = $req->input('passwd');
		$acc = account::where([['Username', '=', $username], ['Password', '=', $pass]])->first();

		if ($acc) {
			session(['user' => $acc->Name, 'role' => $acc->Role]);
			return redirect()->route('home-admin');
		} else {
			return redirect()->route('admin')->with('message', 'Sai thông tin đăng nhập!');
		}
	}
	// Show form login
	public function getLogin() {
		if (!Session('user')) {
			return view('admin.login');
		} else {
			return redirect('admin/dashboard');
		}
	}

}
