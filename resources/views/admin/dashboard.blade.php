@extends('adminLayout/masterLayout')
@section('content')
<div class="content-wrapper" style="padding:10px">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$count}}</h3>
          <p>Đơn hàng chưa xử lý</p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="{{route('order')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$cus}}</h3>
          <p>Khách hàng đăng ký</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('customer')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$or}}</h3>
          <p>Số đơn hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('order')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>
          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tổng quan doanh thu</h3>
          <div class="card-tools">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <tbody>
              <tr>
                <td>Tổng doanh thu</td>
                <td><span class="badge bg-danger">{{number_format($sum,0)}} đ</span></td>
              </tr>
              <tr>
                <td>Hôm nay</td>
                <td><span class="badge bg-warning">{{number_format($sum_today,0)}} đ</span></td>
              </tr>
              <tr>
                <td>Tuần này</td>
                <td><span class="badge bg-info">{{number_format($sum_week,0)}} đ</span></td>
              </tr>
              <!-- <tr>
                <td>Tháng này</td>
                <td><span class="badge bg-success">12.000.000 đ</span></td>
              </tr>
              <tr>
                <td>Năm nay</td>
                <td><span class="badge bg-warning">18.000.000 đ</span></td>
              </tr> -->
            </tbody></table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  @endsection