@extends('layouts.master')
@section('title','Đăng nhập')
@section('content') 
<section class="checkout_method_area p_100">
            <div class="container">
                <div class="row">
                    <div class="checkout_main_area" style="margin: 0 auto;">
                        <div class="checkout_prosses">
                            <div class="row m0">
                                <!-- <div class="col-md-6">
                                    <div class="checkout_method">
                                        <h3>đăng kí thanh toán</h3>
                                        <h4>Đăng kí với chúng tôi để thuận tiện trong tương lai:</h4>
                                         <form role="form" class="radio_area">
                                            <ul class="radio_style">
                                                <li>
                                                    <input type="radio" id="f-option" name="selector">
                                                    <label for="f-option">Đăng kí tài khoản</label>
                                                    <div class="check"></div>
                                                </li>
                                                <li>
                                                    <input type="radio" id="s-option" name="selector">
                                                    <label for="s-option">Thanh toán không cần tài khoản</label>
                                                    <div class="check"><div class="inside"></div></div>
                                                </li>
                                            </ul>
                                          </form>
                                          <h5>Chưa có tài khoản! Đăng kí ngay</h5>
                                          <h6>Đăng kí để dễ dàng quản lý hơn:</h6>
                                          <a class="checkout_list" href="#"><i class="arrow_carrot-right"></i> Thanh toán nhanh chóng và dễ dàng</a>
                                          <a class="checkout_list" href="#"><i class="arrow_carrot-right"></i> Dễ dàng kiểm tra lịch sử mua hàng</a>
                                          <a class="update_btn" href=""><span>Tiếp tục</span></a>
                                    </div>
                                </div> -->
                                <div class="col-md-6" style="margin: 0 auto; margin-top:-30px">
                                    <div class="row checkout_from_area">
                                       <h4 style="width: 500px;text-align: center;">ĐĂNG NHẬP</h4>
                                       </p>
                                        <form style="background: white;padding: 20px;border: solid 1px #bdbdbd;" method="POST" role="form" action="{{route('login')}}" aria-label="{{ __('Login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Email <span>*</span></label>
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Mật khẩu <span>*</span></label>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                           
                                            <h3><p>Chưa có tài khoản! <a href="{{route('register')}}">ĐĂNG KÍ</a> ngay</h3>
                                            <div class="forgot_area">
                                                <button type="submit" class="btn update_btn btn-default">log in</button>
                                                <!-- <a href="{{ route('password.request') }}">
                                                    <h4>Bạn quên mật khẩu ?</h4>
                                                </a> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection