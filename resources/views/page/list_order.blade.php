@extends('layouts.master')
@section('title','Lịch sử đặt hàng')
@section('content')
<!--================Shopping Cart Area =================-->
<section class="shopping_cart_area p_100">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="cart_items">
          <h3>ĐƠN HÀNG CỦA BẠN</h3>
          <div>
            <table class="table table-hover">
              @if(count($listorder) > 0)
              <thead style="background: cadetblue">
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Chi tiết</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listorder as $row)
                <tr>
                  <td style="text-align: left;"> {{$row->Id}} </td>
                  <td style="text-align: left;">{{$row->Createtime}}</td>
                  <td style="text-align: left;">{{$row->Cart_total}}</td>
                  <td style="text-align: left;"><a href="{{route('order.detail',$row->Id)}}"><i style="color:blue" class="fas fa-info-circle"></i>&nbsp;Xem</a></td>
                </tr>
                <!-- <tr id="row-{{$row->Id}}" style="display: none;margin-left:30px;background: gray">
                  <td style="text-align: left;"> {{$row->Id}} </td>
                  <td style="text-align: left;">{{$row->Createtime}}</td>
                  <td style="text-align: left;">{{$row->Cart_total}}</td>
                </tr> -->
                <!-- <div id="row-{{$row->Id}}" style="display: block;margin-left:30px;background: gray;width: 100%;height: 100px"></div> -->
                @endforeach
                @else
                <span class="alert alert-warning" style="color:red"><i>Chưa có đơn hàng!</i></span>
                @endif
              </tbody>
            </table>

            <script>
            function show(id){
            var row = document.getElementById('row-'+id);
            if(row.style.display === 'none'){
            row.style.display ='block';
            }else{
            row.style.display = 'none';
            }
            }
            </script>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--================End Shopping Cart Area =================-->
<!--================End Related Product Area =================-->
<!-- <section class="related_product_area">
  <div class="container">
    <div class="related_product_inner">
      <h3 class="single_c_title">Sản phẩm khác</h3>
      <?php $product = DB::table('product')->inRandomOrder()->paginate(8);?>
      <div class="row">
        @foreach($product as $row)
        <div class="col-lg-3 col-sm-6">
          <div class="l_product_item">
            <div class="l_p_img">
              <a href="{{route('product-detail',$row->Id)}}">
                <img src="img/product/{{$row->Image1}}" alt="">
              </a>
            </div>
            <div class="l_p_text">
              <ul>
                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                <li><a class="add_cart_btn" href="{{route('them-gio-hang',$row->Id)}}">Add To Cart</a></li>
                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
              </ul>
              <h4>{{$row->Name}}</h4>
              <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
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
          {{$product->links()}}
        </ul>
      </nav>
    </div>
  </div>
</section> -->
<!--================End Related Product Area =================-->
@endsection