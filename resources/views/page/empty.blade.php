@extends('master')
@section('content') 
        
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>{{Session('message')}}</h3>
                    <ul>
                        <li><a href="{{route('trang-chu')}}">Home</a></li>
                        <li>Empty cart</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Cart is Empty</h3>
                    <h4>back to <a href="{{route('trang-chu')}}">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
@endsection