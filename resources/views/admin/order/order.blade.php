@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý đơn hàng
          @if(Session::has('message'))
          <br>
          <span style="color:green;font-size: 17px;font-weight: 500"><i class="nav-icon fa fa-check"></i>
            {{Session('message')}}
          </span>
          @endif
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Tables</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="order" class="table table-bordered table-striped">
                <thead>
                  <tr style="background: cadetblue">
                    <th>Mã</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Ghi chú</th>
                    <th>Thanh toán</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th style="width: 150px">Trạng thái</th>
                    <th style="width: 17%">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order as $row)
                  <tr>
                    <td> {{$row->Id}} </td>
                    <td> {{$row->Name}} </td>
                    <td> {{$row->Address}} </td>
                    <td> {{$row->Phone}} </td>
                    <td> {{$row->Email}} </td>
                    <td> {{$row->Note}} </td>
                    <td> {{$row->Payment}} </td>
                    <td> {{$row->Createtime}} </td>
                    <td> {{$row->Cart_total}} </td>
                    <td> @if($row->Status == 0)<span style="color:red"><i class="fa fa-exclamation-circle"></i> Chưa xử lý</span>@elseif($row->Status == 1) <span style="color:#00bcd4"><i class="fa fa-truck"></i> Đang giao hàng</span> @else
                    <span style="color:green"><i class="nav-icon fa fa-check"></i> Hoàn thành</span>
                    @endif

                  </td>
                  <td><a href="{{route('order-detail',$row->Id)}}"><span class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Xem</span>  <a href="{{route('del-order',$row->Id)}}"><span class="btn btn-danger"><i class="fa fa-trash"></i> Xóa </span></a></a></td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <div style="float: right">{{$order->links()}}</div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection