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
    <title>Shop Sales</title>
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
{{--    <link href="{{asset('MDB/css/bootstrap.min.css')}}" rel="stylesheet">--}}
{{--    <!-- Material Design Bootstrap -->--}}
{{--    <link href="{{asset('MDB/css/mdb.min.css')}}" rel="stylesheet">--}}
{{--    <!-- Your custom styles (optional) -->--}}
{{--    <link href="{{asset('MDB/css/style.css')}}" rel="stylesheet">--}}

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
{{--@include('page.layouts.breadcrumbs')--}}
@yield('content')
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

//Nofication
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
<script>
    $('.quickview').click(function (){
        var product_id  = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'{{url('/quickview')}}',
            method:'POST',
            dataType: "JSON",
            data: {product_id:product_id,_token:_token},
            success: function (data){
                $('#quickview_id').html(data.product_id);
                $('#quickview_name').html(data.product_name);
                if(data.product_old_price){
                    $('#quickview_old_price').html(data.product_old_price+'VND');
                }else
                {
                    $('#quickview_old_price').html('');
                }
                $('#quickview_price').html(data.product_price +'VND');
                $('#quickview_desc').html(data.product_desc);
                $('#quickview_content').html(data.product_content);
                $('#quickview_image').html(data.product_image);
                $('#quickview_image_gallery').html(data.product_gallery);
                $('#quickview_rating').html(data.product_rating);
            }
        });
    });
    $('.add-to-cart-view').click(function (e){
        // e.preventDefault();
        var product_id_view = $('.product_hidden_view').val();
        var product_qty_view = $('.quantity_view').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/save-cart-view')}}',
            method: 'POST',
            data: {product_id_view:product_id_view,product_qty_view:product_qty_view,_token:_token},
            success: function (data_view){
                swal("Add To Cart Success !", "You clicked the button!", "success");
            }
        })
    });
    $('.add-to-cart').click(function (){
        var product_id = $(this).data('product_hidden')
        var product_qty=1;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/save-cart-view')}}',
            method: 'POST',
            data: {product_id_view:product_id,product_qty_view:product_qty,_token:_token},
            success: function (data_view){
                swal("Add To Cart Success !", "You clicked the button!", "success");
            }
        })
    })
</script>
//google map
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
<script src={{asset('eshop/shop/js/gmap.min.js')}}></script>
<script src={{asset('eshop/shop/js/map-script.js')}}></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>



