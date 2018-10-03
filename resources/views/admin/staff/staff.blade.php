@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý nhân viên
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
              <h3 class="card-title">Danh sách nhân viên <a href="{{route('create-staff')}}"><button class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Thêm nhân viên </button> </a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="all_p" class="table table-bordered table-striped">
                <thead>
                  <tr style="background: cadetblue">
                    <th>Mã NV</th>
                    <th>Tên nhân viên</th>
                    <th>Tài khoản</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($staff as $row)
                  <tr>

                    <td> {{$row->Id}} </td>
                    <td> {{$row->Name}} </td>
                    <td> {{$row->Username}} </td>
                    <td> {{$row->Address}} </td>
                    <td> {{$row->Phone}} </td>
                    <td><a href="{{route('del-staff',$row->Id)}}" class="btn btn-danger"><i class="fa fa-trash" style="color:white"></i> Xóa</a>&nbsp;<a href="{{route('get-edit',$row->Id)}}" class="btn btn-primary"><i class="fa fa-edit" style="color:white"></i> Cập nhật</a></td>
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