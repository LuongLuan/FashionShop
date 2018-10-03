@extends('layouts.master')
@section('title','Kết quả tìm kiếm')
@section('content')
<section class="categories_product_main p_80">
  <div class="container">
    <div class="categories_main_inner">
      <div class="row row_disable">
        <div class="col-lg-9 float-md-right">
          <div class="showing_fillter">
            <div class="row m0">
              <div class="first_fillter" style="max-width: 55%;">
                @if(Session::has('kw'))
                <h4 class="alert alert-info"> <b style="color:#d91522">Từ khóa:&nbsp;</b>" {{Session('kw')}} "&nbsp;(<i>{{count($c_searchPro)}} sản phẩm</i>) </h4>
                @else
                <h4 class="alert alert-info"> <b style="color:#d91522">Kết quả tìm kiếm</b>(<i>{{count($c_searchPro)}} sản phẩm</i>) </h4>
                @endif
              </div>

              <div class="third_fillter">

              </div>
              @if(count($c_searchPro)>0)
              <div class="four_fillter" id="four">
                <h4>Hiển thị</h4>
                <a id="view1" onclick="view(1)"><i class="far fa-list-alt" style="font-size: 20px;"></i></a>
                <a id="view2"  class="active" onclick="view(2)"><i class="icon_grid-3x3"></i></a>
              </div>
              @endif
              <script>
              function view(id){
              //e.preventDefault();
              var grid = document.getElementById('grid');
              var col = document.getElementById('col');
              var v1 = document.getElementById('view1');
              var v2 = document.getElementById('view2');
              if (id == 1) {
              grid.style.display = 'block';
              col.style.display = 'none';
              v1.classList.add("active");
              v2.classList.remove("active");
              }else{
              col.style.display = 'block';
              grid.style.display = 'none';
              v2.classList.add("active");
              v1.classList.remove("active");
              }
              }
              // var header = document.getElementById("four");
              // var view = header.getElementsByClassName("view");
              // for (var i = 0; i < view.length; i++) {
              //   view[i].addEventListener("click", function() {
              //     var current = document.getElementsByClassName("active");
              //     current[0].className = current[0].className.replace(" active", "");
              //     this.className += " active";
              //   });
              // }
              </script>
            </div>
          </div>
          <div class="c_product_grid_details" id="grid" style="display: none;">
            @foreach($searchPro as $row)
            <div class="c_product_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="c_product_img">
                    <a href="{{route('product-detail',$row->Id)}}">
                    <img class="img-fluid" src="img/product/{{$row->Image1}}" alt=""></a>
                  </div>
                </div>
                <div class="col-lg-8 col-md-6">
                  <div class="c_product_text">
                    <h3>{{$row->Name}}</h3>
                    <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price*(1-$row->Percent_off/100),0,' ','.')}} ₫ </h5>
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
                      <li><a class="add_cart_btn" href="{{route('them-gio-hang',$row->Id)}}">Mua Ngay</a></li>
                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <nav aria-label="Page navigation example" class="pagination_area">
              <ul class="pagination">
                {{$searchPro->links()}}
              </ul>
            </nav>
          </div>
          <div id="col">
            @if(count($searchPro)!= 0)
            <div class="categories_product_area">
              <div class="row">
                @foreach($searchPro as $row)
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
                  {{$searchPro->links()}}
                </ul>
              </nav>
            </div>
            @else
            <div>
              <div style='text-align:center;margin-top: 100px;'>
                <img src="img/notfind.jpg"style="width: 30%;border-radius: 50%;"><br><br>
                <h6 class='alert alert-warning'>Sản phẩm tìm kiếm hiện tại không có !!!</h6>
              </div>

            </div>
            @endif
          </div>
        </div>
        <div class="col-lg-3 float-md-right">
          <div class="categories_sidebar">
            <aside class="l_widgest l_fillter_widgett">
              <div class="l_w_title">
                <h3>Tìm theo giá</h3>
              </div>
              <form action="{{route('search')}}" method='GET' style='margin-bottom:10px'>
                {{ csrf_field()}}
                <input class='min-price' name="minPrice" value="0" placeholder="Thấp nhất" type="number" min="0" require><i style='color: gray;font-size: 15px;margin-left: 5px;' class="fas fa-caret-right"></i>
                <input class='max-price' name="maxPrice" value="" placeholder="Cao nhất" type="number" min="0" require>
                <button  style="width: 20px" type="submit" class="btn-filter"><i class="fas fa-caret-right"></i></button><br>
                <span class='error' style='color:red'></span>
              </form>
              <div class="">
                <a href="tim-kiem?key_word={{Session('kw')}}&minPrice=0&maxPrice=100000" class="btn btn-info">Dưới 100k</a>
                <a href="tim-kiem?key_word={{Session('kw')}}&minPrice=150000&maxPrice=300000" class="btn btn-info">150k ~ 300k</a><br><br>
                <a href="tim-kiem?key_word={{Session('kw')}}&minPrice=300000&maxPrice=500000" class="btn btn-info">300k ~ 500k</a>
                <a href="tim-kiem?key_word={{Session('kw')}}&minPrice=500000&maxPrice=10000000" class="btn btn-info">Trên 500k</a>
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