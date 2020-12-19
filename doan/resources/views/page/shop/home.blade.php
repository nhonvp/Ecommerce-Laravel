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
    <!-- StyleSheet -->
    <!-- Bootstrap -->
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
    <link rel="stylesheet" href={{asset('eshop/shop/css/sweetalert.css')}}>
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
{{--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >--}}
{{--    <div class="carousel-inner">--}}
{{--        <div class="carousel-item active">--}}
{{--            <img class="" src="/public/upload/slider/banner-balo15.jpg" alt="First slide">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img class="d-block w-100" src="/public/upload/slider/cantho11.jpg" alt="Second slide">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img class="d-block w-100" src="/public/upload/slider/sale_friday77.jpg" alt="Third slide">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
{{--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--        <span class="sr-only">Previous</span>--}}
{{--    </a>--}}
{{--    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
{{--        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--        <span class="sr-only">Next</span>--}}
{{--    </a>--}}
{{--</div>--}}
{{--@include('page.layouts.breadcrumbs')--}}
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Categories</h3>
                        @foreach($category as $key =>$cate_pro)
                        <ul class="categor-list">
                            <li><a href="{{ route('shop_gird.category',$cate_pro->id) }}">{{$cate_pro->category_name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="single-widget category">
                        <h3 class="title">Brand</h3>
                        @foreach($brand as $key =>$brand_pro)
                            <ul class="categor-list">
                                <li><a href="{{ route('shop_gird.brand',$brand_pro->id) }}">{{$brand_pro->brand_name}}</a></li>
                            </ul>
                        @endforeach
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Shop By Price -->
                    <div class="single-widget range">
                        <h3 class="title">Shop by Price</h3>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="check-box-list">
                            <li>
                                <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
                            </li>
                            <li>
                                <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
                            </li>
                            <li>
                                <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
                            </li>
                        </ul>
                    </div>
                    <!--/ End Shop By Price -->
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</section>
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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="94ctRLMz"></script>
{{--<script>--}}
{{--    $('.carousel').carousel({--}}
{{--        interval: 1500--}}
{{--    })--}}
{{--</script>--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
            success: function (data_view) {
                swal("Add To Cart Success !", "You clicked the button!", "success");
            }})
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
    $('.sort').change(function (){
        var url = $(this).val() ;
        window.location= url;
    })
    $('.show').change(function (){
        var url = $(this).val();
        window.location= url;
    })
</script>
<script src="//code.tidio.co/rmdvncrdj2lsccgw7yqqvydey7adpxbz.js" async></script>
</body>
</html>

