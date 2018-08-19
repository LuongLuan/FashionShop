@extends('master')
@section('content') 
<section class="checkout_method_area p_100">
            <div class="container">
                <div class="row">
                    <div class="checkout_main_area">
                        <div class="checkout_prosses">
                            <div class="row m0">
                                <div class="col-md-6">
                                    <div class="checkout_method">
                                        <h3>check as a guest or register</h3>
                                        <h4>Register with us for future convenience:</h4>
                                         <form role="form" class="radio_area">
                                            <ul class="radio_style">
                                                <li>
                                                    <input type="radio" id="f-option" name="selector">
                                                    <label for="f-option">checkt as guest</label>
                                                    <div class="check"></div>
                                                </li>
                                                <li>
                                                    <input type="radio" id="s-option" name="selector">
                                                    <label for="s-option">register</label>
                                                    <div class="check"><div class="inside"></div></div>
                                                </li>
                                            </ul>
                                          </form>
                                          <h5>register and save time !</h5>
                                          <h6>Register with us for future convenience:</h6>
                                          <a class="checkout_list" href="#"><i class="arrow_carrot-right"></i> Fast and easy check out</a>
                                          <a class="checkout_list" href="#"><i class="arrow_carrot-right"></i> Easy access to your order history and status</a>
                                          <a class="update_btn" href="{{route('register')}}"><span>continue</span></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row checkout_from_area">
                                       <h2>already registed ?</h2>
                                       <p>Please log in below :</p>
                                        <form method="POST" role="form" action="{{route('login')}}" aria-label="{{ __('Login') }}">
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
                                                <label for="pwd">Password <span>*</span></label>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                           
                                            <h3>* Required Filelds</h3>
                                            <div class="forgot_area">
                                                <button type="submit" class="btn update_btn btn-default">log in</button>
                                                <a href="{{ route('password.request') }}">
                                                    <h4>Forgot Your Password ?</h4>
                                                </a>
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