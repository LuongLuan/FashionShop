@extends('layouts.master')
@section('title',$_cate->Name.' '.'thời trang')
@section('content')
<section class="home_sidebar_area">
  <div class="container">
    <div class="row row_disable">
      <div class="col-lg-9 float-md-right">
        <div class="sidebar_main_content_area">
          <div class="advanced_search_area">
            <!-- <select class="selectpicker">
              <option>--Tìm kiếm theo--</option>
              <option>Tất cả</option>
              <option>Quần</option>
              <option>Áo</option>
              <option>Giày</option>
            </select> -->
            <form action="{{route('search')}}" method="GET" style="width: 100%">
              {{ csrf_field()}}
              <div class="input-group" style="max-width: 100%">
                <input type="text" class="form-control" name="key_word" placeholder="Tìm sản phẩm ..." aria-label="Search">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit"><i class="icon-magnifier icons"></i></button>
                </span>
              </div>
            </form>
          </div>

        </div>
      </div>
      <div class="col-lg-3 float-md-right">
        <div class="left_sidebar_area">
          <aside class="l_widget l_categories_widget">
            <div class="l_title">
              <h3 class="all-category" style="cursor:pointer"><i class="icon-menu" style="font-weight: bold;font-size: 14px;"></i> TẤT CẢ DANH MỤC <i class="fas fa-caret-down" style="font-size:17px"></i></h3>
            </div>
            <ul class="menu-left">
              <?php $category = DB::table('categories')->get();?>
              @foreach($category as $row)
              <a href="{{route('get-product-cate',$row->Id)}}" style="color:#d91522;text-transform: uppercase;"><h6 style="padding: 10px 0 10px 10px;border-bottom: solid 1px #cccccc;font-weight: 500">{{$row->Name}} <i class="icon-arrow-right" style="font-weight: bold;font-size: 12px"></i> </h6></a>
              <?php $subcategory = DB::table('subcategory')->where('CategoryId', $row->Id)->orderby('CategoryId', 'asc')->get();?>
              @foreach($subcategory as $row)
              <li>
                <a href="{{route('get-product',$row->Id)}}">{{$row->Name}}</a>
              </li>
              @endforeach
              @endforeach
            </ul>
          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================Categories Banner Area =================-->
<!-- <section class="categories_banner_area" style='height: 250px;'>
  <div class="container">
    <div class="c_banner_inner" style='padding-top: 100px;'>
      <h3>shop grid with left sidebar</h3>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li class="current"><a href="#">Shop Grid with Left Sidebar</a></li>
      </ul>
    </div>
  </div>
</section> -->
<!--================End Categories Banner Area =================-->

