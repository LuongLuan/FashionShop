@extends('adminLayout/masterLayout')
@section('content')
<div class="content-wrapper" style="padding:10px">
  <div>
    <div class="row1" style="margin-left:5px">
      <h4 style="">Thống kê bán hàng</h4>
      <form action="{{route('statistic')}}" method="GET">
        <div style="float: left">
          <label for="date-start">Từ ngày</label>
          <input id="start" type="date" name="start" class="form-control" required style="width: 200px; margin-right:20px">
        </div>
        <div style="float: left">
          <label for="date-start">Đến ngày</label>
          <input id="end" type="date" name="end" class="form-control" required  style="width: 200px">
        </div>
        <div>
          <button type="submit" style="margin:33px 0 0 20px" class="btn btn-info"><i class="fa fa-filter"></i> Lọc</button>
        </div>
      </form>
    </div>
  </div><br>
  @if(count($revenue)>0)
  <div class="row">
    <div class="col-md-6">
            <div class="card" style="width: 200%">
              <div class="card-header">
                <h3 class="card-title">Doanh thu từ ngày: <span style="color:brown">{{date('d-m-Y',strtotime($date_start))}}</span> đến <span style="color:brown">{{date('d-m-Y',strtotime($date_end))}}</span></h3>

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
                <table class="table" style="width: 100%">
                  <tbody><tr>
                    <th>Mã số</th>
                    <th>Họ tên</th>
                    <th>Ngày đặt</th>
                    <th>Số tiền</th>
                    <th>Hành động</th>
                  </tr>
                  @foreach($revenue as $row)
                  <tr>
                    <td>{{$row->Id}}</td>
                    <td>{{$row->Name}}</td>
                    <td>{{$row->Createtime}}</td>
                    <!-- <td><span class="badge bg-danger">55</span></td> -->
                    <td><span class="badge bg-warning">{{number_format($row->Cart_total,0)}} đ</span></td>
                    <td><a href="{{route('order-detail',$row->Id)}}"><span"><i class="fa fa-info-circle"></i> Xem</span></a></td>
                  </tr>
                  @endforeach
                  <tr>
                    <td>
                      Tổng doanh thu: <span class="badge bg-danger">{{number_format($sum,0)}} đ</span>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
  </div>
  @else
  <div class="row">
    <span style="color:red;margin-left:20px"><i>Chưa có dữ liệu thống kê</i></span>
  </div>
  @endif
</div>
@endsection