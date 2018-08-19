@extends('master')
@section('content')

  <!--================Shopping Cart Area =================-->
        @if(Cart::count() != 0)
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_items">
                            <h3>GIỎ HÀNG CỦA BẠN</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                        @foreach(Cart::content() as $row)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('del-product',$row->rowId)}}">
                                                    <img src="source/persuit/img/icon/close-icon.png" alt="">
                                                </a>
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex" style="padding-right:10px">
                                                        <img style="width: 60px;height: 60px;" src="source/persuit/img/product/product1/{{$row->options->img}}" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>{{$row->name}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p class="red">{{number_format($row->price,0)}} ₫</p></td>
                                            <td>
                                                <div class="quantity">
                                                     <h6>Quantity</h6>
                                                    <div class="custom">
                                                       <a href="{{url('update-cart/'.$row->rowId.'/'.$row->qty.'-down')}}"> <button class="reduced items-count" type="button"><i class="icon_minus-06"></i></button></a>
                                                        <input type="text" name="qty" id="sst" maxlength="12" value="{{$row->qty}}" title="Quantity:" class="input-text qty">
                                                       <a href="{{url('update-cart/'.$row->rowId.'/'.$row->qty.'-up')}}">
                                                        <button class="increase items-count" type="button"><i class="icon_plus"></i></button></a>
                                                        <!--<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                                        <input type="text" name="qty" id="sst" maxlength="12" value="{{$row->qty}}" title="Quantity:" class="input-text qty">
                                                       <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p>{{ number_format($row->price*$row->qty,0) }} ₫</p></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row">
                                            </th>
                                        </tr>
                                        <tr class="last">
                                            <th scope="row">
                                                <img src="source/persuit/img/icon/cart-icon.png" alt="">
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <h5>Cupon code</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p class="red"></p></td>
                                            <td>
                                                <h3><a href="{{route('trang-chu')}}">Tiếp tục mua hàng <i class="fas fa-arrow-right" style="color:#007bff"></i></a></h3>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_totals_area">
                            <h4>Tổng giỏ hàng</h4>
                            <div class="cart_t_list">
                                <div class="media">
                                    <div class="d-flex">
                                        <h5><i class="fas fa-shipping-fast" style="color:black;margin-left: -25px;"></i> Phí chuyển</h5>
                                    </div>
                                    <div class="media-body">
                                        <p>Miễn phí vận chuyển đến tận nhà</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <h5><i class="fas fa-money-check-alt" style="color:black;margin-left: -25px;"></i> Thanh toán</h5>
                                    </div>
                                    <div class="media-body">
                                        <p>Thanh toán khi nhận hàng</p>
                                    </div>
                                </div>
                                <!-- <div class="media">
                                    <div class="d-flex">
                                        <h5></h5>
                                    </div>
                                    <div class="media-body">
                                        <select class="selectpicker">
                                            <option>Calculate Shipping</option>
                                            <option>Calculate Shipping</option>
                                            <option>Calculate Shipping</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <div class="total_amount row m0 row_disable">
                                <div class="float-left">
                                    Tổng cộng:
                                </div>
                                <div class="float-right">
                                    ${{Cart::total()}}
                                </div>
                            </div>
                        </div>
                        <a href="{{route('checkout')}}"><button class="btn subs_btn form-control">Proceed to checkout</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Shopping Cart Area =================-->
<!--================End Related Product Area =================-->
<section class="related_product_area">
<div class="container">
    <div class="related_product_inner">
        <h3 class="single_c_title">Sản phẩm khác</h3>
        <?php $product = DB::table('product')->inRandomOrder()->paginate(8); ?>
        <div class="row">
            @foreach($product as $row)
            <div class="col-lg-3 col-sm-6">
                <div class="l_product_item">
                                                <div class="l_p_img">
                                                    <a href="{{route('product-detail',$row->Id)}}">
                                                        <img src="source/persuit/img/product/product1/{{$row->Image1}}" alt="">
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
        @else
            @include('page.empty')
        @endif

@endsection