<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\orders;
use Illuminate\Http\Request;

class StatisticController extends Controller {
	public function statistic(Request $req) {
		$date_start = $req->start;
		$date_end = $req->end;
		$sum = 0;

		$revenue = orders::whereBetween('Createtime', [date('Y-m-d 00:00:00', strtotime($date_start)), date('Y-m-d 23:59:59', strtotime($date_end))])->get();
		for ($i = 0; $i < count($revenue); $i++) {
			$sum += $revenue[$i]->Cart_total;
		}
		return view('admin.statistic.statistic', compact('revenue', 'date_start', 'date_end', 'sum'));
	}
}
