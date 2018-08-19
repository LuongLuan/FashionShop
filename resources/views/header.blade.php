
<!--================Menu Area =================-->
<header class="shop_header_area carousel_menu_area">
    <div class="carousel_top_header black_top_header row m0">
        <div class="container">
            <div class="carousel_top_h_inner">
                <div class="float-md-left">
                    <div class="top_header_left">
                        <div class="selector">
                            <select class="language_drop" name="countries" id="countries" style="width:300px;">
                              <option value='yt' data-image="source/persuit/img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                              <option value='yu' data-image="source/persuit/img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                              <option value='yt' data-image="source/persuit/img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                              <option value='yu' data-image="source/persuit/img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                          </select>
                      </div>
                      <select class="selectpicker usd_select">
                        <option>USD</option>
                        <option>$</option>
                        <option>$</option>
                    </select>
                </div>
            </div>
            <div class="float-md-right">
                <ul class="account_list">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#" onclick="login()">Wish List (0)</a></li>
                    @guest
                    <li><i class="fas fa-sign-in-alt"></i> <a href="{{route('login')}}">Đăng Nhập</a></li>
                    <li><a href="{{route('register')}}"><i class="fas fa-user-plus"></i> Đăng Ký</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding: 0px;"><i class="fas fa-user-alt"></i> 
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color:#d91522">
                            <i class="fas fa-sign-out-alt" style="color:#d91522"></i> Đăng xuất
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color:#d91522">
                        <i class="fas fa-user-edit" style="color:#d91522"></i> Thông tin cá nhân
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
</div>
</div>
</div>
<div class="carousel_menu_inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('trang-chu')}}"><img src="source/persuit/img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('trang-chu')}}"><i class="fas fa-home" style="color:black;font-size: 17px"></i></a></li>
                    <?php $category = DB::table('categories')->get(); ?>
                    @foreach($category as $row)
                    <?php $subCate = DB::table('subcategory')->where('CategoryId',$row->Id)->get(); ?>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="{{route('get-product-cate',$row->Id)}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="{{route('get-product-cate',$row->Id)}}">{{$row->Name}} <i class="fas fa-caret-down" style="color:black"></i></a>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($subCate as $row)
                            <li class="nav-item"><a class="nav-link" href=" {{route('get-product',$row->Id)}} ">{{$row->Name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="/">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/">Liên hệ</a></li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="search_icon"><a href="#"><i class="icon-magnifier icons"></i></a></li>
                    <li class="user_icon"><a href="#"><i class="icon-user icons"></i></a></li>
                    <li class="cart_cartt"><a href="{{route('gio-hang')}}"><i class="icon-handbag icons"></i><span style="font-size: 17px;color:#d91522;font-weight: normal;">({{Cart::count()}})</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</header>
<!--================End Menu Area =================-->

