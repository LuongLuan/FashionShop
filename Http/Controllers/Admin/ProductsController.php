<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Auth;
use App\product;
use App\categories;
use App\subcategory;
use App\orders;
use App\order_detail;
use App\supplies;

class ProductsController extends Controller
{
     // products
    public function product(Request $req)
    {
        $product = DB::table('product')->orderby('Id','asc')->paginate(10);
        $featured_p = DB::table('product')->where('TypeId','1')->orderby('Id','asc')->paginate(5);
        $new_p = DB::table('product')->where('TypeId','2')->orderby('Id','asc')->paginate(5);
        $sale_p = DB::table('product')->where('TypeId','3')->orderby('Id','asc')->paginate(5);

        return view('admin.list',compact('product','featured_p','new_p','sale_p'));
    }
}
