@extends('layouts.master')
@section('title','Giỏ hàng trống')
@section('content')
<!--================Categories Banner Area =================-->
@if (Session::has('message'))
<section class="solid_banner_area">
  <div class="container">
    <div class="solid_banner_inner">
      <h3 style="color:green"><i class="fas fa-shield-check"></i>{{Session('message')}}!</h3>
      <ul>
        <li>QUAY LẠI <a href="{{route('trang-chu')}}" style="font-weight: bold;color: tomato;text-decoration: underline;">CỬA HÀNG</a></li>
      </ul>
    </div>
  </div>
</section>
@else
<!--================End Categories Banner Area =================-->
<!--================login Area =================-->
<section class="emty_cart_area p_100">
  <div class="container">
    <div class="emty_cart_inner">
      <i class="icon-handbag icons" style="border: 1px solid tomato;"></i>
      <h3>Giỏ Hàng Trống</h3>
      <h4>Quay lại <a href="{{route('trang-chu')}}" style="font-weight: bold;color: tomato;text-decoration: underline;">cửa hàng</a></h4>
    </div>
  </div>
</section>
@endif
<!--================End login Area =================-->
@endsection