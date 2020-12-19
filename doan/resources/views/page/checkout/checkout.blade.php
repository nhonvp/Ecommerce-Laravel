@extends('page.shop.main')
@section('content')
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <form class="form" method="post" action="{{route('order_place')}}">
                    {{ csrf_field() }}
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                            <!-- Form -->

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Name<span>*</span></label>
                                        <input type="text" name="name_shipping" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email_shipping" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="number" name="phone_shipping" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Province<span>*</span></label>
                                        <select name="province_shipping" id="country">
                                            <option value="An Giang">An Giang
                                            <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
                                            <option value="Bắc Giang">Bắc Giang
                                            <option value="Bắc Kạn">Bắc Kạn
                                            <option value="Bạc Liêu">Bạc Liêu
                                            <option value="Bắc Ninh">Bắc Ninh
                                            <option value="Bến Tre">Bến Tre
                                            <option value="Bình Định">Bình Định
                                            <option value="Bình Dương">Bình Dương
                                            <option value="Bình Phước">Bình Phước
                                            <option value="Bình Thuận">Bình Thuận
                                            <option value="Bình Thuận">Bình Thuận
                                            <option value="Cà Mau">Cà Mau
                                            <option value="Cao Bằng">Cao Bằng
                                            <option value="Đắk Lắk">Đắk Lắk
                                            <option value="Đắk Nông">Đắk Nông
                                            <option value="Điện Biên">Điện Biên
                                            <option value="Đồng Nai">Đồng Nai
                                            <option value="Đồng Tháp">Đồng Tháp
                                            <option value="Đồng Tháp">Đồng Tháp
                                            <option value="Gia Lai">Gia Lai
                                            <option value="Hà Giang">Hà Giang
                                            <option value="Hà Nam">Hà Nam
                                            <option value="Hà Tĩnh">Hà Tĩnh
                                            <option value="Hải Dương">Hải Dương
                                            <option value="Hậu Giang">Hậu Giang
                                            <option value="Hòa Bình">Hòa Bình
                                            <option value="Hưng Yên">Hưng Yên
                                            <option value="Khánh Hòa">Khánh Hòa
                                            <option value="Kiên Giang">Kiên Giang
                                            <option value="Kon Tum">Kon Tum
                                            <option value="Lai Châu">Lai Châu
                                            <option value="Lâm Đồng">Lâm Đồng
                                            <option value="Lạng Sơn">Lạng Sơn
                                            <option value="Lào Cai">Lào Cai
                                            <option value="Long An">Long An
                                            <option value="Nam Định">Nam Định
                                            <option value="Nghệ An">Nghệ An
                                            <option value="Ninh Bình">Ninh Bình
                                            <option value="Ninh Thuận">Ninh Thuận
                                            <option value="Phú Thọ">Phú Thọ
                                            <option value="Quảng Bình">Quảng Bình
                                            <option value="Quảng Bình">Quảng Bình
                                            <option value="Quảng Ngãi">Quảng Ngãi
                                            <option value="Quảng Ninh">Quảng Ninh
                                            <option value="Quảng Trị">Quảng Trị
                                            <option value="Sóc Trăng">Sóc Trăng
                                            <option value="Sơn La">Sơn La
                                            <option value="Tây Ninh">Tây Ninh
                                            <option value="Thái Bình">Thái Bình
                                            <option value="Thái Nguyên">Thái Nguyên
                                            <option value="Thanh Hóa">Thanh Hóa
                                            <option value="Thừa Thiên Huế">Thừa Thiên Huế
                                            <option value="Tiền Giang">Tiền Giang
                                            <option value="Trà Vinh">Trà Vinh
                                            <option value="Tuyên Quang">Tuyên Quang
                                            <option value="Vĩnh Long">Vĩnh Long
                                            <option value="Vĩnh Phúc">Vĩnh Phúc
                                            <option value="Yên Bái">Yên Bái
                                            <option value="Phú Yên">Phú Yên
                                            <option value="Tp.Cần Thơ">Tp.Cần Thơ
                                            <option value="Tp.Đà Nẵng">Tp.Đà Nẵng
                                            <option value="Tp.Hải Phòng">Tp.Hải Phòng
                                            <option value="Tp.Hà Nội">Tp.Hà Nội
                                            <option value="TP  HCM" selected>TP HCM

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line <span>*</span></label>
                                        <input type="text" name="address_shipping" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="exampleFormControlTextarea1">Note</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="note_shipping" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-group create-account">
                                        <input id="cbox" type="checkbox">
                                        <label>Create an account?</label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART  TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li>Sub Total<span>{{Cart::subtotal()}}</span></li>
                                        <li>(+) Tax<span>{{Cart::tax()}}</span></li>
                                        <li class="last">Total<span>{{Cart::total()}}</span></li>
                                    </ul>
                                </div>
                            </div>l
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="1"><input style="display: inline;margin-right: 15px;" name="payment_option" id="1" type="radio" value="1">Check Payments</label>
                                        <label class="checkbox-inline" for="2"><input style="display: inline;margin-right: 15px;" name="payment_option" id="2" type="radio" value="2"> Cash On Delivery</label>
                                        <label class="checkbox-inline" for="3"><input style="display: inline;margin-right: 15px;" name="payment_option" id="3" type="radio" value="3"> PayPal</label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{asset('eshop/shop/images/payment-method.png')}}" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <a href="" class="btn">
                                            <button type="submit" style="border: none; color: #0b0b0b;height: auto;background: transparent;outline: none">PROCEED TO CHECKOUT</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
