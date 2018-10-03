@extends('layouts.master')
@section('title','Thông tin cá nhân')
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
            <h2 class="reg_title">Thông tin cá nhân
            </h2>
            <form method="post" action="{{route('update-profile')}}" class="billing_inner row">
              {{ csrf_field() }}
              @if(Auth::check())
              <div class="col-lg-12">
                <div class="form-group">
                  @if(Session::has('message'))<span class="alert alert-success">
                    {{Session('message')}}
                  </span><br><br>
                  @endif
                  <label for="name">Tên khách hàng <span>*</span><a href="#" class="edit-name">Thay đổi</a></label>
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

              @endif
              <button style="margin-left:14px" class="btn btn-primary" type="submit" class="btn subs_btn form-control">Cập Nhật</button>

            </form>
          </div>
        </div>
        <div class="col-lg-7" style="max-width: 41%;">
          <div class="cart_items">
            <h2 class="reg_title">Đơn hàng gần đây</h2><br>
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
  </div>
</section>
<!--================End Register Area =================-->
@endsection