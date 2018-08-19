@extends('adminLayout/masterLayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý đơn hàng</h1>
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
                <tr>
                  <th>Mã</th>
                  <th>Tên khách hàng</th>
                  <th>Địa chỉ</th>
                  <th>Điện thoại</th>
                  <th>Email</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Tổng tiền</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
 				       @foreach($order as $row)
                <?php $cus = DB::table('users')->where('id',$row->CustomerId)->first(); ?>
                <tr>
                  <td> {{$row->Id}} </td>
                  <td> {{$cus->name}} </td>
                  <td> {{$row->Address}} </td>
                  <td> {{$row->Phone}} </td>
                  <td> {{$row->Email}} </td>
                  <td> {{$row->Createtime}} </td>
                  <td> @if($row->Status == 0)<span style="color:red">Chưa xử lý</span>@else <span style="color:red">Đã xử lý</span> @endif</td>
                  <td> {{$row->Cart_total}} </td>
                  <td><a href="{{route('order-detail',$row->Id)}}">Chi tiết | <a href="">Hủy</a></a></td>
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