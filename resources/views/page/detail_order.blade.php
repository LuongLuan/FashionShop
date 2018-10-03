@extends('layouts.master')
@section('title','Chi tiết đơn hàng')
@section('content')
<!--================Shopping Cart Area =================-->
<section class="shopping_cart_area p_100">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="cart_items">
          <h3>CHI TIẾT ĐƠN HÀNG SỐ <span style="color:red">{{$order->Id}}</span></h3>
          <h5 style="text-align: center;">Trạng thái đơn hàng</h5>
          <!-- multistep form -->
          <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
              <li @if($order->Status == 0) class="active" @endif><b>Chờ xử lý</b></li>
              <li @if($order->Status == 1) class="active" @endif><b>Đang giao hàng</b></li>
              <li @if($order->Status == 2) class="active" @endif><b>Đã giao hàng</b></li>
            </ul>
          </form>
          <div>
            <table class="table table-hover">
              <thead style="background: cadetblue">
                <tr>
                  <th>Hình ảnh</th>
                  <th>Sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>

                @foreach($o_detail as $row)
                <?php $pro = App\product::where('Id', $row->ProductId)->get();?>
                @foreach($pro as $item)
                <tr>
                  <td style="text-align: left;"><img style="width: 50px;height: 50px;border-radius: 7px" src="img/product/{{$item->Image1}}" alt=""></td>
                  <td style="text-align: left;"> {{$item->Name}} </td>
                  <td style="text-align: left;"> {{$item->Price*(1-$item->Percent_off/100)}} ₫</td>
                  <td style="text-align: left;"> {{$row->Quantity}} </td>
                </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>
            <div class="card bg-light" style="padding:0">
              <div class="card-body text-left">
                <p class="card-text"><strong>NGÀY ĐẶT HÀNG:&nbsp;</strong>{{date('H:i d/m/Y',strtotime($order->Createtime))}}</p>
                <p class="card-text"><strong>ĐỊA CHỈ GIAO HÀNG:&nbsp;</strong>{{$order->Name}} -- {{$order->Address}}</p>
                <p class="card-text"><strong>TỔNG TIỀN:&nbsp;</strong><span style="color:red">{{$order->Cart_total}} ₫</span></p>
              </div>
            </div>
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