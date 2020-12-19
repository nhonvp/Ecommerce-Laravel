<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                            <li><i class="ti-user"></i> <a href="{{route('login_checkout')}}">My account</a></li>
                           <?php
                            $customer_id = Session::get('customer_id');
                            $customer_name = Session::get('customer_name');
                            ?>
                            @if($customer_id !=Null)
                                <li><a href="#">Xin Chào, {{$customer_name}}</a></li>
                                <li><i class="ti-power-off"></i><a href="{{route('logout_checkout')}}">Logout</a></li>
                            @else
                                <li><i class="ti-power-off"></i><a href="{{ route('login_checkout') }}">Login</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{route('shop_gird.index')}}"><img src="{{asset('eshop/shop/images/logoshop.png')}}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">Search
                                <input type="text" placeholder=" here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select>
                            <form action="{{route('search')}}" method="get">
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{ route('show_cart') }}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">
                                    {{ Cart::count()}}
                                </span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span> {{ Cart::count()}} Items</span>
                                    <a href="#">View Cart</a>
                                </div>
                                <?php
                                $qty_product_cart = Cart::content();
                                ?>
                                <ul class="shopping-list">
                                    @foreach($qty_product_cart as $key => $qty_cart)
                                    <li>
                                        <a href="/delete/{{$qty_cart->rowId }}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="upload/product/{{$qty_cart->options->image}}" alt="#"></a>
                                        <h4><a href="#">{{$qty_cart->name}}</a></h4>
                                        <p class="quantity">{{$qty_cart->qty}}x - {{$qty_cart->price*$qty_cart->qty}} VND<span class="amount"></span></p>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">{{Cart::subtotal()}}VND</span>
                                    </div>
                                    <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="/shop-sale">Home</a></li>
                                            <li><a href="#">Product</a></li>
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{route('shop_gird.index')}}">Shop Grid</a></li>
                                                    <li><a href="{{ route('show_cart') }}">Cart</a></li>
                                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a></li>
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
