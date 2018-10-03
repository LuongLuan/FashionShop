@extends('layouts.master')
@section('title','Thanh toán')
@section('content')
<!--================Categories Banner Area =================-->
<!-- <section class="solid_banner_area">
  <div class="container">
    <div class="solid_banner_inner">
      <h3>Thanh toán</h3>
      <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="checkout.html">Thanh toán</a></li>
      </ul>
    </div>
  </div>
</section> -->
<!--================End Categories Banner Area =================-->
<!--================Register Area =================-->
<section class="register_area p_100">
  <div class="container">
    <div class="register_inner">
      <div class="row">
        <div class="col-lg-7">
          <div class="billing_details">
            <h2 class="reg_title">Thông tin khách hàng</h2>
            <form method="get" action="{{route('place-order')}}" class="billing_inner row">
              {{ csrf_field() }}
              @if(Auth::check())
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="name">Tên khách hàng <span>*</span></label>
                  <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value=" {{Auth::user()->name}} " readonly>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="email">Email <span>*</span></label>
                  <input name="email" type="email" class="form-control" id="email" aria-describedby="email" value="{{Auth::user()->email}}" readonly required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="address">Địa Chỉ <span>*</span> <a href="#" class="edit-add">Thay đổi</a></label>
                  <input name="address" type="text" class="form-control" id="address" aria-describedby="address" value="{{Auth::user()->address}}" readonly required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="phone">Số Điện Thoại <span>*</span><a href="#" class="edit-phone">Thay đổi</a></label>
                  <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="phone" value="{{Auth::user()->phone}}" readonly required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="phone">Phương thức thanh toán <span>*</span></label>
                  <select name="payment" id="pay" class="form-control">
                    <option value="cod">Thanh toán khi nhận hàng(COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="order">Ghi Chú <span>*</span></label>
                  <textarea name="note" class="form-control" id="order" rows="3"></textarea>
                </div>
              </div>
              @else

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="name">Tên khách hàng <span>*</span></label>
                  <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="" required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="email">Email <span>*</span></label>
                  <input name="email" type="email" class="form-control" id="email" aria-describedby="email" value="" required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="address">Địa Chỉ <span>*</span></label>
                  <input name="address" type="text" class="form-control" id="address" aria-describedby="address" value="" required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="phone">Số Điện Thoại <span>*</span></label>
                  <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="phone" value="" required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="phone">Phương thức thanh toán <span>*</span></label>
                  <select name="payment" id="pay" class="form-control">
                    <option value="cod">Thanh toán khi nhận hàng(COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="order">Ghi Chú</label>
                  <textarea name="note" class="form-control" id="order" rows="3"></textarea>
                </div>
              </div>
              @endif

              <button id="btn-place" data="{{count(Cart::content())}}" class="add-to-cart btn btn-default" type="submit" style="width: 95%;cursor:pointer;margin-left: 15px;">ĐẶT HÀNG</button>
            </form>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="order_box_price">
            <h2 class="reg_title">Đơn hàng của bạn</h2>
            <div class="payment_list">
              <h6 class="order-date"><span style="float: left;font-size: 12px;">Hotline: 0165 247 036</span>Đơn hàng ngày: <?php echo date("d-m-Y"); ?></h6>
              <h6><b>Sản phẩm đã chọn:</b></h6><br>
              <div class="price_single_cost">
                @foreach(Cart::content() as $row)
                <h5 style="color: black;padding: 7px 0 7px 0;border-bottom: dotted 1px #443c3c;">{{$row->name}} <b>({{$row->qty}})</b> <span>{{number_format($row->price * $row->qty,0)}} đ</span></h5>
                @endforeach
                <h4></h4>
                <h3><span class="normal_text" style="color: black">Tổng cộng</span> <span>{{number_format(Cart::total())}} đ</span></h3>
              </div>
              <div id="accordion" role="tablist" class="price_method">
                <h6><b>Hỗ trợ thanh toán:</b></h6><br>
                <div class="card" style="padding:0 0 0 50px">
                  <div class="card-header" role="tab" id="headingOne">
                    <h6 class="mb-0">
                    <i class="fas fa-hand-holding-usd" style="color: black;font-size: 20px;"></i>  Thanh toán trực tiếp
                    </h6>
                  </div>
                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" style="color: black">
                      Giao hàng tận nhà rồi thanh toán tiền cho nhân viên giao hàng.
                    </div>
                  </div>
                </div>
                <div class="card" style="padding:0 0 0 50px">
                  <div class="card-header" role="tab" id="headingOne">
                    <h6 class="mb-0">
                    <i class="far fa-credit-card"></i> Chuyển khoản ngân hàng
                    </h6>
                  </div>
                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" style="color: black">
                      Chuyển tiền qua thẻ ATM <br>
                      Ngân hàng Vietcombank <br>
                      STK: 0561000121314 | PHAM HUY
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Register Area =================-->
@endsection