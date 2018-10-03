@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý khách hàng
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
              <h3 class="card-title">Danh sách khách hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="all_p" class="table table-bordered table-striped">
                <thead>
                  <tr style="background: cadetblue">
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Ngày đăng ký</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cus as $row)
                  <tr>

                    <td> {{$row->id}} </td>
                    <td> {{$row->name}} </td>
                    <td> {{$row->email}} </td>
                    <td> {{$row->address}} </td>
                    <td> {{$row->phone}} </td>
                    <td> {{$row->created_at}} </td>
                    <td><a href="{{route('del-cus',$row->id)}}"><i class="fa fa-trash" style="color:brown"></i></a></td>
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
    <!-- /.content -->
  </div>
  @endsection