
@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'View_Order', 'key'=>'List'])

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông Tin Khách Hàng</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Tên Khách Hàng</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$order_by_id->customer_name}}</td>
                                                <td>{{$order_by_id->customer_email}}</td>
                                                <td>{{$order_by_id->customer_phone}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <br>
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông Tin Vận Chuyển</h3>
                                    <div class="card-tools" >
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Tên người nhận</th>
                                            <th>Tỉnh</th>
                                            <th>Địa Chỉ</th>
                                            <th>SDT</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$order_by_id->shipping_name}}</td>
                                                <td>{{$order_by_id->shipping_province}}</td>
                                                <td>{{$order_by_id->shipping_address}}</td>
                                                <td>{{$order_by_id->shipping_phone}}
                                                </td>
                                                <td>{{$order_by_id->shipping_note}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <br>
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Chi tiết Đơn Hàng</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Tên Đơn Hàng</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        @foreach($order_by_id_product as $key => $order_product)
                                        <tbody>
                                            <td>{{$order_product->product_name}}</td>
                                            <td>{{$order_product->product_price}}</td>
                                            <td>{{$order_product->product_sales_quantity}}</td>
                                            <td>{{$order_product->product_price*$order_product->product_sales_quantity}} VND</td>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <h3>Tổng Tiền : {{$order_by_id->order_total}}</h3>
            <a href="/print-order/{{$order_by_id->order_id}}">
                <button type="button" class="btn btn-info" >In đơn hàng</button>
            </a>
        </div>
    </div>
@endsection
