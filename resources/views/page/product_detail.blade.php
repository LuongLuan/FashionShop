@extends('layouts.master')
@section('content')

<!--================Product Details Area =================-->
<section class="product_details_area">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="product_details_slider">
                <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                    <ul>    <!-- SLIDE  -->
                        <li data-index="rs-137221490" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="source/persuit/img/product/product1/{{$detail->Image1}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="source/persuit/img/product/product1/{{$detail->Image1}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-136228343" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="source/persuit/img/product/product1/{{$detail->Image2}}"  data-rotate="0"  data-saveperformance="off"  data-title="Los Angeles" data-param1="13/08/2015" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="source/persuit/img/product/product1/{{$detail->Image2}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-135960434" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="source/persuit/img/product/product1/{{$detail->Image3}}"  data-rotate="0"  data-saveperformance="off"  data-title="The Colors of Feelings" data-param1="11/08/2015" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="source/persuit/img/product/product1/{{$detail->Image3}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="product_details_text">
                <h3>{{$detail->Name}}</h3>
                <ul class="p_rating">
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                </ul>
                <div class="add_review">
                    <a href="#">5 Reviews</a>
                    <a href="#">Add your review</a>
                </div>
                <h6>@if($detail->Available == 1)<span>Còn hàng</span>@else<span style="color:red">Tạm hết hàng</span>@endif</h6>
                <h4>{{number_format($detail->Price-($detail->Price*$detail->Percent_off/100),0,' ','.')}} ₫</h4>
                @if($detail->Percent_off != 0)
                <h5 style="color: gray"><del>{{number_format($detail->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$detail->Percent_off}}%
                </h5>
                @endif
                <p>Curabitur semper varius lectus sed consequat. Nam accumsan dapibus sem, sed lobortis nisi porta vitae. Ut quam tortor, facilisis nec laoreet consequat, malesuada a massa. Proin pretium tristique leo et imperdiet.</p>
                <div class="p_color">
                    <h4 class="p_d_title">color <span>*</span></h4>
                    <ul class="color_list">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
                <div class="p_color">
                    <h4 class="p_d_title">size <span>*</span></h4>
                    <select class="selectpicker">
                        <option>Select your size</option>
                        <option>Select your size M</option>
                        <option>Select your size XL</option>
                    </select>
                </div>
                <div class="quantity">
                    <div class="custom">
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                        <input type="text" name="qty" id="sst" maxlength="12" value="01" title="Quantity:" class="input-text qty">
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                    </div>
                    <a class="add_cart_btn" href="{{route('them-gio-hang',$detail->Id)}}">add to cart</a>
                </div>
                <div class="shareing_icon">
                    <h5>share :</h5>
                    <ul>
                        <li><a href="#"><i class="social_facebook"></i></a></li>
                        <li><a href="#"><i class="social_twitter"></i></a></li>
                        <li><a href="#"><i class="social_pinterest"></i></a></li>
                        <li><a href="#"><i class="social_instagram"></i></a></li>
                        <li><a href="#"><i class="social_youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--================End Product Details Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
<div class="container">
    <nav class="tab_menu">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả sản phẩm</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (1)</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tags</a>
            <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>
            <a class="nav-item nav-link" id="nav-gur-tab" data-toggle="tab" href="#nav-gur" role="tab" aria-controls="nav-gur" aria-selected="false">gurantees</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <p>{{$detail->Description}}</p>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h4>Rocky Ahmed</h4>
            <ul>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
            </ul>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
        </div>
        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
        </div>
        <div class="tab-pane fade" id="nav-gur" role="tabpanel" aria-labelledby="nav-gur-tab">
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
        </div>
    </div>
</div>
</section>
<!--================End Product Details Area =================-->

<!--================End Related Product Area =================-->
<section class="related_product_area">
<div class="container">
    <div class="related_product_inner">
        <h3 class="single_c_title">CÓ thể bạn quan tâm</h3>
        <?php $product = DB::table('product')->where('SubCategoryId',$detail->SubCategoryId)->paginate(4); ?>
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

@endsection