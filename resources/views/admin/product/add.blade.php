@extends('adminLayout/masterLayout')
@section('content')
<!-- main content - noi dung chinh trong chu -->
<div class="content-wrapper" style="padding:20px;">
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm mới sản phẩm</small></h1>
			</div>
			</div><!--/.row-->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
							<form action="{{route('create-product')}}" method="post" role="form" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="input-id">Danh mục cha</label>
									<select name="sltCate" id="inputSltCate" required class="form-control">
										<option value="">--Chọn--</option>
										<?php $cate = DB::table('Categories')->get();?>
										@foreach($cate as $row)
										<option value="{{$row->Id}}" >{{$row->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="input-id">Danh mục con</label>
									<select name="sltsubCate" id="inputSltCate" required class="form-control">
										<option value="">--Chọn--</option>
										@foreach($subcate as $row)
										<option value="{{$row->Id}}" >{{$row->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="input-id">Loại mặt hàng</label>
									<select name="sltType" required class="form-control">
										<option value="">--Chọn--</option>
										@foreach($type as $row)
										<option value="{{$row->Id}}" >{{$row->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="input-id">Nhà cung cấp</label>
									<select name="sltSup" id="inputSltCate" required class="form-control">
										<option value="">--Chọn nhà cung cấp--</option>
										@foreach($sup as $row)
										<option value="{{$row->Id}}" >{{$row->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="input-id">Tên sản phẩm</label>
									<input type="text" name="txtname" id="inputTxtname" class="form-control" value="{{ old('txtname') }}"  >
								</div>
								<div class="form-group">
									<label for="input-id">Mô tả sản phẩm</label>
									<textarea name="txtdesc" id="inputtxtdesc" class="form-control" rows="4" value="{{ old('txtdesc') }}" required="required"></textarea>
								</div>
								<div class="form-group">
									<label for="input-id">Size </label>
									<input type="text" name="txtsize" id="inputtxtsize" value="{{ old('txtsize') }}" class="form-control" >
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<label for="input-id">Hình ảnh </label>
											<input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control" required="required">
										</div>
										<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
											<label for="input-id">Đơn giá </label>
											<input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{{ old('txtprice') }}" required="required">
										</div>
										<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
											<label for="input-id">Giảm giá (%) </label>
											<input type="number" name="txtdiscount" id="inputtxtprice" class="form-control" value="{{ old('txtdiscount') }}" required="required">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="input-id">Tình trạng</label>
									<select name="sltStatus" id="inputSltCate" required class="form-control">
										<option value="">--Chọn--</option>
										<option value="1" >Còn hàng</option>
										<option value="0" >Hết hàng</option>
									</select>
								</div>
								<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm sản phẩm" class="button" />
							</form>
						</div>
					</div>
				</div>
				</div><!--/.row-->
				</div>	<!--/.main-->
			</div>
			<!-- =====================================main content - noi dung chinh trong chu -->
			@endsection