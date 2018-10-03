@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý bình luận
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
              <h3 class="card-title">Danh sách bình luận</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="all_p" class="table table-bordered table-striped">
                <thead>
                  <tr style="background: cadetblue">
                    <th>Email</th>
                    <th>Tên khách hàng</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cmt as $row)
                  <tr>
                    <?php $pro = DB::table('product')->where('Id', $row->ProductId)->first();?>
                    <td> {{$row->Email}} </td>
                    <td> {{$row->Author}} </td>
                    <td> {{$pro->Name}} </td>
                    <td> {{$row->Content}} </td>
                    <td> {{$row->CreateDate}} </td>
                    <td> <a href="{{route('active-cmt',$row->Id)}}">@if($row->Status==0) <span style="color:red"><i class="fa fa-exclamation-circle"></i></span> @else <span style="color:green"><i class="nav-icon fa fa-check"></i></span> @endif</a> | <a href="{{route('del-comment',$row->Id)}}"><i class="fa fa-trash" style="color:brown"></i></a></td>
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