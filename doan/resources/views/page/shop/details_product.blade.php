
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
    <link href="{{asset('MDB/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('MDB/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('MDB/css/style.css')}}" rel="stylesheet">

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
<section class="product-area shop-sidebar shop section">
    <div class="container">
            @foreach($details_product as $key_id => $value)
                <section class="mb-5">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div id="mdb-lightbox-ui"></div>
                            <div class="mdb-lightbox">
                                <div class="row product-gallery mx-1">
                                    <div class="col-12 mb-0">
                                        <figure class="view overlay rounded z-depth-1 main-img">
                                            <a href="/upload/product/{{$value->product_image}}"
                                               data-size="710x218" >
                                                <img src="/upload/product/{{$value->product_image}}"
                                                     class="img-fluid z-depth-1" style=" width: 100%;height: 280px; ">
                                            </a>
                                        </figure>
                                    </div>

                                    <div class="col-12">
                                        <div class="row" >
                                            @foreach($image_product_details as $key => $image)
                                            <div class="col-3">
                                                <div class="view overlay rounded z-depth-1 gallery-item">
                                                    <img src="/upload/product_details/{{$image->image}}"
                                                         class="img-fluid">
                                                    <div class="mask rgba-white-slight"></div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('save_cart') }}" method="post" >
                                {{ csrf_field() }}
                            <h5>{{$value->product_name}}</h5>
                            <p class="mb-2 text-muted text-uppercase small">{{$value->category_name}}</p>

                            <ul class="rating " style="display: flex">
                                @for($i =1; $i<=5;$i++)
                              @if($i <=$rating)
                                <li>
                                    <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                @else
                                <li>
                                    <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                                @endif
                                @endfor
                            </ul>

                            <p><span class="mr-1">
{{--                                    <strong>{{number_format($value->product_price)}} VND</strong>--}}
                                        @if($value->product_content == '2')
                                        <span class="old" style="text-decoration: line-through; opacity: .6; margin-right: 2px">{{number_format($value->product_price)}} VND</span>
                                        <strong>{{number_format($value->product_price-(0.1*$value->product_price))}} VND</strong>
                                    @else
                                        <strong>{{number_format($value->product_price)}} VND</strong>
                                    @endif
                                </span></p>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0">
                                    <tbody>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Tình Trạng</strong></th>
                                        <td>Còn Hàng</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Brand</strong></th>
                                        <td>{{$value->brand_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                                        <td>USA, Europe</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive mb-2">
                                <table class="table table-sm table-borderless" style="">
                                    <tbody>
                                    <tr>
                                        <td class="pl-0 pb-0 w-25" style="border-top: none">Quantity :</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0" style="border-top: none">
                                            <div class="def-number-input number-input safari_only mb-0">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                        class="minus"></button>
                                                <input class="quantity" min="1" name="quantity" value="1" type="number">
                                                <input class="quantity" min="1" name="product_id_hidden" value="{{$value->product_id}}" type="hidden">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                        class="plus"></button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
                            <button type="submit" class="btn btn-light btn-md mr-1 mb-2" href=""><i
                                    class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- Classic tabs -->
                <div class="classic-tabs border rounded px-4 pt-1">
                    <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{$cmt_product}})</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="advancedTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <h5>Product Description</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="rating " style="display: flex">
                                @for($i =1; $i<=5;$i++)
                                    @if($i <=$rating)
                                        <li>
                                            <i class="fas fa-star fa-sm text-primary"></i>
                                        </li>
                                    @else
                                        <li>
                                            <i class="far fa-star fa-sm text-primary"></i>
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                            <h6>{{number_format($value->product_price)}}</h6>
                            <p class="pt-1">
                                {{$value->product_desc}}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <h5>Additional Information</h5>
                            {{$value->product_content}}
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <h5><span></span> review for <span>{{$value->product_name}}</span></h5>
                            @foreach($comments as $key => $comment)
                            <div class="media mt-3 mb-4">
                                <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" alt="Generic placeholder image">
                                <div class="media-body">
                                    <div class="d-sm-flex justify-content-between">
                                        <p class="mt-1 mb-2">
                                            <strong>{{$comment->com_name}}</strong>
                                            <span>– </span><span>{{$comment->created_at}}</span>
                                        </p>
{{--                                        <ul class="rating mb-sm-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star fa-sm text-primary"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star fa-sm text-primary"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star fa-sm text-primary"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star fa-sm text-primary"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="far fa-star fa-sm text-primary"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
                                    </div>
                                    <p class="mb-0">{{$comment->com_content}}</p>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            <h5 class="mt-4">Add a review</h5>
                            <p>Your email address will not be published.</p>
                            <form method="post" action="{{route('post_comment',$value->product_id)}}">
                                {{csrf_field()}}
                                <div class="my-3">
                                    <ul class="mb-0" style="display: flex">
                                        @for($i =1; $i<=5;$i++)
                                                <li class="rating"
                                                    data-index="{{$i}}"
                                                    data-product_id ="{{$value->product_id}}" >
                                                    <i id="{{$value->product_id}}-{{$i}}" class="far fa-star fa-sm text-primary"></i>
                                                </li>
                                        @endfor
                                    </ul>
                                </div>
                                <div>
                                    <!-- Your review -->
                                    <div class="md-form md-outline">
                                        <textarea id="form76" class="md-textarea form-control pr-6" rows="4" name="review_cmt"></textarea>
                                        <label for="form76">Your review</label>
                                    </div>
                                    <!-- Name -->
                                    <div class="md-form md-outline">
                                        <input type="text" id="form75" class="form-control pr-6" name="name_cmt">
                                        <label for="form75">Name</label>
                                    </div>
                                    <!-- Email -->
                                    <div class="md-form md-outline">
                                        <input type="email" id="form77" class="form-control pr-6" name="email_cmt">
                                        <label for="form77">Email</label>
                                    </div>
                                    <div class="text-right pb-2">
                                        <button type="submit" class="btn btn-primary">Add a review</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Classic tabs -->
            <section class="text-center" style="margin-top: 500px">
                <h3>Sản Phẩm Liên Quan</h3>
                <div class="row">
                    @foreach($suggestion as $key => $suggestion)

                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="">
                            <a href="{{ route('details_product',$suggestion->product_id) }}">
                            <div class="view zoom overlay z-depth-2 rounded">
                                <img class="img-fluid w-100" style="height: 200px; cursor: pointer; transition: .5s " src="/upload/product/{{$suggestion->product_image}}" alt="Sample">
                            </div>
                            <div class="pt-4">
                                <h5>
                                    {{$suggestion->product_name}}
                                </h5>
                                <h6>
                                    {{number_format($suggestion->product_price)}} VND
                                </h6>
                            </div>
                            </a>
                        </div>
                        <!-- Card -->
                    </div>

                    @endforeach
                </div>
                <!-- Grid row -->
            </section>
            @endforeach
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
<script>
    $(document).ready(function () {
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    });
</script>
<script type="text/javascript" src="{{asset('MDB/js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('MDB/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('MDB/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('MDB/js/mdb.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="fb-root"></div>
    <script>
        $(document).on('mouseenter','.rating',function (){
            var index = $(this).data('index');
           var product_id = $(this).data('product_id');
                for($i =1; $i<=index;$i++){
                    $('#'+product_id+'-'+$i).addClass('fas');
                };
        });
        $(document).on('mouseleave','.rating',function (){
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');
                for($i =1; $i<=index;$i++){
                    $('#'+product_id+'-'+$i).removeClass('fas');
                };
        });
        $('.rating').click(function (){
            var index = $(this).data('index');
            var product_id= $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
            for($i =1; $i<=index;$i++){
                $('#'+product_id+'-'+$i).replaceWith(
                    ' <i class="fas fa-star fa-sm text-primary"></i>'
                );
            };
            $.ajax({
                url:'{{url('/insert-rating')}}',
                method:'POST',
                data:{index:index,product_id:product_id,_token:_token},
                success:function (data){
                    if(data =='done'){
                       swal('Rating succes')
                    }
                    else {
                        swal('Lỗi')
                    }
                }
            });
        })
    </script>
</body>
</html>



