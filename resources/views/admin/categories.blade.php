@extends('adminLayout/masterLayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý danh mục</h1>
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
              <h3 class="card-title">Tất cả danh mục</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="cate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Tên danh mục</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
 				       @foreach($cate as $row)
                <?php $sub = DB::table('subcategory')->where('CategoryId',$row->Id)->get(); ?>
                
                <tr>
                  <td> <b>{{$row->Id}} </b></td>
                  <td><b style="color:blue"> -- {{$row->Name}} -- </b></td>
                  <td> <a href="">Sửa</a> | <a href="">Xóa</a> </td>
                </tr>
                  @foreach($sub as $row)
                    <tr>
                      <td>{{$row->Id}}</td>
                      <td style="color:green">{{$row->Name}}</td>
                      <td> <a href="">Sửa</a> | <a href="">Xóa</a> </td>
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