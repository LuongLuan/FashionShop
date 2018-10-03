@extends('adminLayout/masterLayout')
@section('content')
<div class="content-wrapper" style="padding:20px;">
	<h3>Cập nhật danh mục sản phẩm</h3><br>
	<div class="card">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('update-subcate',$s_cate->Id)}}" method="post" role="form" style="padding:15px" enctype="multipart/form-data">
						{{ csrf_field()}}
						<div class="form-group">
							<label for="input-id">Danh mục con</label>
							<input type="text" name="txtsubcate" class="form-control" value="{{$s_cate->Name}}" required="required">
						</div>
						<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Cập nhật" style="margin-bottom:20px">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection