@extends('adminLayout/masterLayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng</h1>
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
              <h3 class="card-title">Khách hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã KH</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Địa chỉ</th>
                  <th>Điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
               @foreach($order as $row)
                  <?php $cus = DB::table('users')->where('id',$row->CustomerId)->first(); ?>
                <tr>
                  <td> {{$row->CustomerId}} </td>
                  <td> {{$cus->name}} </td>
                  <td> {{$row->Email}} </td>
                  <td> {{$row->Address}} </td>
                  <td> {{$row->Phone}} </td>
                  <td> {{$row->Createtime}} </td>
                  <td> {{$row->Cart_total}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sản phẩm trong đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã SP</th>
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Giá</th>
                  <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
 				       @foreach($o_detail as $row)
                <?php $pro = DB::table('product')->where('Id',$row->ProductId)->first(); ?>
                <tr>
                  <td> {{$row->ProductId}} </td>
                  <td> <img src="source/persuit/img/product/product1/{{$pro->Image1}}" style="width: 50px;height: 50px"> </td>
                  <td> {{$pro->Name}} </td>
                  <td> {{$row->Quantity}} </td>
                  <td> {{number_format($row->Price)}} </td>
                  <td> @if($pro->Available == 0)<span style="color:red">Hết hàng</span>@else <span style="color:red">Còn hàng</span> @endif</td>
                </tr>
                @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
           <div ><a href=""><button style="margin:0 0 30px 0px" class="btn btn-success"> Xác nhận đơn hàng</button></a></div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection