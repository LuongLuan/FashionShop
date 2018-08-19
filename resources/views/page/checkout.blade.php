@extends('master')
@section('content')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>checkout register</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="checkout.html">Checkout Register</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Register Area =================-->
        <section class="register_area p_100">
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing_details">
                                <h2 class="reg_title">Thông tin khách hàng</h2>
                                <form class="billing_inner row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Tên khách hàng <span>*</span></label>
                                            <input type="text" class="form-control" id="name" aria-describedby="name" value=" {{Auth::user()->name}} ">
                                        </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email <span>*</span></label>
                                            <input type="email" class="form-control" id="email" aria-describedby="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Địa Chỉ <span>*</span></label>
                                            <input type="text" class="form-control" id="address" aria-describedby="address" value="{{Auth::user()->address}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Số Điện Thoại <span>*</span></label>
                                            <input type="text" class="form-control" id="phone" aria-describedby="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="order">Ghi Chú <span>*</span></label>
                                            <textarea class="form-control" id="order" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="order_box_price">
                                <h2 class="reg_title">Đơn hàng của bạn</h2>
                                <div class="payment_list">
                                    <div class="price_single_cost">
                                        @foreach(Cart::content() as $row)
                                        <h5>{{$row->name}} <b>({{$row->qty}})</b> <span>${{number_format($row->price * $row->qty,2)}}</span></h5>
                                        @endforeach
                                        <h4></h4>
                                        <h3><span class="normal_text">Tổng cộng</span> <span>${{Cart::total()}}</span></h3>
                                    </div>
                                    <div id="accordion" role="tablist" class="price_method">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                                                    Thanh toán trực tiếp
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Giao hàng tận nhà rồi thanh toán tiền cho nhân viên giao hàng.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                                                    Chuyển khoản ngân hàng
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Chuyển tiền qua thẻ ATM <br>
                                                    Ngân hàng Vietcombank <br>
                                                    STK: 0561000121314 | PHAM HUY
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="submit" class="btn subs_btn form-control">place order</button>
                                <a href=" {{route('place-order')}} "><button type="button" value="button" class="btn subs_btn form-control">ĐẶT HÀNG</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Register Area =================-->
@endsection