<!DOCTYPE html>
<html lang="en">
    <head> 
        <base href="http://localhost:8080/blog/public/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="source/persuit/img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Persuit</title>

        <!-- Icon css link -->
        <link href="source/persuit/css/font-awesome.min.css" rel="stylesheet">
        <link href="source/persuit/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="source/persuit/vendors/elegant-icon/style.css" rel="stylesheet">
        <link href="source/persuit/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link href="source/persuit/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="source/persuit/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="source/persuit/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="source/persuit/vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="source/persuit/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="source/persuit/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="source/persuit/vendors/vertical-slider/css/jQuery.verticalCarousel.css" rel="stylesheet">
        
        <link href="source/persuit/css/style.css" rel="stylesheet">
        <link href="source/persuit/css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
    .l_product_item .l_p_text{
        height: 95px;
    }
    .fa, .fas {
        font-weight: 900;
        color: white;
        font-size: 13px;
    }

    </style>
    <body style="position: relative;">
        
        @include('header')  
        @yield('content')
        @include('footer')

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="source/persuit/js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="source/persuit/js/popper.min.js"></script>
        <script src="source/persuit/js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="source/persuit/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="source/persuit/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="source/persuit/vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="source/persuit/vendors/counterup/jquery.counterup.min.js"></script>
        <script src="source/persuit/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="source/persuit/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="source/persuit/vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="source/persuit/js/smoothscroll.js"></script>
        <script src="source/persuit/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="source/persuit/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="source/persuit/vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="source/persuit/vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="source/persuit/vendors/jquery-ui/jquery-ui.js"></script>
        
        <script src="source/persuit/js/theme.js"></script>
    </body>
</html>