@extends('adminLayout/masterLayout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục
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
              <h3 class="card-title">Tất cả danh mục <a href="{{Url('admin/create')}}"><button class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Thêm danh mục </button> </a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="cate" class="table table-bordered table-striped">
                <thead>
                  <tr style="background: cadetblue">
                    <th>Mã</th>
                    <th>Tên danh mục</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cate as $row)
                  <?php $sub = DB::table('subcategory')->where('CategoryId', $row->Id)->get();?>

                  <tr>
                    <td> <b>{{$row->Id}} </b></td>
                    <td><b style="color:blue"> -- {{$row->Name}} -- </b></td>
                    <td><a href="{{route('edit-cate',$row->Id)}}"><span class="btn btn-primary" style="color:white"><i class="fa fa-pencil-square-o"></i> Sửa</span></a></td>
                  </tr>
                  @foreach($sub as $row)
                  <tr>
                    <td>{{$row->Id}}</td>
                    <td style="color:green">------ {{$row->Name}}</td>
                    <td style="width: 17%"> <a href="{{route('edit-sub-cate',$row->Id)}}"><span class="btn btn-primary" style="color:white"><i class="fa fa-pencil-square-o"></i> Sửa</span></a>  <a href="{{route('del-sub',$row->Id)}}"><span class="btn btn-danger" style="color:white"><i class="fa fa-trash" style="color:white"></i> Xóa</span></a> </td>
                  </tr>
                  @endforeach
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