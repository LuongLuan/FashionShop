@extends('adminLayout/masterLayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm
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
              
              <h3 class="card-title">Tất cả sản phẩm <a href="{{route('add-product')}}"><button class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Thêm sản phẩm </button> </a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="sel1">Loại sản phẩm &nbsp;</label>
                <select style="font-size: 15px;width: 200px" class="form-control input-sm" id="pro" name="pro" onchange="Product()">
                    
                    <option value="all" {{Session('slt3')}}>Tất cả sản phẩm </option>
                    <option value="sale" {{Session('slt0')}}>Sản phẩm khuyến mãi </option>
                    <option value="hot" {{Session('slt2')}}>Sản phẩm nổi bật</option>
                    <option value="new" {{Session('slt1')}}>Sản phẩm mới</option>
                </select>
                <script>
                    function Product(id) {
                        var val = document.getElementById("pro").value;
                        window.location = 'admin/product?pro=' + val;
                    }
                </script>
            </div>
              <table id="all_p" class="table table-bordered table-striped">
                <thead>
                <tr style="background: cadetblue">
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 250px">Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>Đơn giá</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                  <th style="width: 17%">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($product as $row)
                <tr>
               
                  <td> {{$row->Id}} </td>
                  <td><img style="width: 60px;height: 60px;border-radius:5px;border: solid 1px gray" src="img/product/{{$row->Image1}}" alt=""></td>
                  <td> {{$row->Name}} </td>
                  <?php $sub=App\subcategory::where('Id',$row->SubCategoryId)->first() ?>
                  <td> {{$sub->Name}} </td>
                  <td> {{$row->Price}} </td>
                  <td> {{$row->Percent_off}} </td>
                  <td> @if($row->Available == 1) Còn hàng @else Hết hàng @endif</td>
                  <td>
                    <a href="{{route('get-edit-pro',$row->Id)}}">
                    <span class="btn btn-primary" style="color:white"><i class="fa fa-pencil-square-o"></i> Sửa</span>
                  </a> 
                  <a href="{{route('del-product',$row->Id)}}">
                    <span class="btn btn-danger" style="color:white"><i class="fa fa-trash" style="color:white"></i> Xóa</span>
                  </a> 
                </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Mã</th>
                  <th>Hình ảnh</th>
                  <th style="width: 100px">Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>Đơn giá</th>
                  <th>Giảm(%)</th>
                  <th>Trạng thái</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <div class="page-product" style="float: right">{{$product->links()}}</div>
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