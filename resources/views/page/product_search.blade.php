

     @extends('master')
    @section('content')       

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
                            <div class="c_product_grid_details">
                                @foreach($searchPro as $row)
                                <div class="c_product_item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="c_product_img">
                                                <img class="img-fluid" src="source/persuit/img/product/product1/{{$row->Image1}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6">
                                            <div class="c_product_text">
                                                <h3>{{$row->Name}}</h3>
                                                <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ </h5>
                                                @if($row->Percent_off != 0)
                                                <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                                                    </h6>
                                                @endif
                                                <ul class="product_rating">
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                                <h6>@if($row->Available == 1)<span>Còn hàng</span>@else<span style="color:red">Tạm hết hàng</span>@endif</h6>
                                                <p>Curabitur semper varius lectus sed consequat. Nam accumsan dapibus sem, sed lobortis nisi porta vitae. Ut quam tortor, facilisis nec laoreet consequat, malesuada a massa. Proin pretium tristique leo et imperdiet.</p>
                                                <ul class="c_product_btn">
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                                        <h3>Bộ lọc tìm kiếm</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href=""><input type="checkbox"> Tất cả</a>
                                        </li>
                                        <?php $category = DB::table('categories')->get(); ?>
                                        @foreach($category as $row)
                                        <li class="nav-item">
                                            <a class="nav-link" href="search/{{$row->Id}}?key_word={{$value}}"><input type="checkbox"> {{$row->Name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_fillter_widget">
                                    <div class="l_w_title">
                                        <h3>Lọc theo giá</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="" onclick="huy(e,[0, 200])"><input type="radio" style="max-width: 50px;height: 17px">Dưới 200K</a>
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
                                <aside class="l_widgest l_menufacture_widget">
                                    <div class="l_w_title">
                                        <h3>Manufacturer</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#">Nigel Cabourn.</a></li>
                                        <li><a href="#">Cacharel.</a></li>
                                        <li><a href="#">Calibre (Menswear)</a></li>
                                        <li><a href="#">Calvin Klein.</a></li>
                                        <li><a href="#">Camilla and Marc</a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                                        <h3>Featured Products</h3>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-5.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Jeans with <br /> Frayed Hems</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-6.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Crysp Denim<br />Montana</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        <script>
            function huy(e, range){
                e.preventDefault();
                console.log(window.location.href,range)
                window.location.href = window.location.href + '&range=' + range;
            }
        </script>
        
       @endsection     
