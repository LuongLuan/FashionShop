@extends('layouts.master')
@section('title',$detail->Name)
@section('content')
<!-- Lấy cmt theo ID product -->
<?php $cmt = DB::table('comment')->where('ProductId', $detail->Id)->orderby('Id', 'desc')->get();?>
<!--================Product Details Area =================-->
<div class="container">
  <div class="card">
    <div class="container-fliud">
      <div class="wrapper row">
        <div class="preview col-md-6">
          <div class="preview-pic tab-content">
            <div class="tab-pane active" id="pic-1"><img src="img/product/{{$detail->Image1}}" alt="">
            </div>
            <div class="tab-pane" id="pic-2"><img src="img/product/{{$detail->Image2}}" alt="Hình ảnh">
            </div>
          </div>
          <ul class="preview-thumbnail nav nav-tabs">
            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="img/product/{{$detail->Image1}}" alt="{{$detail->Name}}"></a>
          </li>
          <li><a data-target="#pic-2" data-toggle="tab"><img src="img/product/{{$detail->Image2}}" alt="Hình ảnh"></a>
        </li>
      </ul>
    </div>
    <div class="details col-md-6">
      <h3 class="product-title">{{$detail->Name}}</h3>
      <?php $pro = DB::table('subcategory')->where('Id', $detail->SubCategoryId)->first();?>
      <h6>Danh mục:<b> <a style="color:green;text-decoration: underline;" href="{{route('get-product',$pro->Id)}}">{{$pro->Name}}</a></b></h6><br>
      <h6>@if($detail->Available == 1)Tình trạng: <span style="color:#57e234">Còn hàng</span>@else<span style="color:red">Tạm hết hàng</span>@endif</h6><br>
      <div class="rating">
        <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
        </div> <span class="review-no">(<i style="font-size: 15px;font-weight: 100">{{count($cmt)}} <a href="chi-tiet-san-pham/{{$detail->Id}}#nav-profile-tab">lượt đánh giá</a></i>)</span>
      </div>
      <p class="product-description">{{$detail->Description}}</p>
      <h4 class="price">Giá bán: <span style="color:red">{{number_format($detail->Price*(1 - $detail->Percent_off/100),0,' ','.')}} ₫</span></h4>
      @if($detail->Percent_off != 0)
      <h5 style="color: gray"><del>{{number_format($detail->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$detail->Percent_off}}%
      </h5>
      @endif
      <br><br>
      <h5 class="sizes">Kích cỡ: <span class="size" data-toggle="tooltip" title="small">{{$detail->Size}}</span>
      </h5>
      <div class="quantity">
        <div class="custom">
          <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
          <input type="text" name="qty" id="sst" maxlength="2" value="1" title="Quantity:" class="input-text qty">
          <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
        </div>
      </div>
      <div class="action">
        <a onclick="addcart({{$detail->Id}})">
          <button class="add-to-cart btn btn-default" type="button" style="background:#d91522;width: 40%;margin-right: 20px;">THÊM VÀO GIỎ HÀNG</button>
        </a> <!--
        <a onclick="addcart({{$detail->Id}})">
          <button class="add-to-cart btn btn-default" type="button" style="width: 50%">THÊM VÀO GIỎ HÀNG</button>
        </a>  -->
        <script>
        function addcart(id) {
        var val = document.getElementById("sst").value;
        if (val) {}
        window.location = 'gio-hang/' + id + '?qty=' + val;
        }
        </script>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--================End Product Details Area =================-->
<!--================Product Description Area =================-->
<section class="product_description_area">
<div class="container">
<nav class="tab_menu">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả sản phẩm</a>
    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <p>{{$detail->Description}}</p>
  </div>
  <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <h6 style="padding: 5px;background: antiquewhite;font-weight: 500">Đánh giá nhận xét về sản phẩm (<i style="font-size: 15px;font-weight: 100">{{count($cmt)}} lượt đánh giá</i>)</h6>
    <br>
    <h4>Viết đánh giá... <i style="color:black;font-size: 18px" class="fas fa-pencil-alt"></i></h4>
    <div>
      @if(Auth::check())
      <form action="{{route('post-comment',$detail->Id)}}" method="post" role='form'>
        {{ csrf_field() }}
        <textarea name="comment" class="form-control" style="width: 50%" rows="3"></textarea><br>
        <button class="btn btn-primary" type="submit" style="width: 100px;">Gửi</button>
      </form>
      <br><br>
      @else
      <a href="{{route('login')}}"><button>Đăng nhập</button></a> để viết đánh giá
      <br><br>
      @endif
      <h5>Đánh giá sản phẩm</h5>
      <br>
      @if(count($cmt) > 0)
      <div class="comment">
        @foreach($cmt as $row)

        <img style="width: 40px;height: 40px;float: left;margin-right:10px;border-radius: 30px;" src="img/avatar.png" alt="customer-image">
        <div style="width:80%;height: auto;border-radius: 30px">
          <p><b>{{$row->Author}}</b> &nbsp;<i style="font-size: 10px" class="far fa-clock"></i><span style="font-size: 10px">{{$row->CreateDate}}</span></p>
          <p>{{$row->Content}}</p>
        </div>
        <br>
        @endforeach
      </div>
      @else
      <h6 style="padding:5px;background-color:#dfdfdf"><i style="color:red">Chưa có đánh giá cho sản phẩm này!</i></h6>
      @endif
    </div>
    <br><br>
  </div>
</div>
</section>
<!--================End Product Details Area =================-->
<!--================End Related Product Area =================-->
<section class="related_product_area">
<div class="container">
  <div class="related_product_inner">
    <h3 class="single_c_title">Sản phẩm cùng danh mục</h3>
    <?php $product = DB::table('product')->where('SubCategoryId', $detail->SubCategoryId)->paginate(4);?>
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
              <li><a class="add_cart_btn" href="{{route('them-gio-hang',$row->Id)}}">Mua Ngay</a></li>
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
</section>
<!--================End Related Product Area =================-->
@endsection