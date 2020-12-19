
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Login Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{asset('eshop/shop/css/bootstrap.css')}}>
    <!-- Magnific Popup -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/magnific-popup.min.css')}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/font-awesome.css')}}>
    <!-- Fancybox -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/jquery.fancybox.min.css')}}>
    <!-- Themify Icons -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/themify-icons.css')}}>
    <!-- Jquery Ui -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/jquery-ui.css')}}>
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/niceselect.css')}}>
    <!-- Animate CSS -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/animate.css')}}>
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/flex-slider.min.css')}}>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/owl-carousel.css')}}>
    <!-- Slicknav -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/slicknav.min.css')}}>

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href={{asset('eshop/shop/css/reset.css')}}>
    <link rel="stylesheet" href={{asset('eshop/shop/style.css')}}>
    <link rel="stylesheet" href={{asset('eshop/shop/css/responsive.css')}}>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    {{--        <link href="{{asset('MDB/css/bootstrap.min.css')}}" rel="stylesheet">--}}
    {{--        <!-- Material Design Bootstrap -->--}}
    {{--        <link href="{{asset('MDB/css/mdb.min.css')}}" rel="stylesheet">--}}
    {{--        <!-- Your custom styles (optional) -->--}}
    {{--        <link href="{{asset('MDB/css/style.css')}}" rel="stylesheet">--}}

    <link rel="stylesheet" href={{asset('tmart/css/bootstrap.min.css')}}>
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href={{asset('tmart/css/core.css')}}>
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href={{asset('tmart/css/shortcode/shortcodes.css')}}>
    <!-- Theme main style -->
    <link rel="stylesheet" href={{asset('tmart/style.css')}}>
    <!-- Responsive css -->
    <link rel="stylesheet" href={{asset('tmart/css/responsive.css')}}>
    <!-- User style -->
    <link rel="stylesheet" href={{asset('tmart/css/custom.css')}}>


    <!-- Modernizr JS -->
    <script src={{asset('tmart/js/vendor/modernizr-2.8.3.min.js')}}></script>
</head>
<body class="js">

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
@include('page.layouts.header')
@include('page.layouts.breadcrumbs')

<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0)  no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div class="nofication">
                        <?php
                        $message = Session::get('notification');
                        if($message){
                            echo $message;
                            Session::put('notification',null);
                        }
                        ?>
                    </div>
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form class="login" method="post" action="{{route('dashboard')}}">
                            {{ csrf_field() }}
                            <input type="text" placeholder="User Name*" name="admin_email" required>
                            <input type="password" placeholder="Password*" name="admin_password" required>
                            <div class="tabs__checkbox" style="margin-top: 15px">
                                <input type="checkbox" style="height: 13px;width: 22px;">
                                <span> Remember me</span>
                                <span class="forget"><a href="#">Forget Pasword?</a></span>
                            </div>
                            <div class="htc__login__btn mt--30">
                                <a href="" >
                                    <button type="submit" style="border: none; color: #0b0b0b;height: auto;background: transparent;outline: none">Login</button>
                                </a>
                            </div>
                        </form>

                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form action="{{route('add_customer')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Name*" name="name_customer">
                            <input type="email" placeholder="Email*" name="email_customer">
                            <input type="password" placeholder="Password*" name="password_customer">
                            <input type="text" placeholder="Phone*" name="phone_customer">
                            <div class="tabs__checkbox">
                                <input type="checkbox">
                                <span> Remember me</span>
                            </div>
                            <div class="htc__login__btn">
                                <a href=""><button type="submit" style="border: none; color: #0b0b0b;height: auto;background: transparent;outline: none">Register</button></a>
                            </div>
                        </form>

                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
@include('page.layouts.footer');

<!-- Jquery -->
<script src={{asset('eshop/shop/js/jquery.min.js')}}></script>
<script src={{asset('eshop/shop/js/jquery-migrate-3.0.0.js')}}></script>
<script src={{asset('eshop/shop/js/jquery-ui.min.js')}}></script>
<!-- Popper JS -->
<script src={{asset('eshop/shop/js/popper.min.js')}}></script>
<!-- Bootstrap JS -->
<script src={{asset('eshop/shop/js/bootstrap.min.js')}}></script>
<!-- Color JS -->
<script src={{asset('eshop/shop/js/colors.js')}}></script>
<!-- Slicknav JS -->
<script src={{asset('eshop/shop/js/slicknav.min.js')}}></script>
<!-- Owl Carousel JS -->
<script src={{asset('eshop/shop/js/owl-carousel.js')}}></script>
<!-- Magnific Popup JS -->
<script src={{asset('eshop/shop/js/magnific-popup.js')}}></script>
<!-- Fancybox JS -->
<script src={{asset('eshop/shop/js/facnybox.min.js')}}></script>
<!-- Waypoints JS -->
<script src={{asset('eshop/shop/js/waypoints.min.js')}}></script>
<!-- Countdown JS -->
<script src={{asset('eshop/shop/js/finalcountdown.min.js')}}></script>
<!-- Nice Select JS -->
<script src={{asset('eshop/shop/js/nicesellect.js')}}></script>
<!-- Ytplayer JS -->
<script src={{asset('eshop/shop/js/ytplayer.min.js')}}></script>
<!-- Flex Slider JS -->
<script src={{asset('eshop/shop/js/flex-slider.js')}}></script>
<!-- ScrollUp JS -->
<script src={{asset('eshop/shop/js/scrollup.js')}}></script>
<!-- Onepage Nav JS -->
<script src={{asset('eshop/shop/js/onepage-nav.min.js')}}></script>
<!-- Easing JS -->
<script src={{asset('eshop/shop/js/easing.js')}}></script>
<!-- Active JS -->
<script src={{asset('eshop/shop/js/active.js')}}></script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        // MDB Lightbox Init--}}
{{--        $(function () {--}}
{{--            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--<script type="text/javascript" src="{{asset('MDB/js/jquery-3.4.1.min.js')}}"></script>--}}
{{--<!-- Bootstrap tooltips -->--}}
{{--<script type="text/javascript" src="{{asset('MDB/js/popper.min.js')}}"></script>--}}
{{--<!-- Bootstrap core JavaScript -->--}}
{{--<script type="text/javascript" src="{{asset('MDB/js/bootstrap.min.js')}}"></script>--}}
{{--<!-- MDB core JavaScript -->--}}
{{--<script type="text/javascript" src="{{asset('MDB/js/mdb.min.js')}}"></script>--}}

<!-- jquery latest version -->
<script src={{asset('tmart/js/vendor/jquery-1.12.0.min.js')}}></script>
{{--<!-- Bootstrap framework js -->--}}
<script src={{asset('tmart/js/bootstrap.min.js')}}></script>
{{--<!-- All js plugins included in this file. -->--}}
<script src={{asset('tmart/js/plugins.js')}}></script>
{{--<script src={{asset('tmart/js/slick.min.js')}}></script>--}}
<script src={{asset('tmart/js/owl.carousel.min.js')}}></script>
<!-- Waypoints.min.js. -->
<script src={{asset('tmart/js/waypoints.min.js')}}></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src={{asset('tmart/js/main.js')}}></script>

<script >
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
</body>
</html>



