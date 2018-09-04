

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
            <section class="no_sidebar_2column_area">
                <div class="container">
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
                    <div class="two_column_product">
                        <div class="row">
                            @foreach($getpro_sub as $get)
                            <div class="col-lg-3 col-sm-6">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="source/persuit/img/product/product1/{{$get->Image1}}" alt="">
                                        <h5 class="new">New</h5>
                                    </div>
                                    <div class="l_p_text">
                                       <ul>
                                            <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                            <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4>{{$get->Name}}</h4>
                                       <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($get->Price-($get->Price*$get->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$get->TotalView}}</i>
                                                    </h5>
                                                    <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($get->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$get->Percent_off}}%
                                                    </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <nav aria-label="Page navigation example" class="pagination_area">
                          <ul class="pagination">
                            {{$getpro_sub->links()}}
                          </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <!--================End Categories Product Area =================-->
       @endsection     
