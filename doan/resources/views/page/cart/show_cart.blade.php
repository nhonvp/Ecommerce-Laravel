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
    <title>Eshop - eCommerce HTML5 Template.</title>
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
    <link href="{{asset('MDB/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('MDB/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('MDB/css/style.css')}}" rel="stylesheet">
</head>
<body class="js">
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
<div class="shopping-cart section">
    <div class="container">
        <?php
           $content = Cart::content();
////            echo '<prev>';
////            print_r($content);
////            echo '</prev>';
         ?>
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                    <tr class="main-hading">
                        <th>PRODUCT</th>
                        <th>NAME</th>
                        <th class="text-center">UNIT PRICE</th>
                        <th class="text-center">QUANTITY</th>
                        <th class="text-center">TOTAL</th>
                        <th>UPDATE</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                        <form action="{{ route('update_cart_qty') }}" method="post">
                            {{ csrf_field() }}
                    <tr>
                        <td class="image" data-title="No"><img src="upload/product/{{$v_content->options->image}}" alt="#"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name"><a href="#">{{$v_content->name}}</a></p>
{{--                            <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>--}}
                        </td>
                        <td class="price" data-title="Price"><span>{{number_format($v_content->price)}} VND </span></td>
                        <td class="qty" data-title="Qty"><!-- Input Order -->

                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[{{$v_content->rowId}}]">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quant[{{$v_content->rowId}}]" class="input-number"  data-min="1" data-max="100" value="{{$v_content->qty}}">
                                <input type="hidden" name="rowId_qty" class="input-number"  data-min="1" data-max="100" value="{{$v_content->rowId}}">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$v_content->rowId}}]">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <!--/ End Input Order -->
                        </td>
                        <td class="total-amount" data-title="Total"><span>
                                <?php
                                    $total = $v_content->price * $v_content->qty;
                                    echo number_format($total)." ". "VND";
                                ?>
                            </span></td>
                        <td >
                            <button type="submit" class="btn"><i class="fas fa-sync-alt"></i></button>
                        </td>
                        <td class="action" data-title="Remove"><a href="/delete/{{$v_content->rowId }}"><i class="ti-trash remove-icon"></i></a></td>
                    </tr>
                    </form>
                    @endforeach
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
            <div class="clear" style="text-align: right">
                <a href="{{route('clear_cart')}}"><button class="btn">Clear</button></a>
            </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
{{--                                <div class="checkbox">--}}
{{--                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>{{Cart::subtotal()}} VND</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li>You Save<span>0</span></li>
                                    <li>Tax<span>{{Cart::tax()}}</span></li>
                                    <li class="last">You Pay<span>{{Cart::total()}} VND</span></li>
                                </ul>
                                <div class="button5">
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    ?>
                                    @if($customer_id !=Null)
                                            <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    @else
                                            <a href="{{route('login_checkout')}}" class="btn">Checkout</a>
                                    @endif
                                    <a href="{{ route('shop_gird.index') }}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="images/modal1.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal2.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal3.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal4.jpg" alt="#">
                                </div>
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>Flared Shift Dress</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                </div>
                            </div>
                            <h3>$29.00</h3>
                            <div class="quickview-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                            </div>
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Size</h5>
                                        <select>
                                            <option selected="selected">s</option>
                                            <option>m</option>
                                            <option>l</option>
                                            <option>xl</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <a href="#" class="btn">Add to cart</a>
                                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</body>
</html>



