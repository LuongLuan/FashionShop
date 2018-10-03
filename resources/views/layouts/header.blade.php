<!--================Menu Area =================-->
<header class="shop_header_area carousel_menu_area">
  <div class="carousel_top_header black_top_header row m0">
    <div class="container">
      <div class="carousel_top_h_inner">
        <div class="float-md-left">
          <div class="top_header_left">
            <div class="selector">
              <select class="language_drop" name="countries" id="countries" style="width:300px;max-width: 125px;">
                <option value='yt' data-image="source/persuit/img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                <option value='yu' data-image="source/persuit/img/icon/vi.png" data-imagecss="flag yu" data-title="Vietnamese">Tiếng Việt</option>
              </select>
            </div>
          </div>
        </div>
        <div class="float-md-right">
          <ul class="account_list">
            <li><i class="fas fa-headset"></i> <a href="#">Liên hệ</a></li>
            <li><i class="fas fa-question-circle"></i> <a href="#">Trợ giúp</a></li>
            @guest
            <li><i class="fas fa-sign-in-alt"></i> <a href="{{route('login')}}">Đăng Nhập</a></li>
            <li><a href="{{route('register')}}"><i class="fas fa-user-plus"></i> Đăng Ký</a></li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding: 0px;"><i class="fas fa-user-alt"></i>
                Hi! {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href=" {{route('profile')}} ">
                  <i class="fas fa-user-edit" style="color:#d91522"></i> Thông tin cá nhân
                </a>
                <a class="dropdown-item" href="{{route('list-order')}}">
                  <i class="fa fa-list-alt" style="color:#d91522"></i> Lịch sử đặt hàng
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" style="color:#d91522">
                  <i class="fas fa-sign-out-alt" style="color:#d91522"></i> Đăng xuất
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
      <a class="navbar-brand" href="{{route('trang-chu')}}"><img style="width: 220px;height: 70px;" src="source/persuit/img/logo.gif" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="{{route('trang-chu')}}"><i class="fas fa-home" style="color:black;font-size: 17px"></i></a></li>
          <?php $category = DB::table('categories')->get();?>
          @foreach($category as $row)
          <?php $subCate = DB::table('subcategory')->where('CategoryId', $row->Id)->get();?>
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
          <li class="cart"><a href="{{route('gio-hang')}}" id="count" count={{Cart::count()}}><i class="fa fa-shopping-cart" style="font-size: 25px;color:black"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<div>
  <div class="advanced_search_area" style="display:none">
    <!-- <select class="selectpicker">
      <option>--Tìm kiếm theo--</option>
      <option>Tất cả</option>
      <option>Quần</option>
      <option>Áo</option>
      <option>Giày</option>
    </select> -->
    <form action="{{route('search')}}" method="GET" style="width: 100%">
      <div class="input-group" style="max-width: 100%">
        <input type="text" class="form-control" name="key_word" placeholder="Tìm sản phẩm ..." aria-label="Search">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit"><i class="icon-magnifier icons"></i></button>
        </span>
      </div>
    </form>
  </div>
</div>
</header>
<!--================End Menu Area =================-->