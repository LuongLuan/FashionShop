@extends('layouts.master')
@section('content')

<!--================Categories Banner Area =================-->
        <section class="categories_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>shop grid with left sidebar</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="#">Shop Grid with Left Sidebar</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
                            <div class="showing_fillter">
                                <div class="row m0">
                                    <div class="first_fillter">
                                        <h4>Showing 1 to 12 of 30 total</h4>
                                    </div>
                                    <div class="secand_fillter">
                                        <h4>SORT BY :</h4>
                                        <select class="selectpicker">
                                            <option>Name</option>
                                            <option>Name 2</option>
                                            <option>Name 3</option>
                                        </select>
                                    </div>
                                    <div class="third_fillter">
                                        <h4>Show : </h4>
                                        <select class="selectpicker">
                                            <option>09</option>
                                            <option>10</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="four_fillter">
                                        <h4>View</h4>
                                        <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                        <a href="#"><i class="icon_grid-3x3"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="categories_product_area">
                                <div class="row">
                                	@foreach($get_pCate as $row)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <img src="source/persuit/img/product/product1/{{$row->Image1}}" alt="">
                                                @if($row->TypeId == 2)
                                                <h5 class="new">New</h5>
                                                @elseif($row->TypeId == 3)
                                                <h5 class="sale">sale</h5>
                                                @endif
                                            </div>
                                            <div class="l_p_text">
                                               <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                </ul>
                                                <h4> {{$row->Name}} </h4>
                                               <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
                                                </h5>
                                                @if($row->Percent_off != 0)
                                                <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                                                </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Danh mục</h3>
                                    </div>
                                    <ul class="navbar-nav">                                        @foreach($subCate as $row)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('get-product',$row->Id)}}">{{$row->Name}}
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                        <!--<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Women’s Fashion
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        </li>-->
                                        
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_fillter_widget">
                                    <div class="l_w_title">
                                        <h3>Lọc theo giá</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="get-product-cate/"><input type="radio" style="max-width: 50px;height: 17px">Dưới 200K</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><input type="radio" style="max-width: 50px;height: 17px">Từ 200K - 500K</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><input type="radio" style="max-width: 50px;height: 17px">Trên 500K</a>
                                        </li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_color_widget">
                                    <div class="l_w_title">
                                        <h3>Color</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                                        <h3>Sản phẩm nổi bật</h3>
                                    </div>
                                    @foreach($featured as $row)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="width: 80px;height: 90px" src="source/persuit/img/product/product1/{{$row->Image1}}">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$row->Name}}</h4>
                                            <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
                                                </h5>
                                                <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                                                </h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
@endsection
