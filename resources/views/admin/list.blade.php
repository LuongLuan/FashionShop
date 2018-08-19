@extends('adminLayout/masterLayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
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
              <h3 class="card-title">Tất cả sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="all_p" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
 				@foreach($product as $row)
                <tr>
               
                  <td> {{$row->Id}} </td>
                  <td><img style="width: 60px;height: 60px" src="source/persuit/img/product/product1/{{$row->Image1}}" alt=""></td>
                  <td> {{$row->Name}} </td>
                  <td> {{$row->SubCategoryId}} </td>
                  <td> {{substr($row->Description,0,100)}}[...] </td>
                  <td> {{$row->Price}} </td>
                  <td> {{$row->Size}} </td>
                  <td> {{$row->TotalView}} </td>
                  <td> {{$row->Percent_off}} </td>
                  <td> @if($row->Available == 1) Còn hàng @else Hết hàng @endif</td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </tfoot>
              </table>
              <div style="float: right">{{$product->links()}}</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sản phẩm khuyến mãi</h3>
            </div>
            <!-- /.card-header -->
           <div class="card-body">
              <table id="sale_p" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
 				@foreach($sale_p as $row)
                <tr>
               
                  <td> {{$row->Id}} </td>
                  <td><img style="width: 60px;height: 60px" src="source/persuit/img/product/product1/{{$row->Image1}}" alt=""></td>
                  <td> {{$row->Name}} </td>
                  <td> {{$row->SubCategoryId}} </td>
                  <td> {{substr($row->Description,0,100)}}[...] </td>
                  <td> {{$row->Price}} </td>
                  <td> {{$row->Size}} </td>
                  <td> {{$row->TotalView}} </td>
                  <td> {{$row->Percent_off}} </td>
                  <td> @if($row->Available == 1) Còn hàng @else Hết hàng @endif</td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </tfoot>
              </table>
              <div style="float: right">{{$sale_p->links()}}</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Sản phẩm mới</h3>
            </div>
            <!-- /.card-header -->
           <div class="card-body">
              <table id="new_p" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
 				@foreach($new_p as $row)
                <tr>
               
                  <td> {{$row->Id}} </td>
                  <td><img style="width: 60px;height: 60px" src="source/persuit/img/product/product1/{{$row->Image1}}" alt=""></td>
                  <td> {{$row->Name}} </td>
                  <td> {{$row->SubCategoryId}} </td>
                  <td> {{substr($row->Description,0,100)}}[...] </td>
                  <td> {{$row->Price}} </td>
                  <td> {{$row->Size}} </td>
                  <td> {{$row->TotalView}} </td>
                  <td> {{$row->Percent_off}} </td>
                  <td> @if($row->Available == 1) Còn hàng @else Hết hàng @endif</td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Loại</th>
                  <th>Mô tả</th>
                  <th>Đơn giá</th>
                  <th>Size</th>
                  <th>Lượt xem</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                </tr>
                </tfoot>
              </table>
              <div style="float: right">{{$new_p->links()}}</div>
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