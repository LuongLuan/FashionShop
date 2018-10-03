<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="admin/home" class="brand-link">
    <img src="source/AdminLTE/dist/img/AdminLTELogo.png"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">ShopBee</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="" style="margin-bottom:-30px">
      <a class="permission">Quyền: <span class="badge badge-danger">@if(Session('role') == 0)Nhân viên @else Quản lý @endif</span></a>
    </div><br>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="source/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Session('user')}}</a>
      </div>
      <div class="info">
        <a href="{{route('logout-admin')}}" class="d-block">|&nbsp;&nbsp; Đăng xuất</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="{{route('home-admin')}}" class="nav-link">
            <i class="nav-icon fa fa-dashboard" style="color:pink"></i>
            <p>
              Bảng điều khiển
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('statistic')}}" class="nav-link">
            <i class="fa fa-signal" style="font-size: 21px;margin-right: 7px;color:#dc3545"></i>
            <p>
              Thống kê doanh thu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('product')}}" class="nav-link">
            <i class="nav-icon fa fa-th-large" style="color:#00bcd4"></i>
            <p>
              Sản phẩm
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('category')}}" class="nav-link">
            <i class="nav-icon fa fa-list-ul" style="color:burlywood"></i>
            <p>
              Danh mục sản phẩm
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('order')}}" class="nav-link">
            <i class="fa fa-shopping-cart" style="margin-right: 9px;font-size: 21px;color:#28a745"></i>
            <p>
              Đơn hàng
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('comment')}}" class="nav-link">
            <i class="fa fa-comments-o" style="margin-right: 9px;font-size: 21px;color:#ff5722"></i>
            <p>
              Bình luận
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('customer')}}" class="nav-link">
            <i class="fa fa-users mr-2" style="font-size: 21px;color:#17a2b8"></i>
            <p>
              Khách hàng
            </p>
          </a>
        </li>
        @if(Session('role') == 1)
        <li class="nav-item">
          <a href="{{route('get-staff')}}" class="nav-link">
            <i class="fa fa-user mr-2" style="font-size: 21px;color:#ffc107"></i>
            <p>
              Quản lý nhân viên
            </p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>