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

class CategoriesController extends Controller
{
    public function category(){
    	$cate = categories::all();

    	return view('admin/categories',compact('cate'));
    }
    public function create(){
        $cate = categories::all();
        
    	return view('admin/create_category',compact('cate'));
    }
    public function addCate(Request $req){
        $i_cate = $req->sltCate;
        $i_subcate = $req->txtCateName;

        $s_category = new subcategory();
        $s_category->categoryId = $i_cate;
        $s_category->Name = $i_subcate;
        $s_category->save();
        return redirect()->route('category');
    }
}
