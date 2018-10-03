<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShopBee | Admin</title>
    <base href="http://localhost:8080/dacn/">
    <link rel="icon" href="source/AdminLTE/dist/img/AdminLTELogo.png" type="image/x-icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="source/AdminLTE/plugins/datatables/dataTables.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="source/AdminLTE/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <style>
  .alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
  }
  .alert-success, .alert-success a, .bg-success, .bg-success a, .label-success, .label-success a {
  color: #155724;
  }
  .alert-success, .bg-success, .label-success {
  background-color: #d4edda;
  }
  #loading {
  background-color:white;
  position: fixed;
  display: block;
  top: 0;
  bottom: 0;
  z-index: 1000000;
  opacity: 0.5;
  width: 100%;
  height: 100%;
  text-align: center;
  }
  #loading img {
  width: 10%;
  margin: auto;
  display: block;
  top: calc(50% - 100px);
  left: calc(50% - 10px);
  position: absolute;
  z-index: 999999;
  }
  </style>
  <body class="hold-transition sidebar-mini">
    <div id="loading" style="display:none;">
      <img src="img/loading.gif" alt="Loading..."/>
    </div>
    <div class="wrapper">
      @include('adminLayout/nav')
      @include('adminLayout/menu')
      @yield('content')

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.0.0-alpha
        </div>
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="source/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="source/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="source/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="source/AdminLTE/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- SlimScroll -->
    <script src="source/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="source/AdminLTE/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="source/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="source/AdminLTE/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function () {
    $("#all_p").DataTable({
    destroy: true,
    "paging": false,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "lengthMenu": [5, 10, 50, 75, 100]
    });
    $("#order").DataTable({
    "paging": false,
    "lengthChange": true,
    "searching": true,
    "ordering": false,
    "info": false,
    "autoWidth": false,
    "lengthMenu": [5, 10, 50, 75, 100]
    });
    });
    $(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    getPosts(page);
    });
    function getPosts(page)
    {
    var url = $(location).attr('href');
    $("#loading").show();
    type_pro = $('#pro').val();
    $.ajax({
    type: "GET",
    url: url+'&page='+ page
    })
    .done(function(data) {
    $("#loading").hide();
    $('body').html(data);
    });
    }
    </script>
  </body>
</html>