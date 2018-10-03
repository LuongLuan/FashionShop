@extends('adminLayout.masterLayout')
@section('content')
<br><br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="background: #d91522;"><span style="color:white">Cập nhật thông tin nhân viên</span></div>
        <div class="card-body">
          <form method="POST" action="{{ route('edit-staff',$staff->Id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Họ và tên*</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" value="{{$staff->Name}}" name="name" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">Tài khoản*</label>
              <div class="col-md-6">
                <input id="username" type="text" class="form-control" value="{{$staff->Username}}" name="username" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu*</label>
              <div class="col-md-6">
                <input id="password" type="password" maxlength="20" minlength="6" class="form-control" value="{{$staff->Password}}" name="password" required> <span onmousedown="show()" onmouseup="hide()" onmouseout="hide()" class="eye" style="float: right;margin: -32px 10px 0 0;"><i class="fa fa-eye"></i></span>
              </div>
              <script>
                function show(){
                    var pass = document.getElementById('password');
                      pass.setAttribute('type','text');
                  }
                  function hide(){
                    var pass = document.getElementById('password');
                      pass.setAttribute('type','password');
                  }

              </script>
            </div>
            <!-- <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu*</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div> -->
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">Địa chỉ*</label>
              <div class="col-md-6">
                <input id="address" type="text" class="form-control" value="{{$staff->Address}}" name="address" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">Điện thoại*</label>
              <div class="col-md-6">
                <input id="phone" type="text" class="form-control" value="{{$staff->Phone}}" name="phone" maxlength="11" minlength="10" required autofocus>
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4" style="">
                <button type="submit" class="btn btn-primary">
                Cập nhật
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection