@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chi tiết đơn hàng
          @if(Session::has('message'))
          <br>
          <span style="color:green;font-size: 17px;font-weight: 500"><i class="nav-icon fa fa-check"></i>
            {{Session('message')}}
          </span>
          @endif</h1>
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
                  <tr style="background: cadetblue">
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Thanh toán</th>
                    <th>Ghi chú</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <td> {{$order->CustomerId}} </td>
                    <td> {{$order->Name}} </td>
                    <td> {{$order->Email}} </td>
                    <td> {{$order->Address}} </td>
                    <td> {{$order->Phone}} </td>
                    <td> {{$order->Payment}} </td>
                    <td> {{$order->Note}} </td>
                    <td> {{$order->Createtime}} </td>
                    <td> {{$order->Cart_total}}</td>
                  </tr>

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
                  <?php $pro = DB::table('product')->where('Id', $row->ProductId)->first();?>
                  <tr>
                    <td> {{$row->ProductId}} </td>
                    <td> <img src="img/product/{{$pro->Image1}}" style="width: 50px;height: 50px"> </td>
                    <td> {{$pro->Name}} </td>
                    <td> {{$row->Quantity}} </td>
                    <td> {{number_format($row->Price)}} đ</td>
                    <td> @if($pro->Available == 0)<span style="color:red">Hết hàng</span>@else <span style="color:green">Còn hàng</span> @endif</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- @if($order->Status == 0)
          <div style="float: left;margin-right:20px"><a href="{{route('active',$order->Id)}}"><button style="margin:0 0 30px 0px" class="btn btn-success"> Xác nhận đơn hàng</button></a></div>
          @else
          <div style="float: left;margin-right:20px"><a><button style="margin:0 0 30px 0px" class="btn btn-info"> Đơn hàng đã xử lý</button></a></div>
          @endif
          <div><a href="{{route('del-order',$order->Id)}}"><button style="margin:0 0 30px 0px" class="btn btn-danger"> Hủy đơn hàng</button></a></div> -->

          Trạng thái đơn hàng:
          @if($order->Status == 0)
          <span style="color:red"><i class="fa fa-exclamation-circle"></i> Chưa xử lý</span>
          @elseif($order->Status == 1)
          <span style="color:#00bcd4"><i class="fa fa-truck"></i> Đang giao hàng</span>
          @else
          <span style="color:green"><i class="nav-icon fa fa-check"></i> Đã giao hàng</span>
          @endif
          <br><br>
          <h5>Thay đổi trạng thái đơn hàng:</h5>
          <form action="{{route('active',$order->Id)}}" method="GET" style="margin-bottom:100px">
            <select required name="stt" class="form-control" style="width: 15%;float: left;margin-right:10px">
              <option value="">Chọn</option>
              <option value="0">Chưa xử lý</option>
              <option value="1">Đang giao hàng</option>
              <option value="2">Đã giao hàng</option>
            </select>
            <button type="submit" class="btn btn-success">Lưu</button>
          </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection