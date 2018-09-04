@extends('layouts.master')
@section('content')
   <!--================Main Content Area =================-->
   <section class="home_sidebar_area">
                <div class="container">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
                            <div class="sidebar_main_content_area">
                                <div class="advanced_search_area">
                                    <select class="selectpicker">
                                        <option>--Tìm kiếm theo--</option>
                                        <option>Tất cả</option>
                                        <option>Quần</option>
                                        <option>Áo</option>
                                        <option>Giày</option>
                                    </select>
                                    <form action="{{route('search')}}" method="GET">
                                    <div class="input-group" style="max-width: 100%">
                                        <input type="text" class="form-control" name="key_word" placeholder="Tìm sản phẩm ..." aria-label="Search" style="width: 585px;">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit"><i class="icon-magnifier icons"></i></button>
                                        </span>
                                    </div></form>
                                </div>
                                <div class="main_slider_area">
                                    <div id="home_box_slider" class="rev_slider" data-version="5.3.1.6">
                                        <ul>
                                            <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="source/persuit/img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="source/persuit/img/home-slider/slider-2.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    >Best Winter <br> Collection</div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        >There is no one who loves to be bread, who looks after it and wants to have it, simply because it is pain. 
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="#">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="source/persuit/img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="source/persuit/img/home-slider/full-width-1.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->
                                                <!-- LAYERS -->

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    >Best Winter <br> Collection 1</div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        >There is no one who loves to be bread, who looks after it and wants to have it, simply because it is pain. 
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="#">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="promotion_area">
                                    <div class="feature_inner row m0">
                                        <div class="left_promotion">
                                            <div class="f_add_item">
                                                <div class="f_add_img"><img class="img-fluid" src="source/persuit/img/feature-add/f-add-6.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="sale">Sale</div>
                                                    <h4>Best Summer <br />Collection</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right_promotion">
                                            <div class="f_add_item right_dir">
                                                <div class="f_add_img"><img class="img-fluid" src="source/persuit/img/feature-add/f-add-7.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="off">10% off</div>
                                                    <h4>Best Summer <br />Collection</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fillter_home_sidebar">
                                    <h4 style="margin-bottom:20px;">SẢN PHẨM MỚI</h4>
                                    <div class="home_l_product_slider owl-carousel">
                                    @foreach($newProduct as $row)
                                        <div class="item">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                    <a href="{{route('product-detail',$row->Id)}}">
                                                        <img src="source/persuit/img/product/product1/{{$row->Image1}}" alt="">
                                                    </a>
                                                    <h5 class="new">New</h5>
                                                </div>
                                                <div class="l_p_text">
                                                    <ul>
                                                        <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                        <li><a class="add_cart_btn" href="{{route('them-gio-hang',$row->Id)}}">Add To Cart</a></li>
                                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>                                                  </ul>
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
                                </div>
                                <div class="fillter_home_sidebar">
                                    <h4 style="margin-bottom:20px;">SẢN PHẨM KHUYẾN MÃI</h4>
                                    <div class="home_l_product_slider owl-carousel">
                                    @foreach($saleProduct as $row)
                                        <div class="item">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                    <a href="{{route('product-detail',$row->Id)}}">
                                                        <img src="source/persuit/img/product/product1/{{$row->Image1}}" alt="">
                                                    </a>
                                                    <h5 class="sale">Sale</h5>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="left_sidebar_area">
                                <aside class="l_widget l_categories_widget">
                                    <div class="l_title">
                                        <h3><i class="icon-menu" style="font-weight: bold;font-size: 14px"></i> TẤT CẢ DANH MỤC</h3>
                                    </div>
                                    <ul>
                                <?php $category = DB::table('categories')->get(); ?>
                                @foreach($category as $row)
                                <a href="{{route('get-product-cate',$row->Id)}}" style="color:#d91522;text-transform: uppercase;"><h6 style="padding: 10px 0 10px 10px;border-bottom: solid 1px #cccccc;font-weight: 500">{{$row->Name}} <i class="icon-arrow-right" style="font-weight: bold;font-size: 12px"></i> </h6></a>
                                    <?php $subcategory = DB::table('subcategory')->where('CategoryId',$row->Id)->orderby('CategoryId','asc')->get(); ?>
                                    @foreach($subcategory as $row)
                                        <li>
                                            <a href="{{route('get-product',$row->Id)}}">{{$row->Name}}</a>
                                        </li>
                                    @endforeach
                                @endforeach
                                    </ul>
                                </aside>
                                <aside class="l_widget l_supper_widget">
                                    <img class="img-fluid" src="source/persuit/img/supper-add-1.jpg" alt="">
                                    <h4>Super Summer Collection</h4>
                                </aside>
                                <aside class="l_widget l_feature_widget">
                                    <div class="verticalCarousel">
                                        <div class="verticalCarouselHeader">
                                            <div class="float-md-left">
                                                <h3>SẢN PHẨM NỔI BẬT</h3>
                                            </div>
                                            <div class="float-md-right">
                                                <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                                <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                            </div>
                                        </div>
                                        <ul class="verticalCarouselGroup vc_list">
                                            @foreach($featured as $row)
                                            <li>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <a href="{{route('product-detail',$row->Id)}}"><img style="width: 60px;height: 60px" src="source/persuit/img/product/product1/{{$row->Image1}}" alt=""></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><a href="{{route('product-detail',$row->Id)}}" style="color:black">{{$row->Name}}</a></h4>
                                                        <h5 style="font-family:helvetica ;margin-left: 10px;text-align: left;">{{number_format($row->Price-($row->Price*$row->Percent_off/100),0,' ','.')}} ₫ <i class="icon-eye" style="margin:5px 5px 0 0;color:gray;float:right; font-size: 12px;"> {{$row->TotalView}}</i>
                                                </h5>
                                                @if($row->Percent_off != 0)
                                                <h6 style="margin-left: 10px;text-align: left;font-size: 12px;color: gray"><del>{{number_format($row->Price,0,' ','.')}} ₫ </del>&nbsp;&nbsp;&nbsp;&nbsp;-{{$row->Percent_off}}%
                                                </h6>
                                                @endif
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="l_widget l_news_widget">
                                    <h3>newsletter</h3>
                                    <p>Sign up for our Newsletter !</p>
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="yourmail@domain.com" aria-label="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary subs_btn" type="button">Subscribe</button>
                                        </span>
                                    </div>
                                </aside>
                                <aside class="l_widget l_hot_widget">
                                    <h3>Summer Hot Sale</h3>
                                    <p>Premium 700 Product , Titles and Content Ideas</p>
                                    <a class="discover_btn" href="#">shop now</a>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Main Content Area =================-->
            
            <!--================World Wide Service Area =================-->
            <section class="world_service">
                <div class="container">
                    <div class="world_service_inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="source/persuit/img/icon/world-icon-1.png" alt="">Worldwide Service</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="source/persuit/img/icon/world-icon-2.png" alt="">247 Help Center</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="source/persuit/img/icon/world-icon-3.png" alt="">Safe Payment</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="source/persuit/img/icon/world-icon-4.png" alt="">Quick Delivary</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End World Wide Service Area =================-->
@endsection