<!--================Categories Product Area =================-->
<section class="categories_product_main p_80">
  <div class="container">
    <div class="categories_main_inner">
      <div class="row row_disable">
        <div class="col-lg-9 float-md-right">
          <div class="showing_fillter">
            <div class="alert alert-info">
              <h4>{{$_cate->Name}} <span style="font-size: 15px">(<b style="color: red">{{count($c_get_pCate)}}</b> sản phẩm)</span>  <hr>
              <h6 style='font-size:12px;'>
              <i class="fas fa-shipping-fast icon_ads"></i>&nbsp;Miễn phí vận chuyển &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <i class="icon-check icon_ads"></i>&nbsp;Kiểm tra hàng khi nhận &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <i class="fas fa-sync-alt icon_ads"></i>&nbsp;Đổi trả trong 7 ngày
              </h6>
              <form class="form-inline" style="float:right;margin-top: -80px;" action="product" method="get">
                <div class="form-group">
                  <label for="sel1">Lọc theo &nbsp;</label>
                  <select style="font-size: 15px" class="form-control input-sm" id="order" name="order" onchange="OrderProduct({{$_cate->Id}})">

                    <option {{Session('slt0')}} value="price-desc">Giá giảm dần </option>
                    <option {{Session('slt1')}} value="price-asc">Giá tăng dần</option>
                    <option {{Session('slt2')}} value="more-view">Xem nhiều nhất</option>
                  </select>
                  <script>
                  function OrderProduct(id) {
                  var val = document.getElementById("order").value;
                  window.location = 'chuyen-muc/Id=' + id + '?order=' + val;
                  }
                  </script>
                </div>
              </form>
              </h4>

            </div>
            @foreach($subCate as $row)
            <a href="{{route('get-product',$row->Id)}}">
              <h6 class='alert alert-success'> <img style='width:30px;height:30px' src="{{$row->Image}}" alt=""> {{$row->Name}}</h6>
            </a>
            @endforeach
            <br><br>
          </div>
          @if(count($get_pCate)!= 0)
          <div class="categories_product_area">
            <div class="row">
              @foreach($get_pCate as $row)
              <div class="col-lg-4 col-sm-6">
                <div class="l_product_item">
                  <div class="l_p_img">
                    <a href="{{route('product-detail',$row->Id)}}">
                      <img src="img/product/{{$row->Image1}}" alt="">
                    </a>
                    @if($row->TypeId == 2)
                    <h5 class="new">New</h5>
                    @elseif($row->TypeId == 3)
                    <h5 class="sale">sale</h5>
                    @endif
                  </div>
                  <div class="l_p_text">
                    <ul>
                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                      <li><a class="add_cart_btn" href="{{route('them-gio-hang',$row->Id)}}">Mua Ngay</a></li>
                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                    </ul>
                    <h4> {{$row->Name}} </h4>
                    <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price*(1-$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
                    </h5>
                    @if($row->Percent_off != 0)
                    <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                    </h6>
                    @endif
                    <h5 class="vote_star">
                    <ul class="p_rating">
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star" style="color:gray"></i></a></li>
                    </ul>
                    </h5>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <nav aria-label="Page navigation example" class="pagination_area">
              <ul class="pagination">
                @if($max==0)
                {{$get_pCate->links()}}
                @endif
              </ul>
            </nav>
          </div>
        </div>
        @else

        <div style='text-align:center;margin-top: 100px;'>
          <img src="img/notfind.jpg"style="width: 30%;border-radius: 50%;"><br><br>
          <h6 class='alert alert-danger'>Sản phẩm tìm kiếm hiện tại không có !!!</h6>
        </div>

      </div>
      @endif
      <div class="col-lg-3 float-md-right">
        <div class="categories_sidebar">
          <!-- <aside class="l_widgest l_p_categories_widget">
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

            </ul>
          </aside> -->
          <aside class="l_widgest l_fillter_widgett">
            <div class="l_w_title">
              <h3>Lọc theo giá</h3>
            </div>
            <form action="{{route('get-product-cate',$idd)}}" method='GET' style='margin-bottom:10px'>
              {{ csrf_field()}}
              <input class='min-price' name="minPrice" value="0" placeholder="Thấp nhất" type="number" min="0" require><i style='color: gray;font-size: 15px;margin-left: 5px;' class="fas fa-caret-right"></i>
              <input class='max-price' name="maxPrice" value="0" placeholder="Cao nhất" type="number" min="0" require>
              <button style="width: 20px" type="submit" class="btn-filter"><i class="fas fa-caret-right"></i></button><br>
              <span class='error' style='color:red'></span>
            </form>
            <div class="">
              <a href="chuyen-muc/Id={{$idd}}?minPrice=0&maxPrice=100000" class="btn btn-info">Dưới 100k</a>
              <a href="chuyen-muc/Id={{$idd}}?minPrice=150000&maxPrice=300000" class="btn btn-info">150k ~ 300k</a><br><br>
              <a href="chuyen-muc/Id={{$idd}}?minPrice=300000&maxPrice=500000" class="btn btn-info">300k ~ 500k</a>
              <a href="chuyen-muc/Id={{$idd}}?minPrice=500000&maxPrice=10000000" class="btn btn-info">Trên 500k</a>
            </div>
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
                <img style="width: 80px;height: 90px" src="img/product/{{$row->Image1}}">
              </div>
              <div class="media-body">
                <h4>{{$row->Name}}</h4>
                <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
                </h5>
                @if($row->Percent_off != 0)
                <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                </h6>
                @endif
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