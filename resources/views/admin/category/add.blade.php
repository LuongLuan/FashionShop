@extends('adminLayout/masterLayout')
@section('content')
<div class="content-wrapper" style="padding:20px;">
	<h3>Thêm mới danh mục</h3><br>
	<div class="card">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('add-subcate')}}" method="post" role="form" style="padding:15px" enctype="multipart/form-data">
						{{ csrf_field()}}
						<div class="form-group">
							<label for="input-id">Danh mục cha</label>
							<select name="sltCate" id="inputSltCate" class="form-control" required="required">
								<option value="">- Chọn -</option>
								@foreach($cate as $row)
								<option value="{{$row->Id}}">{{$row->Name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="input-id">Tên danh mục</label>
							<input type="text" name="txtCateName" id="inputTxtCateName" class="form-control" value="" required="required">
						</div>
						<div class="form-group">
							<label for="input-id">Hình ảnh</label>
							<input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control">
						</div>

						<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm danh mục" style="margin-bottom:20px">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection