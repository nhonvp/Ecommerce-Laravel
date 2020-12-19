@extends('page.shop.home')
@section('content')
    <div class="col-lg-9 col-md-8 col-12">
        <div class="row">
            <div class="col-12">
                <!-- Shop Top -->
                <div class="shop-top">
                    <div>
                        <h3 style="text-align: center">Sản Phẩm Mới Nhất</h3>
                    </div>
                    @include('page.shop.sort')
                </div>
                <!--/ End Shop Top -->
            </div>
        </div>
        <div><p>Tìm thấy {{count($product_search)}} sản phẩm</p></div>
        <div class="row">
            @foreach($product_search as $key => $product_search)
                <a href="{{ route('details_product',$product_search->product_id) }}">
                    <div class="col-lg-4 col-md-6 col-12">
                        {{--            <form--}}
                        {{--                method="post" action="{{ route('save_cart') }}"--}}
                        {{--            >--}}
                        {{csrf_field()}}
                        <div class="single-product">
                            <div class="product-img">
                                <img  style="height: 300px; width: 300px" class="default-img" src="/upload/product/{{$product_search->product_image}}" alt="#">
                                <img class="hover-img" style="transition: 2.5s; transform: scale(1.5)" src="/upload/product/{{$product_search->product_image}}" alt="#">
                                <div class="button-head">
                                    <div class="product-action">
                                        <a class="quickview" data-toggle="modal" data-target="#quickview" title="Quick View" href="#" data-id_product ="{{$product_search->product_id}}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <button style="background: none; border: white" type="submit" class="add-to-cart"><a title="Add to cart">Add to cart</a></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{$product_search->product_name}} </a></h3>
                                <div class="product-price">
                                    <span>{{number_format($product_search->product_price)}} VND</span>
                                </div>
                            </div>
                        </div>
                        {{--            </form>--}}
                    </div>
                </a>
            @endforeach
            {{--        <div style="font-size: 20px">--}}
            {{--            {!! $all_product->links() !!}--}}
            {{--        </div>--}}

        </div>
    </div>
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog">
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
                                    <div class="single-slider" id="quickview_image">
                                    </div>
                                    <div class="single-slider" id="quickview_image_gallery">
                                    </div>
                                    <div class="single-slider">
                                    </div>
                                    <div class="single-slider">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <form >
                                {{csrf_field()}}
                                <div class="quickview-content">
                                    <h3>Mã ID</h3>
                                    <h2 id="quickview_name"></h2>
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
                                    <h3 id="quickview_price"></h3>
                                    <div class="quickview-peragraph">
                                        <h3>Desciption</h3>
                                        <span id="quickview_desc"></span>
                                        <h3 >Content</h3>
                                        <span id="quickview_content"></span>
                                    </div>
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="def-number-input number-input safari_only mb-0">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                        class="minus"></button>
                                                <input class="quantity_view" min="1" name="quantity_view" value="1" type="number" >
                                                <div id="quickview_id">
                                                </div>
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                        class="plus"></button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="">
                                        <button type="submit" class="add-to-cart-view">
                                            <a href="" class="btn">Add to cart</a>
                                        </button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
