@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'All_Order', 'key'=>'List'])

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Responsive Hover Table</h3>
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
                                            <th>Name</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_order as $key =>$order)
                                            <tr>
                                                <td>{{$order->customer_name}}</td>
                                                <td>{{$order->order_total}}</td>
                                                <td>
                                                    <a href="{{route('send_mail_order',$order->order_id)}}">
                                                        <button type="button" class="btn btn-primary">{{$order->order_status}}</button></a>
                                                </td>
                                                <td>

                                                    <a href="{{ route('view_order',$order->order_id) }}">
                                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                                       href="">
                                                        <button type="button" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

        </div>
    </div>
@endsection
